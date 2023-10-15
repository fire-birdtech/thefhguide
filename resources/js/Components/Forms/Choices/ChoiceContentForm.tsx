import { type ReactElement, useState } from 'react'
import { Dialog } from '@headlessui/react'
import { useForm } from '@inertiajs/react'
import InputLabel from '@/Components/Forms/InputLabel'
import Summary from '@/Components/Forms/Choices/Summary'
import TextBlock from '@/Components/Forms/Choices/TextBlock'
import ResourceList from '@/Components/Forms/Choices/ResourceList'
import Header from '@/Components/Forms/Choices/Header'
import Exercises from '@/Components/Forms/Choices/Exercises'
import QUIKLinks from '@/Components/Forms/Choices/QUIKLinks'
import AddContentButton from '@/Components/Buttons/Choices/AddContentButton'
import DangerModal from '@/Components/Modals/Danger'
import { ChoiceContentTypes } from '@/enums'
import { type ChoiceContent, type Resource } from '@/types'

interface ChoiceContentFormProps {
  content: ChoiceContent[]
  update?: (value: ChoiceContent[]) => void
}

export default function ChoiceContentForm ({ content, update }: ChoiceContentFormProps): ReactElement {
  const [confirmDeleteProperty, setConfirmDeleteProperty] = useState<boolean>(false)
  const [selectedPropertyIndexForDeletion, setSelectedPropertyIndexForDeletion] = useState<number | undefined>(undefined)
  const [hasSummary] = useState<boolean>(!!content.find((item: ChoiceContent): boolean => item.type === ChoiceContentTypes.SUMMARY))
  const [hasExercises] = useState<boolean>(!!content.find((item: ChoiceContent): boolean => item.type === ChoiceContentTypes.EXERCISES))

  const { data, setData } = useForm<ChoiceContent[]>([
    ...content
  ])

  const addProperty = (type: string): void => {
    type === ChoiceContentTypes.RESOURCES
      ? setData([
        ...data,
        { type, data: [] }
      ])
      : setData([
        ...data,
        { type, data: '' }
      ])

    update(data)
  }

  const updateProperty = (index: number, value: string | Resource[]): void => {
    const content = data
    content[index].data = value

    setData([
      ...content
    ])

    update(data)
  }

  const handleDelete = (index: number): void => {
    setSelectedPropertyIndexForDeletion(index)
    setConfirmDeleteProperty(true)
  }

  const deleteProperty = (): void => {
    if (selectedPropertyIndexForDeletion !== undefined) {
      const content = data
      data.splice(selectedPropertyIndexForDeletion, 1)
      setData([
        ...content
      ])
    }

    update(data)
    setConfirmDeleteProperty(false)
  }

  return <>
    <div className="px-6 py-4 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:pt-4">
      <InputLabel label="Content" className="sm:mt-px sm:pt-1"/>
      <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
        {data.map((item, idx): void => {
          if (item.type === ChoiceContentTypes.SUMMARY) return <Summary key={idx} index={idx} value={item.data} update={(index, value) => { updateProperty(index, value) }} remove={(index) => { handleDelete(index) }}/>
          if (item.type === ChoiceContentTypes.TEXT) return <TextBlock key={idx} index={idx} value={item.data} update={(index, value) => { updateProperty(index, value) }} remove={(index) => { handleDelete(index) }}/>
          if (item.type === ChoiceContentTypes.RESOURCES) return <ResourceList key={idx} index={idx} value={item.data} update={(index, value) => { updateProperty(index, value) }} remove={(index) => { handleDelete(index) }}/>
          if (item.type === ChoiceContentTypes.HEADER) return <Header key={idx} index={idx} value={item.data} update={(index, value) => { updateProperty(index, value) }} remove={(index) => { handleDelete(index) }}/>
          if (item.type === ChoiceContentTypes.EXERCISES) return <Exercises key={idx} index={idx} value={item.data} update={(index, value) => { updateProperty(index, value) }} remove={(index) => { handleDelete(index) }}/>
          if (item.type === ChoiceContentTypes.QUIKLINKS) return <QUIKLinks key={idx} index={idx} value={item.data} update={(index, value) => { updateProperty(index, value) }} remove={(index) => { handleDelete(index) }}/>
        })}
        <div className="space-x-2">
          {!hasSummary && (
            <AddContentButton
              value="Add Summary"
              color="sky"
              onClick={() => {
                addProperty(ChoiceContentTypes.SUMMARY)
              }}
            />
          )}
          <AddContentButton
            value="Add Text Block"
            color="red"
            onClick={() => {
              addProperty(ChoiceContentTypes.TEXT)
            }}
          />
          <AddContentButton
            value="Add Resource List"
            color="purple"
            onClick={() => {
              addProperty(ChoiceContentTypes.RESOURCES)
            }}
          />
          <AddContentButton
            value="Add Header"
            color="orange"
            onClick={() => {
              addProperty(ChoiceContentTypes.HEADER)
            }}
          />
          {!hasExercises && (
            <AddContentButton
              value="Add Exercises"
              color="emerald"
              onClick={() => {
                addProperty(ChoiceContentTypes.EXERCISES)
              }}
            />
          )}
          <AddContentButton
            value="Add QUIKLinks"
            color="yellow"
            onClick={() => {
              addProperty(ChoiceContentTypes.QUIKLINKS)
            }}
          />
        </div>
      </div>
    </div>

    <DangerModal
      destroy={deleteProperty}
      open={confirmDeleteProperty}
      setOpen={setConfirmDeleteProperty}
    >
      <Dialog.Title as="h3" className="text-lg font-medium leading-6 text-gray-900">
        Delete Choice Content Item
      </Dialog.Title>
      <div className="mt-2">
        <p className="text-sm text-gray-500">
          Are you sure you want to delete this data item? All data will be permanently
          removed forever. This action cannot be undone.
        </p>
      </div>
    </DangerModal>
  </>
}

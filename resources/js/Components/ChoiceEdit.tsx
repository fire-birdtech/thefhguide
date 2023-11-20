import {type ReactElement, useState} from 'react'
import { router } from '@inertiajs/react'
import TextInput from '@/Components/Forms/TextInput'
import InputLabel from '@/Components/Forms/InputLabel'
import SecondaryButton from '@/Components/Buttons/SecondaryButton'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import ChoiceContentForm from '@/Components/Forms/Choices/ChoiceContentForm'
import { type Choice, type ChoiceContent } from '@/types'
import AddMediaModal from "@/Components/Modals/AddMedia";
import {useMediaFiles} from "@/contexts/MediaFilesContext";

export default function ChoiceEdit ({ choice, close }: {
  choice: Choice
  close: () => void
}): ReactElement {
  const [addImages, setAddImages] = useState<boolean>(false)
  const [choiceData, setChoiceData] = useState<Choice>({
    ...choice
  })

  const files = useMediaFiles()

  const updateContent = (value: ChoiceContent[]): void => {
    let { content } = choiceData
    content = value

    setChoiceData({
      ...choiceData,
      content: [
        ...content
      ]
    })
  }

  const submit = (e): void => {
    e.preventDefault()

    router.put(route('editor.choices.update', [choice]), choiceData, {
      preserveScroll: true,
      onSuccess: () => { close() }
    })
  }

  return (
    <>
      <div className="border-t border-gray-200 sm:divide-y sm:divide-gray-200">
        <form onSubmit={submit}>
          <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
            <InputLabel label="Name" className="sm:mt-px sm:pt-2"/>
            <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
              <TextInput
                value={choiceData.name}
                className="block w-full"
                isFocused
                onChange={(e) => {
                  setChoiceData({
                    ...choiceData,
                    name: e.target.value
                  })
                }}
              />
            </div>
          </div>
        </form>

        <div>
          <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
            <InputLabel label="Media" className="sm:mt-px sm:pt-2"/>
            <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
              <SecondaryButton onClick={() => setAddImages(true)}>
                Select
              </SecondaryButton>
              <div className="mt-4">
                <ul role="list" className="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-5 xl:gap-x-8">
                  {choice.media.map((item) => (
                    <li key={item.id} className="relative">
                      <div className="group aspect-h-7 aspect-w-10 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <img src={item.url} alt="" className="pointer-events-none object-cover group-hover:opacity-75" />
                        <button type="button" className="absolute inset-0 focus:outline-none">
                          <span className="sr-only">View details for {item.name}</span>
                        </button>
                      </div>
                      <p className="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{item.name}</p>
                    </li>
                  ))}
                </ul>
              </div>
            </div>
          </div>
        </div>

        <ChoiceContentForm
          content={choiceData.content}
          update={(value: ChoiceContent[]) => {
            updateContent(value)
          }}
        />

        <div className="px-6 py-4">
          <div className="flex justify-end space-x-3">
            <SecondaryButton onClick={close}>
              Cancel
            </SecondaryButton>
            <PrimaryButton onClick={submit}>
              Save
            </PrimaryButton>
          </div>
        </div>
      </div>

      <AddMediaModal
        files={files}
        mediaableId={choice.id}
        mediaableType="choice"
        open={addImages}
        setOpen={() => setAddImages(false)}
      />
    </>
  )
}

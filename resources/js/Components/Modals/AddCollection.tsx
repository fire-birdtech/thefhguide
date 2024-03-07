import { type ReactElement, useEffect } from 'react'
import ModalWrapper from '@/Components/Modals/Wrapper'
import { Dialog } from '@headlessui/react'
import { useForm } from '@inertiajs/react'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import { CollectionType } from '@/enums'
import Listbox from '@/Components/listbox'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import SecondaryButton from '@/Components/Buttons/SecondaryButton'

export default function AddCollectionModal ({ close, open, type }: { close: () => void, open: boolean, type: CollectionType | null }): ReactElement {
  const { data, setData } = useForm({
    name: '',
    type
  })

  useEffect(() => {
    setData('type', type)
  }, [type])

  const collectionTypes = Object.values(CollectionType)

  return (
    <ModalWrapper close={close} open={open}>
      <Dialog.Panel className="relative transform rounded-xl bg-white text-left shadow-xl transition-all divide-y divide-gray-200 sm:my-8 sm:w-full sm:max-w-xl">
        <Dialog.Title
          as="h3"
          className="text-lg font-medium leading-6 text-gray-900 p-4 sm:px-6"
        >
          Add a New Collection
        </Dialog.Title>
        <Dialog.Description className="p-8">
          <form onSubmit={() => {}}>
            <div>
              <InputLabel label="Name"/>
              <TextInput
                className="mt-1 block w-full"
                value={data.name}
                onChange={(e) => {
                  setData('name', e.target.value)
                }}
              />
            </div>

            <div className="space-y-1 pt-3">
              <InputLabel label="Type"/>
              <Listbox
                change={(value) => {
                  setData('type', value as CollectionType)
                }}
                options={collectionTypes}
                value={data.type}
              />
            </div>

            <div className="pt-6 flex gap-x-2 justify-end">
              <SecondaryButton onClick={close}>
                Cancel
              </SecondaryButton>
              <PrimaryButton>
                Create
              </PrimaryButton>
            </div>
          </form>
        </Dialog.Description>
      </Dialog.Panel>
    </ModalWrapper>
  )
}

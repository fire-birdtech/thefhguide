import {type ReactElement, useEffect, useState} from "react";
import ModalWrapper from "@/Components/Modals/Wrapper";
import TextInput from "@/Components/Forms/TextInput";
import PrimaryButtonFullWidth from "@/Components/Buttons/PrimaryButtonFullWidth";
import { Dialog } from "@headlessui/react";

export default function AddLinkModal ({ add, close, open, previousHref }: { add: (value: string) => void, close: () => void, open: boolean, previousHref?: string }): ReactElement {
  const [url, setUrl] = useState<string>('')

  useEffect(() => {
    if (previousHref) {
      setUrl(previousHref)
    }
  }, [previousHref]);

  const onAdd = () => {
    add(url)
    close()
    setUrl('')
  }

  return (
    <ModalWrapper close={close} open={open}>
      <Dialog.Panel className="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
        <div>
          <div className="text-center">
            <Dialog.Title as="h3" className="text-base font-semibold leading-6 text-gray-900">
              Enter URL
            </Dialog.Title>
            <div className="mt-2">
              <TextInput
                className="w-full block"
                value={url}
                onChange={(e) => {
                  setUrl(e.target.value)
                }}
              />
            </div>
          </div>
        </div>
        <div className="mt-5 sm:mt-6">
          <PrimaryButtonFullWidth type="button" onClick={onAdd}>
            Add
          </PrimaryButtonFullWidth>
        </div>
      </Dialog.Panel>
    </ModalWrapper>
  )
}

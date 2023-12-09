import {type ReactElement} from "react";
import ModalWrapper from "@/Components/Modals/Wrapper";
import {Dialog} from "@headlessui/react";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";
import {useForm} from "@inertiajs/react";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import {Resource, ResourceLink as ResourceLinkType} from "@/types";
import ResourceLink from "@/Components/Content/ResourceLink";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";

const linkTypes = ['document', 'video']

export default function AddResourceModal ({ close, open, save }: { close: () => void, open: boolean, save: (value: Resource) => void }): ReactElement {
  const {data, setData} = useForm<Resource>({
    description: '',
    links: [],
  })

  const addLink = () => {
    const { links } = data
    links.push({
      text: '',
      type: linkTypes[0],
      star: true,
    })
    setData({
      ...data,
      links: links,
    })
  }

  const updateLink = (index: number, updatedLink: ResourceLinkType) => {
    const { links } = data
    links[index] = updatedLink
    setData({
      ...data,
      links: links,
    })
  }

  const submit = () => {
    save(data)
    close()
  }

  return (
    <ModalWrapper close={close} open={open}>
      <Dialog.Panel className="relative transform overflow-hidden rounded-xl bg-white text-left shadow-xl transition-all divide-y divide-gray-200 sm:my-8 sm:w-full sm:max-w-xl">
        <Dialog.Title
          as="h3"
          className="text-lg font-medium leading-6 text-gray-900 p-4 sm:px-6"
        >
          Select an element
        </Dialog.Title>
        <Dialog.Description className="p-4">
          <form className="space-y-4">
            <div>
              <InputLabel label="Description"/>
              <div className="mt-1">
                <TextInput
                  className="block w-full"
                  value={data.description}
                  onChange={(e) => {
                    setData('description', e.target.value)
                  }}
                />
              </div>
            </div>

            <div>
              <InputLabel label="Resource Links"/>
              {data.links.length > 0 ? (
                <div className="mt-1">
                  {data.links.map((link, index) => (
                    <ResourceLink link={link} onChange={(value: ResourceLinkType) => updateLink(index, value)}/>
                  ))}
                </div>
              ) : null}
              <SecondaryButtonSmall
                className="mt-1"
                onClick={() => addLink()}
              >
                Add a resource link
              </SecondaryButtonSmall>
            </div>
          </form>
        </Dialog.Description>
        <div className="px-4 py-3 sm:flex sm:flex-row-reverse sm:gap-x-2">
          <PrimaryButton
            onClick={submit}
          >
            Save
          </PrimaryButton>
          <SecondaryButton
            onClick={() => close}
          >
            Cancel
          </SecondaryButton>
        </div>
      </Dialog.Panel>
    </ModalWrapper>
  )
}

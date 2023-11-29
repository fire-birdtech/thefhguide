import {type ReactElement, useState} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import {ContentImage, type ElementKey, type PageContent} from "@/types"
import {useForm} from "@inertiajs/react";
import SectionTitle from "@/Components/Forms/SectionTitle";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import AddContentElementModal from "@/Components/Modals/AddContentElement";
import {ContentElementKey} from "@/enums";
import RightAlignedImage from "@/Components/Forms/RightAlignedImage";

export default function ContentSectionEdit({ content, onChange }: { content: PageContent, onChange: (value: any) => void  }): ReactElement {
  const [addElement, setAddElement] = useState<boolean>(false)
  const {data, setData} = useForm({
    ...content,
  })

  const onClose = () => {
    setAddElement(false)
  }

  const add = (key: ElementKey) => {
    let updatedContent = data
    key === ContentElementKey.RIGHT_ALIGNED_IMAGE
      ? updatedContent[key] = { url: '', width: '' }
      : updatedContent[key] = ''
    setData({ ...updatedContent })
    onChange(updatedContent)
  }

  const update = (key: ElementKey, value: string|ContentImage) => {
    let updatedContent = data
    updatedContent[key] = value
    setData({ ...updatedContent })
    onChange(updatedContent)
  }

  return (
    <>
      <div className="flex flex-col">
        <ContentBlockHeader
          color="blue"
          remove={() => {}}
        >
          Content Section
        </ContentBlockHeader>
        <div className="w-full p-4 border-2 border-blue-200 rounded-b-md rounded-tr-md space-y-4">
          {Object.entries(content).map(([key, value]) => {
            if (key === ContentElementKey.TITLE) return <SectionTitle key={key} title={value} onChange={(value) => update(key as ElementKey, value)}/>
            if (key === ContentElementKey.RIGHT_ALIGNED_IMAGE) return <RightAlignedImage key={key} image={value} onChange={(value: ContentImage) => update(key as ElementKey, value)}/>
          })}

          <SecondaryButtonSmall onClick={() => setAddElement(true)}>
            Add element
          </SecondaryButtonSmall>
        </div>
      </div>

      <AddContentElementModal add={(key) => add(key)} open={addElement} close={onClose}/>
    </>
  )
}

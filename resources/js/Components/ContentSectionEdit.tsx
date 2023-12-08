import {type ReactElement, useState} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import {ContentImage, PageContentElement} from "@/types"
import {useForm} from "@inertiajs/react";
import SectionTitle from "@/Components/Forms/SectionTitle";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import AddContentElementModal from "@/Components/Modals/AddContentElement";
import {ContentElementType} from "@/enums";
import RightAlignedImage from "@/Components/Forms/RightAlignedImage";
import Text from "@/Components/Forms/Text";

export default function ContentSectionEdit({ section, index, onChange }: { section: PageContentElement[], index: number, onChange: (value: any) => void  }): ReactElement {
  const [addElement, setAddElement] = useState<boolean>(false)
  const {data, setData} = useForm(section)

  const onClose = () => {
    setAddElement(false)
  }

  const add = (type: ContentElementType) => {
    let updatedContent = data
    if (type === ContentElementType.RIGHT_ALIGNED_IMAGE) {
      updatedContent.push({ type: type, data: { url: '', width: '' }})
    } else {
      updatedContent.push({ type: type, data: '' })
    }
    setData(updatedContent)
    onChange(updatedContent)
  }

  const update = (index: number, value: string|ContentImage) => {
    let updatedContent = data
    updatedContent[index].data = value
    setData(updatedContent)
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
          {data.map((element, index) => {
            switch (element.type) {
              case ContentElementType.RIGHT_ALIGNED_IMAGE:
                return <RightAlignedImage key={index} image={element.data} onChange={(value: ContentImage) => update(index, value)}/>
              case ContentElementType.TEXT:
                return <Text key={index} text={element.data} onChange={(value) => update(index, value)}/>
              case ContentElementType.TITLE:
                return <SectionTitle key={index} title={element.data} onChange={(value) => update(index, value)}/>
            }
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

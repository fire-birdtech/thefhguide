import {type ReactElement, useState} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import {ContentKeys, type PageContent} from "@/types"
import {useForm} from "@inertiajs/react";
import SectionTitle from "@/Components/Forms/SectionTitle";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import AddContentElementModal from "@/Components/Modals/AddContentElement";

export default function ContentSectionEdit({ content, onChange }: { content: PageContent, onChange: (value: any) => void  }): ReactElement {
  const [addElement, setAddElement] = useState<boolean>(false)
  const {data, setData} = useForm({
    ...content,
  })

  const onClose = () => {
    setAddElement(false)
  }

  const add = (key: ContentKeys) => {
    let updatedContent = data
    updatedContent[key] = ''
    setData({ ...updatedContent })
    onChange(updatedContent)
  }

  const update = (key: ContentKeys, value: string) => {
    let updatedContent = data
    updatedContent[key] = value
    setData({ ...updatedContent })
    onChange(updatedContent)
  }

  const renderContent = (content: PageContent): ReactElement|null => {
    for (let [key, value] of Object.entries(content)) {
      if (key === "title") return <SectionTitle title={value} onChange={(value) => update(key as ContentKeys, value)}/>
    }

    return null
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
          {renderContent(content)}

          <SecondaryButtonSmall onClick={() => setAddElement(true)}>
            Add element
          </SecondaryButtonSmall>
        </div>
      </div>

      <AddContentElementModal add={(key) => add(key)} open={addElement} close={onClose}/>
    </>
  )
}

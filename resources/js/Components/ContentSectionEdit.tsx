import {type ReactElement} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import {ContentKeys, type PageContent} from "@/types"
import {useForm} from "@inertiajs/react";
import SectionTitle from "@/Components/Forms/SectionTitle";

export default function ContentSectionEdit({ content, onChange }: { content: PageContent, onChange: (value: any) => void  }): ReactElement {
  const {data, setData} = useForm({
    ...content,
  })

  const update = (key: "title"|"body"|"image_url"|"image_width", value: string) => {
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
        <div className="w-full p-4 border-2 border-blue-200 rounded-b rounded-tr space-y-4">
          {renderContent(content)}
        </div>
      </div>
    </>
  )
}

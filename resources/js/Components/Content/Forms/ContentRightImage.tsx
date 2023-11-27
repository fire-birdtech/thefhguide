import {type ReactElement} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import {useForm} from "@inertiajs/react";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";

export default function ContentRightImage({ content, onChange }: {content: { type?: string, image_url?: string, title?: string, body?: string }, onChange: (value: any) => void }): ReactElement {
  const {data, setData} = useForm({
    ...content,
  })

  const update = (key: "title", value: string) => {
    let updatedContent = data
    updatedContent[key] = value
    setData({ ...updatedContent })
    onChange(updatedContent)
  }

  return (
    <div className="flex flex-col">
      <ContentBlockHeader
        color="blue"
        remove={() => {}}
      >
        Content (Right-aligned image)
      </ContentBlockHeader>
      <div className="w-full p-4 border-2 border-blue-200 rounded-b rounded-tr space-y-4">
        <div>
          <InputLabel label="Content Header"/>
          <div className="mt-1">
            <TextInput
              value={data.title}
              className="block w-full"
              onChange={(e) => {
                update('title', e.target.value)
              }}
            />
          </div>
        </div>
      </div>
    </div>
  )
}

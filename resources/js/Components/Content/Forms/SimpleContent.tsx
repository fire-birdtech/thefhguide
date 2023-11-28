import {type ReactElement} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";
import {useForm} from "@inertiajs/react";
import TextEditor from "@/Components/Forms/TextEditor";

export default function SimpleContent({ content, onChange }: { content: { title?: string, body?: string }, onChange: (value: any) => void }): ReactElement {
  const {data, setData} = useForm({
    ...content,
  })

  const update = (key: "title"|"body", value: string) => {
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
        Simple Content
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

        <div>
          <InputLabel label="Content Body"/>
          <div className="mt-1">
            <TextEditor update={(value) => update("body", value)} value={data.body}/>
          </div>
        </div>
      </div>
    </div>
  )
}

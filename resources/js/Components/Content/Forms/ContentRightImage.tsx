import {type ReactElement, useState} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import {useForm} from "@inertiajs/react";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";
import {useMediaFiles} from "@/contexts/MediaFilesContext";
import AddMediaModal from "@/Components/Modals/AddMedia";
import {MediaFile} from "@/types";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import TextEditor from "@/Components/Forms/TextEditor";
import InputError from "@/Components/Forms/InputError";

export default function ContentRightImage({ content, onChange }: { content: { type?: string, image_url?: string, image_width?: string, title?: string, body?: string }, onChange: (value: any) => void }): ReactElement {
  const [addImage, setAddImage] = useState<boolean>(false)
  const [showImageWidthErrorMessage, setShowImageWidthErrorMessage] = useState<boolean>(false)

  const files = useMediaFiles()

  const {data, setData} = useForm({
    ...content,
  })

  const onClose = () => {
    setAddImage(false)
  }

  const attachFile = (id: number): void => {
    let file = files?.find((file: MediaFile) => file.id === id)
    let updatedContent = data
    updatedContent.image_url = file.url
    setData({ ...updatedContent })
    onChange(updatedContent)
  }

  const update = (key: "title"|"body"|"image_width", value: string) => {
    if (key === "image_width" && parseInt(value) > 500) {
      setShowImageWidthErrorMessage(true)
    } else if (key === "image_width" && parseInt(value) < 500) {
      setShowImageWidthErrorMessage(false)
    }
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

          <div>
            <InputLabel label="Image" className="mb-1"/>
            {data.image_url !== '' ? (
              <>
                <img src={data.image_url} alt="" width="300" className="border border-black"/>
                <div className="mt-2">
                  <InputLabel label="Image width"/>
                  <div className="mt-1">
                    <TextInput
                      value={data.image_width}
                      className="block w-full"
                      onChange={(e) => {
                        update('image_width', e.target.value)
                      }}
                    />
                    {showImageWidthErrorMessage ? (
                      <InputError message="Image cannot be wider than 500" className="mt-1"/>
                    ) : null}
                  </div>
                </div>
              </>
            ) : (
              <SecondaryButtonSmall onClick={(e) => {
                e.preventDefault()
                setAddImage(true)
              }}>
                Select image
              </SecondaryButtonSmall>
            )}
          </div>

          <div>
            <InputLabel label="Content Body"/>
            <div className="mt-1">
              <TextEditor update={(value) => update("body", value)} value={data.body}/>
            </div>
          </div>
        </div>
      </div>

      {files !== undefined ? (
        <AddMediaModal
          files={files}
          open={addImage}
          close={onClose}
          recentlySuccessful={false}
          onSubmit={(id: number) => {
            attachFile(id)
          }}
        />
      ) : null}
    </>
  )
}

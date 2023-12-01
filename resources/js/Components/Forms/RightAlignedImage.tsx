import {type ReactElement, useState} from "react"
import InputLabel from "@/Components/Forms/InputLabel";
import {useMediaFiles} from "@/contexts/MediaFilesContext";
import AddMediaModal from "@/Components/Modals/AddMedia";
import {useForm} from "@inertiajs/react";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import {ContentImage, MediaFile} from "@/types";
import TextInput from "@/Components/Forms/TextInput";
import InputError from "@/Components/Forms/InputError";

export default function RightAlignedImage({ image, onChange }: { image: ContentImage, onChange: (value: ContentImage) => void  }): ReactElement {
  const [addImage, setAddImage] = useState<boolean>(false)
  const [showImageWidthErrorMessage, setShowImageWidthErrorMessage] = useState<boolean>(false)

  const {data, setData} = useForm({
    ...image,
  })

  const files = useMediaFiles()

  const onClose = () => {
    setAddImage(false)
  }

  const update = (key: "url"|"width", value: number|string): void => {
    (key === "width" && parseInt(value as string) > 500)
      ? setShowImageWidthErrorMessage(true)
      : setShowImageWidthErrorMessage(false)
    let file = files?.find((file: MediaFile) => file.id === value)
    let updatedImageData = data
    updatedImageData[key] = file !== undefined ? file.url : value
    setData({ ...updatedImageData })
    onChange(updatedImageData)
  }

  return (
    <>
      <div>
        <InputLabel label="Right Aligned Image"/>
        <div className="mt-1">
          {data.url !== '' ? (
            <div className="flex gap-x-4">
              <img src={data.url} alt="" width="300" className="border border-black"/>
              <div className="flex-1 overflow-hidden rounded bg-gray-100">
                <div className="p-4">
                  <h3 className="text-xs font-semibold leading-2 tracking-wide text-gray-900 uppercase">Image Options</h3>
                  <div className="mt-2">
                    <div>
                      <InputLabel label="Width"/>
                      <div className="mt-1">
                        <TextInput
                          value={data.width}
                          className="block w-full"
                          onChange={(e) => {
                            update('width', e.target.value)
                          }}
                        />
                        {showImageWidthErrorMessage ? (
                          <InputError message="Image cannot be wider than 500" className="mt-1"/>
                        ) : null}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ) : (
            <SecondaryButtonSmall
              onClick={() => {
                setAddImage(true)
              }}
            >
              Select image
            </SecondaryButtonSmall>
          )}
        </div>
      </div>

      <AddMediaModal
        files={files}
        open={addImage}
        close={onClose}
        recentlySuccessful={false}
        onSubmit={(id: number) => {
          update("url", id)
        }}
      />
    </>
  )
}

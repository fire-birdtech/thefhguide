import {type ReactElement, useState} from "react";
import InputLabel from "@/Components/Forms/InputLabel";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import {useMediaFiles} from "@/contexts/MediaFilesContext";
import AddMediaModal from "@/Components/Modals/AddMedia";
import {useForm} from "@inertiajs/react";
import {type ContentImage, type MediaFile} from "@/types";

export default function LeftAlignedImage ({ image, onChange }: { image: ContentImage, onChange: (value: ContentImage) => void }): ReactElement {
  const [addImage, setAddImage] = useState<boolean>(false)

  const {data, setData} = useForm({
    ...image
  })

  const files = useMediaFiles()

  const onClose = () => {
    setAddImage(false)
  }

  const update = (key: "url", value: number): void => {
    let file = files?.find((file: MediaFile) => file.id === value)
    let updatedImageData = data
    updatedImageData[key] = file.url
    setData({ ...updatedImageData })
    onChange(updatedImageData)
  }

  return (
    <>
      <div>
        <InputLabel label="Left Aligned Image"/>
        <div className="mt-1">
          {data.url !== '' ? (
            <>
              <img src={data.url} alt="" width="300" className="border border-black"/>
              <div className="mt-2">
                <SecondaryButtonSmall
                  onClick={() => {
                    setAddImage(true)
                  }}
                >
                  Change image
                </SecondaryButtonSmall>
              </div>
            </>
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

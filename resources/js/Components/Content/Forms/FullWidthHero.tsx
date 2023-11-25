import {type ReactElement, useState} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader"
import AddMediaModal from "@/Components/Modals/AddMedia"
import {useMediaFiles} from "@/contexts/MediaFilesContext"
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall"
import {MediaFile} from "@/types"

export default function FullWidthHero (): ReactElement {
  const [addImage, setAddImage] = useState<boolean>(false)
  const [image, setImage] = useState<MediaFile|undefined>(undefined)
  const files = useMediaFiles()

  const onClose = () => {
    setAddImage(false)
  }

  const attachFile = (id: number): void => {
    setImage(files?.find((file: MediaFile) => file.id === id))
  }

  return (
    <>
      <div className="flex flex-col">
        <ContentBlockHeader
          color="blue"
          remove={() => {}}
          // remove={() => { remove(index) }}
        >
          Full Width Hero
        </ContentBlockHeader>
        <div className="w-full p-4 border-2 border-blue-200 rounded-b rounded-tr">
          <div>
            {image !== undefined ? (
              <img src={image.url} alt=""/>
            ) : (
              <SecondaryButtonSmall onClick={(e) => {
                e.preventDefault()
                setAddImage(true)
              }}>
                Select image
              </SecondaryButtonSmall>
            )}
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

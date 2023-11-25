import {type ReactElement, useState} from "react"
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader"
import AddMediaModal from "@/Components/Modals/AddMedia"
import {useMediaFiles} from "@/contexts/MediaFilesContext"
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall"
import {MediaFile} from "@/types"
import InputLabel from "@/Components/Forms/InputLabel"
import TextInput from "@/Components/Forms/TextInput"

export default function FullWidthHero ({ hero, onChange }: { hero: { image_url?: string, title: string }, onChange: (value: any) => void }): ReactElement {
  const [addImage, setAddImage] = useState<boolean>(false)
  const files = useMediaFiles()

  const onClose = () => {
    setAddImage(false)
  }

  const attachFile = (id: number): void => {
    let file = files?.find((file: MediaFile) => file.id === id)
    hero.image_url = file.url
    onChange(hero)
  }

  const update = (key: string, value: string) => {
    hero[key] = value
    onChange(hero)
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
        <div className="w-full p-4 border-2 border-blue-200 rounded-b rounded-tr space-y-4">
          <div>
            {hero.image_url !== undefined ? (
              <img src={hero.image_url} alt=""/>
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
            <InputLabel label="Hero Title"/>
            <div>
              <TextInput
                value={hero.title}
                className="block w-full"
                onChange={(e) => update('title', e.target.value)}
              />
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

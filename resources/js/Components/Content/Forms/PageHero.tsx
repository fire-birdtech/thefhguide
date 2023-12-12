import {type ReactElement, useState} from "react";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import {type Hero, MediaFile} from "@/types";
import AddHeroModal from "@/Components/Modals/AddHero";
import {useForm} from "@inertiajs/react";
import {useMediaFiles} from "@/contexts/MediaFilesContext";
import {HeroType} from "@/enums";
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import InputLabel from "@/Components/Forms/InputLabel";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import AddMediaModal from "@/Components/Modals/AddMedia";
import TextInput from "@/Components/Forms/TextInput";

export default function PageHero ({ hero, onChange }: { hero: Hero, onChange: (value: Hero) => void }): ReactElement {
  const [open, setOpen] = useState<boolean>(false)
  const [mediaOpen, setMediaOpen] = useState<boolean>(false)

  const {data, setData} = useForm<Hero>({
    ...hero
  })

  const files = useMediaFiles()

  const onClose = () => {
    setOpen(false)
  }

  const onMediaClose = () => {
    setMediaOpen(false)
  }

  const addHero = (value: string) => {
    let updatedHero = data
    if (value === HeroType.HERO_FULL_WIDTH) {
      updatedHero = {
        type: HeroType.HERO_FULL_WIDTH,
        image_url: '',
        title: '',
      }
    }
    if (value === HeroType.HERO_TWO_COLUMN) {
      updatedHero = {
        type: HeroType.HERO_TWO_COLUMN,
        image_url: '',
        title: '',
      }
    }

    setData({...updatedHero})
    onChange(updatedHero)
    onClose()
  }

  const update = (key: "image_url"|"title", value: number) => {
    let file = files?.find((file: MediaFile) => file.id === value)
    let updatedHeroData = data
    updatedHeroData[key] = file !== undefined ? file.url : value
    setData({ ...updatedHeroData })
    onChange(updatedHeroData)

    if (mediaOpen) {
      setMediaOpen(false)
    }
  }

  return <>
    {hero !== null ? (
      <div className="flex flex-col">
        <ContentBlockHeader
          color="red"
          remove={() => {}}
        >
          Page Hero
        </ContentBlockHeader>
        <div className="w-full p-4 border-2 border-red-200 rounded-b-md rounded-tr-md space-y-4">
          <div>
            <InputLabel label="Image"/>
            {data.image_url !== '' ? (
              <div className="mt-1">
                <img src={hero.image_url} alt=""/>
                <SecondaryButtonSmall className="mt-2" onClick={() => setMediaOpen(true)}>
                  Change image
                </SecondaryButtonSmall>
              </div>
            ) : (
              <SecondaryButtonSmall className="mt-1" onClick={() => setMediaOpen(true)}>
                Select image
              </SecondaryButtonSmall>
            )}
          </div>

          <div>
            <InputLabel label="Title"/>
            <div className="mt-1">
              <TextInput
                className="block w-full"
                value={hero.title}
                onChange={(e) => {
                  update('title', e.target.value)
                }}
              />
            </div>
          </div>
        </div>
      </div>
    ) : (
      <SecondaryButton
        onClick={() => setOpen(true)}
      >
        Add hero
      </SecondaryButton>
    )}

    <AddHeroModal
      add={(value: string) => addHero(value)}
      close={onClose}
      open={open}
    />

    <AddMediaModal files={files} open={mediaOpen} close={onMediaClose} recentlySuccessful={false} onSubmit={(id: number) => update('image_url', id)}/>
  </>
}

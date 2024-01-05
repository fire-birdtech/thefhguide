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
    if (value in HeroType) {
      updatedHero = {
        type: value as HeroType,
        image_url: '',
        title: '',
      }
    }

    setData({...updatedHero})
    onChange(updatedHero)
    onClose()
  }

  const update = (key: keyof Hero, value: number|string) => {
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
                <img src={data.image_url} alt=""/>
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
                value={data.title}
                onChange={(e) => {
                  update('title', e.target.value)
                }}
              />
            </div>
          </div>

          {Object.keys(data).map((key, index) => {
            switch (key as keyof Hero) {
              case "button_text":
                return (
                  <div key={index}>
                    <InputLabel label="Action button"/>
                    <div className="mt-1 space-y-2">
                      <TextInput
                        className="block w-full"
                        placeholder="Text"
                        value={data.button_text}
                        onChange={(e) => {
                          update('button_text', e.target.value)
                        }}
                      />
                      <TextInput
                        className="block w-full"
                        placeholder="Link"
                        value={data.button_link}
                        onChange={(e) => {
                          update('button_link', e.target.value)
                        }}
                      />
                    </div>
                  </div>
                )
              case "subtitle":
                return (
                  <div key={index}>
                    <InputLabel label="Subtitle"/>
                    <div className="mt-1 space-y-2">
                      <TextInput
                        className="block w-full"
                        value={data.subtitle}
                        onChange={(e) => {
                          update('subtitle', e.target.value)
                        }}
                      />
                    </div>
                  </div>
                )
            }
          })}

          <div className="space-x-2">
            {! ("button_text" in data) ? (
              <SecondaryButtonSmall
                onClick={() => {
                  update('button_text', '')
                  update('button_link', '')
                }}
              >
                Add action button
              </SecondaryButtonSmall>
            ): null}
            {! ("subtitle" in data) ? (
              <SecondaryButtonSmall
                onClick={() =>  {
                  update('subtitle', '')
                }}
              >
                Add subtitle
              </SecondaryButtonSmall>
            ): null}
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

import {type ReactElement} from "react"
import InputLabel from "@/Components/Forms/InputLabel"
import TextInput from "@/Components/Forms/TextInput"
import {useForm} from "@inertiajs/react";
import {HeroButton as HeroButtonType} from "@/types";

export default function HeroButton ({ button, update }: { button: HeroButtonType, update: (key: string, value: HeroButtonType) => void }): ReactElement {
  const {data, setData} = useForm<HeroButtonType>({
    text: button.text,
    link: button.link,
  })

  const change = (key: "text"|"link", value: string) => {
    let updatedData = data
    updatedData[key] = value
    setData({ ...updatedData })
    update('button', data)
  }

  return (
    <div>
      <InputLabel label="Button"/>
      <div className="mt-1 space-y-2">
        <TextInput
          value={data.text}
          onChange={(e) => change('text', e.target.value)}
          className="block w-full"
          placeholder="Button text"
        />
        <TextInput
          value={data.link}
          onChange={(e) => change('link', e.target.value)}
          className="block w-full"
          placeholder="Button link"
        />
      </div>
    </div>
  )
}

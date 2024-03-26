import { type ReactElement } from 'react'
import InputLabel from '@/Components/Forms/InputLabel'
import TextEditor from '@/Components/Forms/TextEditor'
import { useForm } from '@inertiajs/react'

export default function Text ({ text, onChange }: { text: string, onChange: (value: string) => void }): ReactElement {
  const { data, setData } = useForm({
    text
  })

  const update = (key: 'text', value: string): void => {
    setData(key, value)
    onChange(value)
  }

  return (
    <div>
      <InputLabel label="Text"/>
      <div className="mt-1">
        <TextEditor
          update={(value) => {
            update('text', value)
          }}
          value={data.text}
        />
      </div>
    </div>
  )
}

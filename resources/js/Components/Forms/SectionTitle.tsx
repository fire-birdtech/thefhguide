import { type ReactElement } from 'react'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'
import { useForm } from '@inertiajs/react'

export default function SectionTitle ({ title, onChange }: { title: string, onChange: (value: string) => void }): ReactElement {
  const { data, setData } = useForm({
    title
  })

  const update = (key: 'title', value: string): void => {
    setData(key, value)
    onChange(value)
  }

  return (
    <div>
      <InputLabel label="Section Title"/>
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
  )
}

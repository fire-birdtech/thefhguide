import { type ReactElement } from 'react'
import { RadioGroup } from '@headlessui/react'
import { type ResourceLink } from '@/types'
import { useForm } from '@inertiajs/react'
import classNames from '@/Utils/classNames'
import InputLabel from '@/Components/Forms/InputLabel'
import TextInput from '@/Components/Forms/TextInput'

const linkTypes = ['document', 'video']

export default function ContentResourceLink ({ link, onChange }: { link: ResourceLink, onChange: (value: ResourceLink) => void }): ReactElement {
  const { data, setData } = useForm<ResourceLink>({ ...link })

  const update = (key: 'text' | 'type' | 'star', value: string | boolean): void => {
    const updatedLink = data
    data[key] = value
    setData({ ...updatedLink })
    onChange(updatedLink)
  }

  return (
    <div className="overflow-hidden rounded-lg bg-gray-50 border border-gray-300 shadow-sm p-2.5 mb-2 space-y-2">
      <div>
        <InputLabel label="Select resource link type"/>
        <RadioGroup
          value={data.type}
          onChange={(value) => { update('type', value) }}
          className="mt-1"
        >
          <RadioGroup.Label className="sr-only">Choose a type</RadioGroup.Label>
          <div className="grid grid-cols-5 gap-2">
            {linkTypes.map((type) => (
              <RadioGroup.Option
                key={type}
                value={type}
                className={({ active, checked }) =>
                  classNames(
                    active ? 'ring-2 ring-blue-600 ring-offset-2' : '',
                    checked
                      ? 'bg-blue-600 text-white hover:bg-blue-500'
                      : 'ring-1 ring-inset ring-gray-300 bg-white text-gray-900 hover:bg-gray-50',
                    'flex items-center justify-center rounded-md py-2 px-2 text-xs font-semibold uppercase cursor-pointer focus:outline-none sm:flex-1'
                  )
                }
              >
                <RadioGroup.Label as="span">{type}</RadioGroup.Label>
              </RadioGroup.Option>
            ))}
          </div>
        </RadioGroup>
      </div>

      <div>
        <InputLabel label="Link text"/>
        <div className="mt-1">
          <TextInput
            className="block w-full"
            value={data.text}
            onChange={(e) => {
              update('text', e.target.value)
            }}
          />
        </div>
      </div>

      <div>
        <InputLabel label="Link"/>
        <div className="mt-1">
          <TextInput
            className="block w-full"
            value={data.link}
            onChange={(e) => {
              update('link', e.target.value)
            }}
          />
        </div>
      </div>

      <div className="relative flex items-start">
        <div className="flex h-6 items-center">
          <input
            id="star"
            aria-describedby="star-description"
            name="star"
            type="checkbox"
            className="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-600"
            checked={data.star}
            onChange={(e) => {
              update('star', e.target.checked)
            }}
          />
        </div>
        <div className="ml-3 text-sm leading-6">
          <label htmlFor="star" className="font-medium text-gray-900">
            Allow users to star this resource link
          </label>
        </div>
      </div>
    </div>
  )
}

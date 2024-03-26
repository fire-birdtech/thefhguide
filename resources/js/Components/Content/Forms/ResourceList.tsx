import { type ReactElement, useState } from 'react'
import { type Resource } from '@/types'
import InputLabel from '@/Components/Forms/InputLabel'
import SecondaryButtonSmall from '@/Components/Buttons/SecondaryButtonSmall'
import { useForm } from '@inertiajs/react'
import AddResourceModal from '@/Components/Modals/AddResource'
import { DocumentTextIcon } from '@heroicons/react/24/outline'
import { PlayCircleIcon } from '@heroicons/react/24/solid'

export default function ResourceList ({ onChange, resources }: { onChange: (value: Resource[]) => void, resources: Resource[] }): ReactElement {
  const [addResource, setAddResource] = useState<boolean>(false)

  const { data, setData } = useForm([
    ...resources
  ])

  const onClose = (): void => {
    setAddResource(false)
  }

  const add = (value: Resource): void => {
    const updatedResources = data
    updatedResources.push(value)
    setData([...updatedResources])
    onChange(updatedResources)
  }

  return (
    <>
      <div>
        <InputLabel label="Resource List"/>
        <div className="mt-1 space-y-1">
          {data.length > 0 ? (
          <ul className="border border-gray-300 divide-y divide-gray-300 rounded-md shadow-sm mb-2">
            {data.map((resource, index) => (
              <li key={index} className="px-3.5 py-2 text-sm">
                <p>{resource.description}</p>
                <ul className="pt-2">
                  {resource.links.map((link, index) => (
                    <li key={index}>
                      <a href={link.link} className="flex gap-x-1 hover:underline">
                        {link.type === 'document' ? (
                          <DocumentTextIcon className="w-5 h-5" aria-hidden="true"/>
                        ) : (
                          <PlayCircleIcon className="w-5 h-5" aria-hidden="true"/>
                        )}
                        <span className="text-gray-500">{link.text}</span>
                      </a>
                    </li>
                  ))}
                </ul>
              </li>
            ))}
          </ul>
          ) : null}
          <SecondaryButtonSmall
            onClick={() => { setAddResource(true) }}
          >
            Add a resource
          </SecondaryButtonSmall>
        </div>
      </div>

      <AddResourceModal close={onClose} open={addResource} save={(value: Resource) => { add(value) }}/>
    </>
  )
}

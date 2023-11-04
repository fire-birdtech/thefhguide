import { type FormEventHandler, type ReactElement, useState } from 'react'
import { useForm } from '@inertiajs/react'
import { DocumentTextIcon, VideoCameraIcon } from '@heroicons/react/24/outline'
import Anchor from '@/Components/Anchor'
import PrimaryTextButton from '@/Components/Buttons/PrimaryTextButton'
import CreateEditResourceForm from '@/Components/Forms/Choices/CreateEditResourceForm'
import { type Resource } from '@/types'

export default function EditableResourceListItem ({ resource }: { resource: Resource }): ReactElement {
  const [view, setView] = useState('show')

  const { data, put } = useForm({
    ...resource
  })

  const submit = (): void => {
    put(route('editor.resources.update'), {
      preserveScroll: true,
      preserveState: true
    })
  }

  const saveResource: FormEventHandler = (): void => {
    submit()
    setView('show')
  }

  return (
    <li className="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
      {view === 'show' ? (
        <>
          <div className="flex w-full flex-col">
            <span className="ml-2 truncate">{data.description}</span>
            <ul className="mt-3 ml-4 space-y-1">
              {data.links.map((link, linkIdx) => (
                <li className="flex" key={linkIdx}>
                  {link.type === 'document' && <DocumentTextIcon className="h-5 w-auto flex-shrink-0 text-gray-400" aria-hidden={true}/>}
                  {link.type === 'video' && <VideoCameraIcon className="h-5 w-auto flex-shrink-0 text-gray-400" aria-hidden={true}/>}
                  <Anchor href={link.link} className="pl-2">
                    {link.text}
                  </Anchor>
                </li>
              ))}
            </ul>
          </div>
          <div className="ml-4 flex-shrink-0">
            <PrimaryTextButton onClick={() => { setView('edit') }}>
              Edit
            </PrimaryTextButton>
          </div>
        </>
      ) : (
        <CreateEditResourceForm
          className="w-full"
          usage="edit"
          resource={resource}
          save={saveResource}
          setDisplay={() => { setView('show') }}
        />
      )}
    </li>
  )
}

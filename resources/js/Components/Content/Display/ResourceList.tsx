import { type ReactElement } from 'react'
import { type Resource } from '@/types'
import DocumentTextIcon from '@images/doc.png'
import PlayCircleIcon from '@images/vid.png'

export default function ResourceList ({ resources }: { resources: Resource[] }): ReactElement {
  return (
    <ul className="not-prose space-y-6">
      {resources.map((resource, index) => (
        <li key={index}>
          <span>{resource.description}</span>
          <ul className="pt-6">
            {resource.links.map((link, linkIdx) => (
              <li key={linkIdx}>
                <a href={link.link} className="flex items-center gap-x-1 hover:underline">
                  {link.type === 'document' ? (
                    <img src={DocumentTextIcon} className="h-auto w-5" aria-hidden="true" alt="document text icon"/>
                  ) : (
                    <img src={PlayCircleIcon} className="h-auto w-5" aria-hidden="true" alt="play circle icon"/>
                  )}
                  <span className="text-teal-600">{link.text}</span>
                </a>
              </li>
            ))}
          </ul>
        </li>
      ))}
    </ul>
  )
}

import { type ReactElement } from 'react'
import ResourceLink from '@/Components/Lists/ResourceLink'
import { type Resource } from '@/types'

export default function ResourceListItemPublic ({ resource }: { resource: Resource }): ReactElement {
  console.log('resource', resource)
  return (
    <li>
      <span>
          {resource.description}
      </span>
      <ul className="list-none">
        {resource.links.map((item, idx) => (
          <ResourceLink key={idx} resource={item}/>
        ))}
      </ul>
    </li>
  )
}

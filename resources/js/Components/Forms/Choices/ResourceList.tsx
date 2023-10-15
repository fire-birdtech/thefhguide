import { type ReactElement } from 'react'
import ContentBlockHeader from '@/Components/Forms/Choices/ContentBlockHeader'
import ResourceListItem from '@/Components/Lists/ResourceListItem'
import AddResourceItem from '@/Components/Forms/Choices/AddResourceItem'
import classNames from '@/Utils/classNames'
import { type Resource } from '@/types'

export default function ResourceList ({ value, remove, index, update }: {
  value: Resource[]
  index: number
  update: (index: number, value: string | Resource[]) => void
  remove?: (index: number) => void
}): ReactElement {
  const addResource = (resource: Resource): void => {
    value.push(resource)

    update(index, value)
  }

  return (
    <div className="flex flex-col">
      <ContentBlockHeader color="purple" remove={() => { remove(index) }}>
        Resource List
      </ContentBlockHeader>
      <div className="w-full p-4 border-2 border-purple-200 rounded-b-md rounded-tr-md">
        <ul className={classNames(
          value.length > 0 ? 'border border-gray-300 mb-2' : '',
          'divide-y divide-gray-300 rounded-md'
        )}>
          {value.map((resource, index) => (
            <ResourceListItem key={index} resource={resource}/>
          ))}
        </ul>
        <AddResourceItem add={(resource: Resource) => { addResource(resource) }}/>
      </div>
    </div>
  )
}

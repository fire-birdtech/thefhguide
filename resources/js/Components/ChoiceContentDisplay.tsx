import { type ReactElement } from 'react'
import { type ChoiceContent, type Resource } from '@/types'
import { ChoiceContentTypes } from '@/enums'
import ResourceListItemPublic from '@/Components/Lists/ResourceListItemPublic'

const ChoiceContentDisplay = ({ item, idx }: { item: ChoiceContent, idx: number }): ReactElement => {
  if (item.type === ChoiceContentTypes.SUMMARY) {
    return (
      <template key={idx}>
        <div className="text-gray-500 font-medium hover:underline">
          Summary
        </div>
        <div dangerouslySetInnerHTML={{ __html: item.data }}/>
      </template>
    )
  } else if (item.type === ChoiceContentTypes.EXERCISES) {
    return (
      <template key={idx}>
        <div className="text-gray-500 font-medium hover:underline">
          Exercises
        </div>
        <div dangerouslySetInnerHTML={{ __html: item.data }}/>
      </template>
    )
  } else if (item.type === ChoiceContentTypes.RESOURCES && typeof item.data !== 'string') {
    item.data.map((resource: Resource, index: number) => (
      <ResourceListItemPublic key={index} resource={resource}/>
    ))
  }
  return <div key={idx} dangerouslySetInnerHTML={{ __html: item.data }}/>
}

export default ChoiceContentDisplay

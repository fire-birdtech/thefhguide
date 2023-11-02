import { type ReactElement, useState } from 'react'
import { MinusIcon, PlusIcon } from '@heroicons/react/24/solid'
import { Header5 } from '@/Components/Typography/Headers'
import ResourceListItem from '@/Components/Lists/ResourceListItem'
import { ChoiceContentTypes } from '@/enums'
import { type Choice, type Resource } from '@/types'

const listStyleAlpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z']

export default function ExpandableChoiceItem ({ choice }: { choice: Choice }): ReactElement {
  const [expanded, setExpanded] = useState<boolean>(true)
  const [showSummary, setShowSummary] = useState<boolean>(false)
  const [showExercises, setShowExercises] = useState<boolean>(false)

  return (
    <li>
      <div onClick={() => { setExpanded(!expanded) }} className="flex items-center justify-between text-stone-400 text-2xl cursor-pointer">
        <div className="flex items-center">
          <div className="inline-flex items-center flex-shrink-0 justify-center w-10 h-10 bg-stone-400 text-white font-display font-medium rounded-full">
            {listStyleAlpha[choice.order - 1]}
          </div>
          <h4 className="ml-3 font-display font-medium">
            {choice.name}
          </h4>
        </div>
        <div className="flex items-center">
          {expanded ? (
            <MinusIcon className="h-8 w-8 flex-shrink-0"/>
          ) : (
            <PlusIcon className="h-8 w-8 flex-shrink-0"/>
          )}
        </div>
      </div>

      {expanded && (
        <div className="py-8 prose max-w-none space-y-6">
          {choice.content.map((item, index: number) => {
            if (item.type === ChoiceContentTypes.SUMMARY) {
              return <>
                <button
                  onClick={() => { setShowSummary(!showSummary) }}
                  className="text-stone-500 font-medium hover:underline"
                >
                  Summary
                </button>
                {showSummary && (
                  <div dangerouslySetInnerHTML={{ __html: item.data }}/>
                )}
              </>
            } else if (item.type === ChoiceContentTypes.RESOURCES) {
              return <>
                <Header5>
                  Resources
                </Header5>
                <ol>
                  {item.data.map((resource: Resource, index: number) => (
                    <ResourceListItem key={index} resource={resource}/>
                  ))}
                </ol>
              </>
            } else if (item.type === ChoiceContentTypes.EXERCISES) {
              return <>
                <button
                  onClick={() => { setShowExercises(!showExercises) }}
                  className="text-stone-500 font-medium hover:underline"
                >
                  Exercises
                </button>
                {showExercises && (
                  <div dangerouslySetInnerHTML={{ __html: item.data }}/>
                )}
              </>
            } else if (item.type === ChoiceContentTypes.HEADER) {
              return <Header5 key={index}>{item.data}</Header5>
            } else {
              return <div key={index} dangerouslySetInnerHTML={{ __html: item.data }}/>
            }
          })}
        </div>
      )}
    </li>
  )
}
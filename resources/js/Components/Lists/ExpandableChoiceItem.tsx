import { type ReactElement, useState } from 'react'
import { MinusIcon, PlusIcon } from '@heroicons/react/24/solid'
import { Header5 } from '@/Components/Typography/Headers'
import { ChoiceContentTypes } from '@/enums'
import { type Choice, type Resource } from '@/types'
import ResourceListItem from "@/Components/Lists/ResourceListItem";

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
        <article className="py-8 prose max-w-none space-y-6">
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
              return (
                <section>
                  <Header5>
                    Resources
                  </Header5>
                  <ol className="my-0 py-2 pl-0 list-decimal">
                    {item.data.map((resource: Resource, index: number) => (
                      <ResourceListItem key={index} resource={resource}/>
                    ))}
                  </ol>
                </section>
              )
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
              return <div>
                {choice.media.length > 0 ? (
                  <div className="not-prose float-right">
                    {choice.media.map((mediaItem) => (
                      <div className="group block w-full h-auto max-w-md ml-3 mb-3 overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                        <img src={mediaItem.url} alt={mediaItem.name} className="pointer-events-none object-cover group-hover:opacity-75" />
                        <button type="button" className="absolute inset-0 focus:outline-none">
                          <span className="sr-only">View details for {mediaItem.name}</span>
                        </button>
                      </div>
                    ))}
                  </div>
                ) : null}
                <div key={index} dangerouslySetInnerHTML={{ __html: item.data }}/>
              </div>
            }
          })}
        </article>
      )}
    </li>
  )
}

import { type Choice, type Goal } from '@/types'
import { type ReactElement } from 'react'
import ExpandableChoiceItem from '@/Components/Lists/ExpandableChoiceItem'

export default function GoalPageContent ({ goal }: { goal: Goal }): ReactElement {
  return (
    <div className="my-8 bg-stone-100 max-w-5xl mx-auto px-4 py-5 sm:px-12">
      <h4 className="text-2xl font-display font-medium leading-8 text-stone-900 sm:truncate sm:tracking-tight">
        Goal {goal.order}: {goal.section_name}
      </h4>
      <div className="mt-6 prose max-w-5xl" dangerouslySetInnerHTML={{ __html: goal.summary }}/>
      <h4 className="mt-16 text-2xl font-display font-medium leading-8 text-stone-900 sm:truncate sm:tracking-tight">
        Choices
      </h4>

      <ul className="mt-8 space-y-8">
        {goal?.choices.map((choice: Choice, index: number) => (
          <ExpandableChoiceItem key={index} choice={choice}/>
        ))}
      </ul>
    </div>
  )
}

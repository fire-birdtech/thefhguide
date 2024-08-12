import { type ReactElement } from 'react'
import { type Goal, type PageProps, type Project } from '@/types'
import Authenticated from '@/Layouts/Authenticated'
import OnlineTrackerNavigation from '@/Components/Navigation/online-tracker'
import { Head } from '@inertiajs/react'
import { Heading } from '@/Components/Typography/Headers'
import ChoiceItem from '@/Pages/Tracker/partials/ChoiceItem'

type Props = {
  project: Project
} & PageProps

function SectionHeader ({ goal }: { goal: Goal }): ReactElement {
  const header = `Goal ${goal.order}: ${goal.name}`
  return (
    <div className="border-y border-neutral-500 bg-neutral-100 px-0.5">
      <Heading level={3} color="teal" className="py-1.5">
        {header}
      </Heading>
    </div>
  )
}

function SectionBody ({ goal }: { goal: Goal }): ReactElement {
  return <>
    <div className="grid grid-cols-10 gap-x-4 py-2">
      <div className="col-span-3">
        <Heading level={4} color="teal" className="uppercase text-opacity-70">
          Choices
        </Heading>
      </div>
      <div className="col-span-3">
        <Heading level={4} color="teal" className="uppercase text-opacity-70">
          Notes
        </Heading>
      </div>
      <div className="col-span-3">
        <Heading level={4} color="teal" className="uppercase text-opacity-70">
          Status
        </Heading>
      </div>
      <div>
        <Heading level={4} color="teal" className="uppercase text-opacity-70">
          Date
        </Heading>
      </div>
    </div>
    <div className="space-y-2">
      {goal.choices.map((choice) => (
        <ChoiceItem key={choice.id} choice={choice} />
      ))}
    </div>
  </>
}

export default function TrackerProject ({ auth, project }: Props): ReactElement {
  const header = `${project.collection.name} Project ${project.order}: ${project.name}`

  return (
    <Authenticated
      user={auth.user}
      header={<OnlineTrackerNavigation/>}
    >
      <Head title={`Online Progress Tracker: ${project.name}`}/>

      <div className="p-4 sm:px-6 lg:px-8">
        <div className="bg-white overflow-hidden shadow-md ring-1 ring-gray-300 sm:rounded-sm">
          <Heading className="p-4">
            {header}
          </Heading>
          <div className="border-t border-gray-300 p-4 space-y-4">
            {project.goals.map((goal) => (
              <div key={goal.id}>
                <SectionHeader goal={goal}/>
                <SectionBody goal={goal}/>
              </div>
            ))}
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

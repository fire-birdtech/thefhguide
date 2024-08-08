import { type ReactElement } from 'react'
import {Head, Link} from '@inertiajs/react'
import Authenticated from '@/Layouts/Authenticated'
import {type Collection, type PageProps} from '@/types'
import OnlineTrackerNavigation from '@/Components/Navigation/online-tracker'
import { Heading } from '@/Components/Typography/Headers'

type Props = {
  collections: Collection[]
} & PageProps

function LearningPathCollection ({ collection }: { collection: Collection }): ReactElement {
  return (
    <div className="mt-4 flex flex-col">
      <Heading key={collection.id} level={4}>
        {collection.name}
      </Heading>
      <ul>
        {collection.projects.map((project) => (
          <li key={project.id}>
            <span>
              Project {project.order}:{' '}
            </span>
            <Link href="#" className="text-[#17a08f] hover:text-[#0056b3] hover:underline">
              {project.name}
            </Link>
          </li>
        ))}
      </ul>
    </div>
  )
}

export default function Dashboard ({ auth, collections }: Props): ReactElement {
  return (
    <Authenticated
      user={auth.user}
      header={<OnlineTrackerNavigation />}
    >
      <Head title="Online Progress Tracker"/>

      <div className="py-4">
        <div className="px-4 sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-md ring-1 ring-gray-300 sm:rounded-sm">
            <Heading className="p-4">
              Online Project Tracker
            </Heading>
            <div className="border-t border-gray-300 p-4">
              <p>
                Welcome to the Family History Guide Online Project Tracker! Here you can keep track of your progress
                through The Family History Guide from anywhere you have internet access.
              </p>
              <div className="mt-6">
                <Heading level={3}>
                  Learning Paths:
                </Heading>
                <div className="flex flex-wrap gap-8 items-start">
                  {collections.map((collection) => (
                    <LearningPathCollection key={collection.id} collection={collection} />
                  ))}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

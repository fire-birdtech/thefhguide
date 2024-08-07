import { type ReactElement } from 'react'
import { Head } from '@inertiajs/react'
import Authenticated from '@/Layouts/Authenticated'
import { type PageProps } from '@/types'
import OnlineTrackerNavigation from "@/Components/Navigation/online-tracker";

export default function Dashboard ({ auth }: PageProps): ReactElement {
  return (
    <Authenticated
      user={auth.user}
      header={<OnlineTrackerNavigation />}
    >
      <Head title="Online Progress Tracker"/>

      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6 text-gray-900">You&apos;re logged in!</div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

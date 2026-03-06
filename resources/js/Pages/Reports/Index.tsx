import Authenticated from '@/Layouts/Authenticated'
import {PageProps} from '@/types'
import {ReactElement} from 'react';
import {Head} from "@inertiajs/react";
import {Heading} from "@/Components/Typography/Headers";
import OnlineTrackerNavigation from "@/Components/Navigation/online-tracker";

export default function Reports ({ auth }: PageProps): ReactElement {
  return (
    <Authenticated user={auth.user} header={<OnlineTrackerNavigation />}>
      <Head title="Tracker Reports"/>

      <div className="p-4 sm:px-6 lg:px-8">
        <div className="bg-white overflow-hidden shadow-md ring-1 ring-gray-300 sm:rounded-sm">
          <Heading className="p-4">
            Reports
          </Heading>
          <div className="border-t border-gray-300 p-4 space-y-4">
            <p>View Current Reports</p>
            <p>View Historical Reports</p>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

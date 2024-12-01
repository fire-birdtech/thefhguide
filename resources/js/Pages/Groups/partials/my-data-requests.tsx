import { type ReactElement } from 'react'
import { Heading } from '@/Components/Typography/Headers'
import { type UserDataAccess } from '@/types'
import clsx from 'clsx'

export default function MyDataRequests ({ requests }: { requests: UserDataAccess[] }): ReactElement {
  return (
    <>
      <Heading level={2}>
        Request to View Others&apos; Data:
      </Heading>
      <p>
        These are users to whom you have sent data requests.
      </p>
      <ul role="list" className="divide-y divide-gray-100">
        {requests.map((request) => (
          <li key={request.id} className="flex items-center justify-between gap-x-6 py-5">
            <div className="min-w-0">
              <div className="flex items-start gap-x-3">
                <p className="text-sm/6 font-semibold text-gray-900">{request.name}</p>
                <p
                  className={clsx(
                    request.pivot.access_granted ? 'text-green-700 bg-green-50 ring-green-600/20' : 'text-gray-600 bg-gray-50 ring-gray-500/10',
                    'mt-0.5 whitespace-nowrap rounded-md px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset'
                  )}
                >
                  {request.pivot.access_granted ? 'Granted' : 'Pending'}
                </p>
              </div>
              <div className="mt-1 flex items-center gap-x-2 text-xs/5 text-gray-500">
                <p className="whitespace-nowrap">
                  Requested on <time dateTime={request.pivot.created_at}>{new Date(request.pivot.created_at).toLocaleDateString('en-us', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })}</time>
                </p>
              </div>
            </div>
          </li>
        ))}
      </ul>
    </>
  )
}

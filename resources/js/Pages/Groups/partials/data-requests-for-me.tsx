import { type ReactElement } from 'react'
import { Heading } from '@/Components/Typography/Headers'
import { type UserDataAccess } from '@/types'
import { router } from '@inertiajs/react'

export default function DataRequestsForMe ({ requests }: { requests: UserDataAccess[] }): ReactElement {
  const approve = (receiverId: number, senderId: number): void => {
    router.put(route('user-data-access.update'), {
      receiver_id: receiverId,
      sender_id: senderId
    }, {
      preserveScroll: true
    })
  }

  return (
    <>
      <Heading level={2}>
        Requests to View Your Data:
      </Heading>
      <p>
        These are users with whom you have shared your Online Tracker data, or who are requesting access to
        your data. When you approve a request, the requesting user can add your slider-bar data to their
        Reports. To remove access to your account data by a user you previously approved, click Revoke.
      </p>
      <ul role="list" className="divide-y divide-gray-100">
        {requests.map((request) => (
          <li key={request.id} className="flex items-center justify-between gap-x-6 py-5">
            <div className="min-w-0">
              <div className="flex items-start gap-x-3">
                <p className="text-sm/6 font-semibold text-gray-900">{request.name}</p>
              </div>
              <div className="mt-1 flex items-center gap-x-2 text-xs/5 text-gray-500">
                <p className="whitespace-nowrap">
                  Requested on <time
                  dateTime={request.pivot.created_at}>{new Date(request.pivot.created_at).toLocaleDateString('en-us', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })}</time>
                </p>
              </div>
            </div>
            <div className="flex flex-none items-center gap-x-2">
              {!request.pivot.access_granted && (
                <button
                  onClick={() => {
                    approve(request.pivot.receiver_id, request.pivot.sender_id)
                  }}
                  className="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-blue-900 shadow-sm ring-1 ring-inset ring-blue-300 hover:bg-blue-50"
                >
                  Approve
                </button>
              )}
              <button className="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                {request.pivot.access_granted ? 'Revoke' : 'Reject'}
              </button>
            </div>
          </li>
        ))}
      </ul>
    </>
  )
}

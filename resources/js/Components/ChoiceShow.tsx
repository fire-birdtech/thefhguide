import { type ReactElement } from 'react'
import ChoiceContentDisplay from '@/Components/ChoiceContentDisplay'
import { type Choice } from '@/types'

export default function ChoiceShow ({ choice }: {
  choice: Choice
}): ReactElement {
  return (
    <div className="border-t border-gray-200">
      <dl className="sm:divide-y sm:divide-gray-200">
        <div className="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt className="text-sm font-medium text-gray-500">
            Name
          </dt>
          <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-7">
            {choice.name}
          </dd>
        </div>
        <div className="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt className="text-sm font-medium text-gray-500">
            Media
          </dt>
          <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-7">
            {choice.media.length > 0 ? (
              <ul role="list" className="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-5 xl:gap-x-8">
                {choice.media.map((item) => (
                  <li key={item.id} className="relative">
                    <div className="group aspect-h-7 aspect-w-10 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                      <img src={item.url} alt="" className="pointer-events-none object-cover group-hover:opacity-75" />
                      <button type="button" className="absolute inset-0 focus:outline-none">
                        <span className="sr-only">View details for {item.name}</span>
                      </button>
                    </div>
                    <p className="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{item.name}</p>
                  </li>
                ))}
              </ul>
            ) : (
              <p className="text-sm text-gray-500">No media attached</p>
            )}
          </dd>
        </div>
        <div className="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt className="text-sm font-medium text-gray-500">
            Content
          </dt>
          <dd className="mt-1 text-sm text-gray-900 prose max-w-none space-y-6 sm:mt-0 sm:col-span-7">
            {choice.content.map((item, idx) => <ChoiceContentDisplay item={item} key={idx} idx={idx}/>)}
          </dd>
        </div>
      </dl>
    </div>
  )
}

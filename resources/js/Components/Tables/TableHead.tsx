import { type ReactElement } from 'react'
import classNames from '@/Utils/classNames'
import { type Cells } from '@/types'

export default function TableHead ({
  cells,
  actions = false,
  order = false
}: {
  cells: Cells
  actions?: boolean
  order?: boolean
}): ReactElement {
  return (
    <thead className="bg-gray-50">
    <tr>
      {Object.keys(cells).map((cell, index) => (
        <th
          key={index}
          scope="col"
          className={classNames(
            index === 0 ? 'pl-4 pr-3 sm:pl-6' : 'px-3',
            'py-2.5 text-left text-xs font-medium uppercase tracking-wide text-gray-500'
          )}
        >
          {cell}
        </th>
      ))}
      {order ? (
        <th
          scope="col"
          className="relative w-8 px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500"
        >
          Order
        </th>
      ) : null}
      {actions ? (
        <th
          scope="col"
          className="relative py-2.5 pl-3 pr-4 sm:pr-6"
        >
          <span className="sr-only">Manage</span>
        </th>
      ) : null}
    </tr>
    </thead>
  )
}

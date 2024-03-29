import classNames from '@/Utils/classNames'
import { Link } from '@inertiajs/react'
import Badge from '@/Components/Badge'
import { ArrowDownIcon, ArrowUpIcon } from '@heroicons/react/20/solid'
import { EyeIcon, PencilSquareIcon } from '@heroicons/react/24/solid'
import { type Actions, type Assignment, type Cells, type Draft, type Project, type User } from '@/types'
import { type ReactElement } from 'react'

interface TableBodyProps {
  actions: Actions
  cells: Cells
  rows: Assignment[] | Project[] | Draft[] | User[] | Page[]
  adminRouteType?: string
  routeType?: string
  order?: boolean
  moveDown?: () => void
  moveUp?: () => void
}

const convertModel = (model: string): string => model.split('\\')[2]

const renderTableData = (cellIdx: number, cellKey: string, routeType: string, row): ReactElement | string => {
  if (cellIdx === 0 && cellKey !== 'assignable') return <Link href={route(`${routeType}.show`, [row.id])} className="text-gray-900 hover:text-gray-700 font-semibold">{row[cellKey]}</Link>
  else if (cellIdx === 0 && cellKey === 'assignable') return row[cellKey].name
  else if (cellKey === 'type') return convertModel(row.assignable_type)
  else if (cellKey === 'status') return <Badge text={row.status}/>
  else if (cellKey === 'role') return <Badge text={row.roles[0].name}/>
  else if (cellKey === 'assignable' || cellKey === 'user') return row[cellKey].name
  else if (cellKey.includes('_at')) return new Date(row[cellKey]).toLocaleDateString('en-us', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })
  else return row[cellKey]
}

export default function TableBody ({ actions, cells, rows, adminRouteType = '', routeType = '', order = false }: TableBodyProps): ReactElement {
  const editRoute = (row): string => routeType !== null
    ? route(`${routeType ?? adminRouteType}.edit`, [row.id]) : ''

  return (
    <tbody className="bg-white">
    {rows.map((row, rowIdx) => (
      <tr
        key={rowIdx}
        className={rowIdx % 2 === 0 ? '' : 'bg-gray-50'}
      >
        {Object.keys(cells).map((cellKey, index) => (
          <td
            key={index}
            className={classNames(
              index === 0 ? 'pl-4 pr-3 sm:pl-6' : 'px-3',
              'whitespace-nowrap py-2.5 text-sm text-gray-500'
            )}
          >
            {renderTableData(index, cellKey, routeType, row)}
          </td>
        ))}
        {order ? (
          <td className="relative w-8 pl-4">
            <div className={classNames(rowIdx === rows.length - 1 ? 'pl-4' : '', 'inline-flex')}>
              {rowIdx !== rows.length - 1 && <ArrowDownIcon className="h-4 w-4 text-gray-500 hover:text-gray-600 cursor-pointer"/>}
              {rowIdx > 0 && <ArrowUpIcon className="h-4 w-4 text-gray-500 hover:text-gray-600 cursor-pointer"/>}
            </div>
          </td>
        ) : null}
        {actions !== undefined ? (
          <td
            className="flex justify-end whitespace-nowrap py-3 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
            {actions.view ? (
              <Link href={route(`${routeType}.show`, [row.id])} className="text-blue-600 hover:text-blue-900">
                <EyeIcon className="h-6 w-6"/>
                <span className="sr-only">View {row.name}</span>
              </Link>
            ) : null}
            {actions.edit ? (
              <Link href={editRoute(row)} className="text-blue-600 hover:text-blue-900">
                <PencilSquareIcon className="h-6 w-6"/>
                <span className="sr-only">Edit {row.name}</span>
              </Link>
            ) : null}
          </td>
        ) : null}
      </tr>
    ))}
    </tbody>
  )
}

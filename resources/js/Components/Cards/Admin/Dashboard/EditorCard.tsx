import { type ReactElement } from 'react'
import { UserCircleIcon } from '@heroicons/react/24/solid'
import Badge from '@/Components/Badge'
import { type Editor } from '@/types'

export default function EditorCard ({ editor }: {
  editor: Editor
}): ReactElement {
  return (
    <div
      className="group w-full border-2 border-transparent flex flex-col items-center justify-start rounded-lg bg-white text-center shadow">
      <div className="flex w-full items-center justify-between space-x-3 p-4">
        <UserCircleIcon className="h-10 w-10 flex-shrink-0 rounded-full text-blue-400"/>
        <div className="flex-1 truncate text-left">
          <div className="flex items-center space-x-3">
            <h3 className="truncate text-sm font-medium text-gray-900">
              {editor.name}
            </h3>
          </div>
          <p className="truncate text-sm text-gray-500">
            {editor.roles[0].name}
          </p>
        </div>
      </div>
      <div className="w-full">
        {(editor.unpublished_assignments.length > 0) || (editor.unpublished_drafts.length > 0) ? (
          <div className="w-full pb-3 space-y-3">
            <div className="flex flex-col w-full overflow-hidden">
              {(editor.unpublished_assignments.length > 0) ? (
                <>
                  <div className="w-full flex flex-col items-start">
                    <h4 className="truncate text-sm font-medium text-gray-900 px-4">
                      Assignments
                    </h4>
                  </div>
                  <div className="w-full bg-transparent pt-2 px-4">
                    <ul className="flex flex-col w-full">
                      {editor.unpublished_assignments.map((assignment) => (
                        <li key={assignment.id}
                            className="truncate w-full flex items-center justify-between text-xs py-1">
                          <span className="truncate">{assignment.assignable.name}</span>
                          <Badge text={assignment.status} className="ml-4"/>
                        </li>
                      ))}
                    </ul>
                  </div>
                </>
              ) : null}
            </div>
          </div>
        ) : null}
      </div>
    </div>
  )
}

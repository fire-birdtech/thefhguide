import { type ReactElement } from 'react'
import { Link, usePage } from '@inertiajs/react'
import classNames from '@/Utils/classNames'

export default function AdminNavigation (): ReactElement {
  const { component } = usePage()
  const { canManageEditors, currentUserRole: role } = usePage().props

  const dashboardLink: string = (role === 'admin' || role === 'super admin' || role === 'developer')
    ? route('admin.dashboard') : route('editor.dashboard')

  const contentComponents: string[] = [
    'Editor/Content/Index',
    'Editor/Content/Collections/Index', 'Editor/Content/Collections/Create', 'Editor/Content/Collections/Show', 'Editor/Content/Collections/Edit',
    'Editor/Content/Projects/Index', 'Editor/Content/Projects/Create', 'Editor/Content/Projects/Show', 'Editor/Content/Projects/Edit',
    'Editor/Content/Goals/Index', 'Editor/Content/Goals/Create', 'Editor/Content/Goals/Show', 'Editor/Content/Goals/Edit',
    'Editor/Content/Choices/Index', 'Editor/Content/Choices/Create', 'Editor/Content/Choices/Show', 'Editor/Content/Choices/Edit'
  ]

  const mediaComponents: string[] = [
    'Editor/Media/Index', 'Editor/Media/Create'
  ]

  const assignmentComponents: string[] = [
    'Admin/Assignments/Index', 'Admin/Assignments/Create', 'Admin/Assignments/Edit', 'Editor/Assignments/Show'
  ]

  const editorManagementComponents: string[] = [
    'Admin/Editors/Index', 'Admin/Editors/Create', 'Admin/Editors/Show', 'Admin/Editors/Edit'
  ]

  const navigation = [
    { name: 'Dashboard', href: dashboardLink, show: true, components: ['Admin/Dashboard', 'Editor/Dashboard'] },
    { name: 'Content', href: route('editor.content.index'), show: true, components: contentComponents },
    { name: 'Media Library', href: route('editor.media.index'), show: true, components: mediaComponents },
    { name: 'Assignments', href: route('admin.assignments.index'), show: canManageEditors, components: assignmentComponents },
    { name: 'Admins & Editors', href: route('admin.editors.index'), show: canManageEditors, components: editorManagementComponents },
    { name: 'Navigation', href: route('admin.navigation.index'), show: canManageEditors, components: ['Admin/Navigation/Index'] }
  ]

  const filteredNavigation = navigation.filter(item => item.show === true)

  return (
    <aside className="hidden lg:flex lg:flex-shrink-0">
      <div className="flex flex-col w-64">
        <div className="flex-1 flex flex-col min-h-0">
          <div className="flex-1 flex flex-col py-8 overflow-y-auto">
            <nav className="space-y-2 px-4" aria-label="Sidebar">
              {filteredNavigation.map((item, index) => (
                <Link
                  key={index}
                  href={item.href}
                  className={classNames(
                    item.components.includes(component) ? 'bg-gray-200 text-gray-900 font-semibold' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900',
                    'group flex items-center px-3 py-2 text-sm font-medium rounded-md'
                  )}
                >
                  {item.name}
                </Link>
              ))}
            </nav>
          </div>
        </div>
      </div>
    </aside>
  )
}

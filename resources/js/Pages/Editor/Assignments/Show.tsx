import { type ReactElement } from 'react'
import { type Assignment, type PageProps } from '@/types'
import { Head, router } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import PrimaryButtonWithDropDown from '@/Components/Buttons/PrimaryButtonWithDropdown'
import DescriptionListItem from '@/Components/Lists/DescriptionListItem'
import Badge from '@/Components/Badge'

export default function AssignmentShow ({ auth, assignment }: PageProps<{ assignment: Assignment }>): ReactElement {
  const completeAssignment = (): void => {
    router.put(route('editor.assignments.mark-complete', [assignment.id]))
  }

  const options = [
    { name: 'Mark Complete', icon: 'DocumentCheckIcon', show: true, action: () => { completeAssignment() } }
  ]

  return (
    <>
      <Head title="Assignment"/>

      <Admin user={auth.user}>
        <Container>
          <div className="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
            <div className="ml-4 mt-2">
              <Header3>
                Assignment Details
              </Header3>
            </div>
            {assignment.completed_at === null ? (
              <div className="ml-4 mt-2 space-x-2">
                <PrimaryButtonWithDropDown
                  href={route(`editor.${assignment.assignable_type.split('\\')[2].toLowerCase()}s.show`, [assignment.assignable_id])}
                  action={`Go to ${assignment.assignable_type.split('\\')[2]}`}
                  options={options}
                />
              </div>
            ) : null}
          </div>

          <div className="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <dl className="sm:divide-y sm:divide-gray-200">
              <DescriptionListItem term="Belongs to" details={assignment.assignable.name}/>
              <DescriptionListItem term="Status" details={<Badge text={assignment.status}/>}/>
              <DescriptionListItem term="Assigned to" details={assignment.user.name}/>
            </dl>
          </div>

          <div className="mt-3 ml-4 flex flex-col space-y-1">
            <small className="text-gray-500">
              Created: {new Date(assignment.created_at).toLocaleDateString('en-us', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })}
            </small>
            {assignment.updated_at !== assignment.created_at ? (
              <small className="text-gray-500">
                Updated: {new Date(assignment.updated_at).toLocaleDateString('en-us', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })}
              </small>
            ) : null}
            {assignment.completed_at !== null ? (
              <small className="text-gray-500">
                Completed: {new Date(assignment.completed_at).toLocaleDateString('en-us', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })}
              </small>
            ) : null}
          </div>
        </Container>
      </Admin>
    </>
  )
}

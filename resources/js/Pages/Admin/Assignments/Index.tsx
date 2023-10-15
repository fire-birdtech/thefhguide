import { type ReactElement } from 'react'
import { Head } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import TableHeader from '@/Components/Tables/TableHeader'
import Table from '@/Components/Tables/Table'
import TableHead from '@/Components/Tables/TableHead'
import TableBody from '@/Components/Tables/TableBody'
import NoAssignments from '@/Components/EmptyStates/NoAssignments'
import { type Actions, type Assignment, type Cells, type PageProps } from '@/types'

const cells: Cells = {
  assignable: 'Belong to',
  type: 'Type',
  user: 'Assigned Editor',
  status: 'Status'
}

const tableActions: Actions = {
  view: true,
  edit: true
}

export default function AssignmentsIndex ({ assignments, auth }: PageProps<{ assignments: Assignment[] }>): ReactElement {
  return (
    <>
      <Head title="Assignments"/>

      <Admin user={auth.user}>
        <Container>
          {assignments.length > 0 ? (
            <>
              <TableHeader header="Assignments"/>
              <Table className="mt-2">
                <TableHead cells={cells} actions={true}/>
                <TableBody
                  cells={cells}
                  rows={assignments}
                  routeType="editor.assignments"
                  adminRouteType="admin.assignments"
                  actions={tableActions}
                />
              </Table>
            </>
          ) : <NoAssignments/>}
        </Container>
      </Admin>
    </>
  )
}

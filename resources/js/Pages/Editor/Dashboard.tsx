import {Head} from "@inertiajs/react";
import {Actions, Assignment, Cells, Draft, PageProps} from "@/types";
import Admin from "@/Layouts/Admin";
import TableHeader from "@/Components/Tables/TableHeader";
import Table from "@/Components/Tables/Table";
import TableBody from "@/Components/Tables/TableBody";
import TableHead from "@/Components/Tables/TableHead";
import NoAssignments from "@/Components/EmptyStates/NoAssignments";
import DraftList from "@/Components/Drafts/DraftList";

const cells: Cells = {
  assignable: 'Belongs to',
  type: 'Type',
  status: 'Status',
  created_at: 'Created',
}

const tableActions: Actions = {
  view: true,
  edit: false,
}

export default function EditorDashboard({assignments, auth, drafts}: PageProps<{ assignments: Assignment[], drafts: Draft[] }>) {
  return (
    <>
      <Head title="Editor Dashboard"/>

      <Admin user={auth.user}>
        <div className="flex-1 px-4 py-8 sm:px-6 lg:px-8">
          <header>
            <div className="mx-auto">
              <h2 className="text-xl font-bold leading-tight tracking-tight text-gray-900">
                Welcome, {auth.user.name.split(' ')[0]}
              </h2>
            </div>
          </header>

          {assignments.length ? (
            <>
              <TableHeader header="Assignments"/>
              <Table className="mt-2">
                <TableHead cells={cells} actions={true}/>
                <TableBody
                  cells={cells}
                  rows={assignments}
                  routeType="editor.assignments"
                  actions={tableActions}
                />
              </Table>
            </>
          ) : <NoAssignments/>}

          {drafts.length ? <DraftList drafts={drafts}/> : null}
        </div>
      </Admin>
    </>
  );
}

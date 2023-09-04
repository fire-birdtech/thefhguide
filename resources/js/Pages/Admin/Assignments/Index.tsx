import {Head} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import TableHeader from "@/Components/Tables/TableHeader";
import Table from "@/Components/Tables/Table";
import TableHead from "@/Components/Tables/TableHead";
import TableBody from "@/Components/Tables/TableBody";
import NoAssignments from "@/Components/EmptyStates/NoAssignments";

const cells = {
    assignable: 'Belong to',
    type: 'Type',
    user: 'Assigned Editor',
    status: 'Status',
};

const tableActions = {
    view: true,
    edit: true,
};

export default function AssignmentsIndex({ assignments, auth }) {
    return (
        <>
            <Head title="Assignments"/>

            <Admin user={auth.user}>
                <Container>
                    {assignments ? (
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
    );
}

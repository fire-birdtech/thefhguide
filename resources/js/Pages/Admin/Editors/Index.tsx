import {type ReactElement, useState} from "react";
import {Dialog} from "@headlessui/react";
import {TrashIcon} from "@heroicons/react/24/solid";
import {Head, router} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import TableHeader from "@/Components/Tables/TableHeader";
import Table from "@/Components/Tables/Table";
import TableHead from "@/Components/Tables/TableHead";
import TableBody from "@/Components/Tables/TableBody";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import DangerModal from "@/Components/Modals/Danger";
import {type Invitation, type PageProps, type User} from "@/types";

export default function EditorIndex({ auth, invitations, users }: PageProps<{
  invitations: Invitation[];
  users: User[];
}>): ReactElement {
  const [confirmDeleteInvitation, setConfirmDeleteInvitation] = useState<boolean>(false);
  const [selectedInvitationToBeDeleted, setSelectedInvitationToBeDeleted] = useState<Invitation|undefined>(undefined);

  const findInvitationById = (id: number): Invitation => {
    return invitations.find(invitation => invitation.id === id);
  }
  const selectInvitationForDeletion = (id: number): void => {
    setSelectedInvitationToBeDeleted(findInvitationById(id));
    setConfirmDeleteInvitation(true);
  }

  const remainingTime = (time: string): number => {
    return Date.now() - new Date(time).getTime();
  }
  const invitationIsExpired = (time: string): boolean => {
    return remainingTime(time) > 86400000;
  }

  const resendInvitation = (invitation: Invitation): void => {
    router.post(route('admin.invitations.resend', [invitation]));
  }
  const deleteInvitation = () => {
    router.delete(route('admin.invitations.destroy', selectedInvitationToBeDeleted.id), {
      onSuccess: () => setConfirmDeleteInvitation(false);
    });
  }
  const cells = {
    name: 'Name',
    email: 'Email',
    role: 'Role'
  }
  const tableActions = {
    view: true,
    edit: true
  }

  return (
    <>
      <Head title="Admin - Editors"/>

      <Admin user={auth.user}>
        <Container>
          <TableHeader header="Admins & Editors" addText="Invite" addRoute={route('admin.editors.create')}/>
          <Table className="mt-2">
            <TableHead cells={cells} actions={true}/>
            <TableBody
              cells={cells}
              rows={users}
              routeType="admin.editors"
              actions={tableActions}
            />
          </Table>

          {invitations.length > 0 ? (
            <div className="mt-12">
              <div className="sm:flex sm:items-center">
                <div className="sm:flex-auto">
                  <h1 className="text-xl font-semibold text-gray-900">
                    Invitations
                  </h1>
                </div>
              </div>
              <div className="mt-4 flex flex-col">
                <div className="flow-root bg-white shadow overflow-hidden sm:rounded-md">
                  <ul role="list" className="divide-y divide-gray-200">
                    {invitations.map((invitation) => (
                      <li className="py-4" key={invitation.id}>
                        <div className="flex items-center space-x-4 px-4">
                          <div className="flex-1 min-w-0">
                            <p className="text-sm font-medium text-gray-900 truncate">
                              {invitation.name}
                            </p>
                            <p className="text-sm text-gray-500 truncate">
                              {invitation.email}
                            </p>
                          </div>
                          <div className="flex items-center space-x-2">
                            {invitationIsExpired(invitation.updated_at) === true ? (
                              <SecondaryButton onClick={resendInvitation(invitation)}>
                                Resend
                              </SecondaryButton>
                            ) : null}
                              <SecondaryButton onClick={() => selectInvitationForDeletion(invitation.id)}>
                                <TrashIcon className="h-5 w-5"/>
                                <span className="sr-only">
                                    Delete invitation for {invitation.name}
                                </span>
                              </SecondaryButton>
                          </div>
                        </div>
                      </li>
                    ))}
                  </ul>
                </div>
              </div>
            </div>
          ) : null}
        </Container>
      </Admin>

      <DangerModal
        dangerButtonText="Delete"
        destroy={deleteInvitation}
        open={confirmDeleteInvitation}
        setOpen={setConfirmDeleteInvitation}
      >
        <Dialog.Title as="h3" className="text-lg font-medium leading-6 text-gray-900">
          Delete Invitation
        </Dialog.Title>
        <div className="mt-2">
          <p className="text-sm text-gray-500">
              Are you sure you want to delete this invitation for {selectedInvitationToBeDeleted?.name}?
              All data will be permanently removed forever. This action
              cannot be undone.
          </p>
        </div>
      </DangerModal>
    </>
  );
}

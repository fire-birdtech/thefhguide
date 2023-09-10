import {type ReactElement, useState} from "react";
import {Head} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import SecondaryButtonWithDropdown from "@/Components/Buttons/SecondaryButtonWithDropdown";
import DescriptionListItem from "@/Components/Lists/DescriptionListItem";
import Badge from "@/Components/Badge";
import {type PageProps, type User} from "@/types";

export default function EditorShow({auth, user}: PageProps<{ user: User }>): ReactElement {
  const [confirmRemoveUserRole, setConfirmRemoveUserRole] = useState<boolean>(false);

  const usersMatch = auth.user.id === user.id;

  const upperCaseRole = () => user.roles[0].name.charAt(0).toUpperCase() + user.roles[0].name.slice(1);

  const actions = [
    [
      { name: 'Edit', as: 'link', icon: 'PencilSquareIcon', href: route('admin.editors.edit', [user.id]) }
    ],
    [
      { name: `Remove ${upperCaseRole()}`, as: 'emitter', icon: 'UserMinusIcon', emit: () => setConfirmRemoveUserRole(true), disabled: usersMatch }
    ]
  ];

  return (
    <>
      <Head title={`Admin - ${user.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <div className="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
            <div className="ml-4 mt-2">
              <Header3>
                Editor Details: {user.name}
              </Header3>
            </div>
            <div className="ml-4">
              <SecondaryButtonWithDropdown
                buttonText="Options"
                actions={actions}
              />
            </div>
          </div>

          <div className="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <dl className="sm:divide-y sm:divide-gray-200">
              <DescriptionListItem term="Name" details={user.name}/>
              <DescriptionListItem term="Email" details={user.email}/>
              <DescriptionListItem term="Role" details={<Badge text={user.roles[0].name}/>}/>
              {user.admin !== null ? (
                <DescriptionListItem term="Admin" details={user.admin.name}/>
              ) : null}
            </dl>
          </div>
        </Container>
      </Admin>
    </>
  );
}

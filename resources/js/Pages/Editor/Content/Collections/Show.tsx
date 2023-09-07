import {Head, useForm} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import SecondaryButtonWithDropdown from "@/Components/Buttons/SecondaryButtonWithDropdown";
import {useState} from "react";
import {ArchiveBoxIcon, PencilSquareIcon} from "@heroicons/react/24/solid";
import TableHeader from "@/Components/Tables/TableHeader";
import Table from "@/Components/Tables/Table";
import TableHead from "@/Components/Tables/TableHead";
import TableBody from "@/Components/Tables/TableBody";

export default function CollectionShow({ auth, collection }) {
  const [confirmCollectionArchive, setConfirmCollectionArchive] = useState(false);

  const updateOrder = (updatedProject, siblingProject) => {
    const {data, setData, errors, put, reset, processing} = useForm({
      updatedProject,
      siblingProject,
    });

    put(route('editor.projects.update-order', [updatedProject]), {
      preserveScroll: true,
    });
  }

  const sortedProjects = collection.projects.sort((a,b) => a.order - b.order);

  const findProjectIndex = (orderNumber: number) => {
    return sortedProjects.findIndex(project => project.order === orderNumber);
  };

  const moveDown = (orderNumber: number) => {
    let index = findProjectIndex(orderNumber);

    sortedProjects[index].order++;
    sortedProjects[index + 1].order--;

    updateOrder(sortedProjects[index + 1], sortedProjects[index]);
  }

  const moveUp = (orderNumber: number) => {
    let index = findProjectIndex(orderNumber);

    sortedProjects[index].order--;
    sortedProjects[index - 1].order++;

    updateOrder(sortedProjects[index - 1], sortedProjects[index]);
  }

  const actions = [
    [
      { name: 'Edit', as: 'link', icon: PencilSquareIcon, href: route('editor.collections.edit', [collection.id]) },
    ],
    [
      { name: 'Archive', as: 'emitter', icon: ArchiveBoxIcon, emit: () => setConfirmCollectionArchive(true) },
    ],
  ];

  const projectCells = {
    name: 'Name',
  };
  const draftCells = {
    name: 'Name',
    user: 'Author',
    updated_at: 'Last Updated',
  };

  const tableActions = {
    view: true,
    edit: true,
  };

  return (
    <>
      <Head title={`Admin - ${collection.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <div>
            <div className="-ml-4 flex items-center justify-between flex-wrap sm:flex-nowrap">
              <div className="ml-4">
                <Header3>
                  Collection Details: {collection.name}
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
                <div className="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt className="text-sm font-medium text-gray-500">
                    Name
                  </dt>
                  <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    {collection.name}
                  </dd>
                </div>
              </dl>
            </div>
          </div>

          <div className="mt-12">
            <TableHeader
              header="Projects"
              addText="Add project"
              addRoute={route(
                'editor.drafts.create',
                {type: 'project', parent_id: collection.id})}
            />
            <Table className="mt-2">
              <TableHead cells={projectCells} actions={true} order={true}/>
              <TableBody
                cells={projectCells}
                rows={sortedProjects}
                routeType="editor.projects"
                actions={tableActions}
                order={true}
                moveDown={() => moveDown}
                moveUp={() => moveUp}
              />
            </Table>
          </div>

          {collection.child_drafts.length > 0 ? (
            <div className="mt-12">
              <TableHeader header="Project Drafts"/>
              <Table className="mt-2">
                <TableHead cells={draftCells} actions={true}/>
                <TableBody
                  cells={draftCells}
                  rows={collection.child_drafts}
                  routeType="editor.drafts"
                  actions={tableActions}
                />
              </Table>
            </div>
          ) : null}
        </Container>
      </Admin>
    </>
  );
}

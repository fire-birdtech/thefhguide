import {useState} from "react";
import {Head, Link, useForm} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import SecondaryButtonWithDropdown from "@/Components/Buttons/SecondaryButtonWithDropdown";
import TableHeader from "@/Components/Tables/TableHeader";
import Table from "@/Components/Tables/Table";
import TableHead from "@/Components/Tables/TableHead";
import TableBody from "@/Components/Tables/TableBody";
import Prose from "@/Components/Prose";

export default function GoalShow({ auth, goal }) {
  const [confirmGoalArchive, setConfirmGoalArchive] = useState(false);

  const updateOrder = (updated, sibling) => {
    const {data, setData, errors, put, reset, processing} = useForm({
      updated,
      sibling,
    });

    put(route('editor.choices.update-order'), {
      preserveScroll: true,
    });
  }

  const sortedChoices = goal.choices.sort((a,b) => a.order - b.order);

  const findChoiceIndex = (orderNumber: number) => {
    return sortedChoices.findIndex(choice => choice.order === orderNumber);
  };

  const moveDown = (orderNumber: number) => {
    let index = findChoiceIndex(orderNumber);

    sortedChoices[index].order++;
    sortedChoices[index + 1].order--;

    updateOrder(sortedChoices[index + 1], sortedChoices[index]);
  }

  const moveUp = (orderNumber: number) => {
    let index = findChoiceIndex(orderNumber);

    sortedChoices[index].order--;
    sortedChoices[index - 1].order++;

    updateOrder(sortedChoices[index - 1], sortedChoices[index]);
  }

  const actions = [
    [
      { name: 'Edit', as: 'link', icon: 'PencilSquareIcon', href: route('editor.goals.edit', [goal.id]) },
      { name: 'Add Assignment', as: 'link', icon: 'PlusCircleIcon', href: `${route('admin.assignments.create')}?assignable_id=${goal.id}&assignable_type=goal` },
      { name: 'Preview Goal', as: 'link', icon: 'WindowIcon', href: route('editor.goals.preview', [goal.id]), target: '_blank' },
    ],
    [
      { name: 'Archive', as: 'emitter', icon: 'ArchiveBoxIcon', emit: () => setConfirmGoalArchive(true) },
    ],
  ];

  const draftCells = {
    name: 'Name',
    user: 'Author',
    updated_at: 'Last Updated'
  }
  const tableActions = {
    view: true,
    edit: true
  }

  return (
    <>
      <Head title={`Admin - Goals - ${goal.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <div className="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
            <div className="ml-4 mt-2">
              <Header3>
                Goal Details {goal.name}
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
                  {goal.name}
                </dd>
              </div>
              <div className="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt className="text-sm font-medium text-gray-500">
                  Summary
                </dt>
                <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  <Prose html={goal.summary}/>
                </dd>
              </div>
              <div className="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt className="text-sm font-medium text-gray-500">
                  "Show Me" Video
                </dt>
                <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                  {goal.show_me_video_url}
                </dd>
              </div>
              <div className="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt className="text-sm font-medium text-gray-500">
                  Belongs to
                </dt>
                <dd className="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                  <Link className="hover:text-gray-600" href={route('editor.projects.show', [goal.project_id])}>
                    {goal.project.name}
                  </Link>
                </dd>
              </div>
            </dl>
          </div>

          <div className="mt-12">
            <TableHeader
              header="Choices"
              addText="Add choice"
              addRoute={route('editor.drafts.create', {type: 'choice', parent_id: goal.id})}
            />
            <ul className="mt-3 space-y-2"></ul>
          </div>

          {goal.child_drafts.length > 0 ? (
            <div className="mt-12">
              <TableHeader header="Choice Drafts"/>
              <Table className="mt-2">
                <TableHead cells={draftCells} actions={true}/>
                <TableBody
                  cells={draftCells}
                  rows={goal.child_drafts}
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

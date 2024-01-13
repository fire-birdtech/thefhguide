import { type FormEventHandler, type ReactElement, useState } from 'react'
import { Head, Link, router } from '@inertiajs/react'
import { Dialog } from '@headlessui/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import SecondaryButtonWithDropdown from '@/Components/Buttons/SecondaryButtonWithDropdown'
import TableHeader from '@/Components/Tables/TableHeader'
import Table from '@/Components/Tables/Table'
import TableHead from '@/Components/Tables/TableHead'
import TableBody from '@/Components/Tables/TableBody'
import Prose from '@/Components/Prose'
import DangerModal from '@/Components/Modals/Danger'
import ExpandableStackedListItem from '@/Components/Lists/ExpandableStackedListItem'
import { DescriptionList, DescriptionListItem } from '@/Components/DescriptionList'
import { type Goal, type MediaFile, type PageProps } from '@/types'
import { MediaFilesProvider } from '@/contexts/MediaFilesContext'

export default function GoalShow ({ auth, goal, files }: PageProps<{
  goal: Goal
  files: MediaFile[]
}>): ReactElement {
  const [confirmGoalArchive, setConfirmGoalArchive] = useState(false)

  const archive: FormEventHandler = (e) => {
    e.preventDefault()

    router.delete(route('editor.goals.destroy', [goal.id]))
  }

  const sortedChoices = goal.choices.sort((a, b) => a.order - b.order)

  const actions = [
    [
      { name: 'Edit', as: 'link', icon: 'PencilSquareIcon', href: route('editor.goals.edit', [goal.id]) },
      { name: 'Add Assignment', as: 'link', icon: 'PlusCircleIcon', href: `${route('admin.assignments.create')}?assignable_id=${goal.id}&assignable_type=goal` },
      { name: 'Preview Goal', as: 'link', icon: 'WindowIcon', href: route('editor.goals.preview', [goal.id]), target: '_blank' }
    ],
    [
      { name: 'Archive', as: 'emitter', icon: 'ArchiveBoxIcon', emit: () => { setConfirmGoalArchive(true) } }
    ]
  ]

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
            <DescriptionList>
              <DescriptionListItem term="Name" details={goal.name}/>
              <DescriptionListItem term="Summary">
                <Prose html={goal.summary}/>
              </DescriptionListItem>
              <DescriptionListItem term={'"Show Me" Video'} details={goal.show_me_video_url}/>
              <DescriptionListItem term="Belongs to">
                <Link className="text-gray-900 font-bold hover:text-gray-600" href={route('editor.projects.show', [goal.project_id])}>
                  {goal.project.name}
                </Link>
              </DescriptionListItem>
            </DescriptionList>
          </div>

          <div className="mt-12">
            <TableHeader
              header="Choices"
              addText="Add choice"
              addRoute={route('editor.drafts.create', { type: 'choice', parent_id: goal.id })}
            />
            <MediaFilesProvider initialFiles={files}>
              <ul className="mt-3 space-y-2">
                {sortedChoices.map((choice) => <ExpandableStackedListItem item={choice} key={choice.id}/>)}
              </ul>
            </MediaFilesProvider>
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

      <DangerModal dangerButtonText="Archive" destroy={archive} open={confirmGoalArchive} setOpen={setConfirmGoalArchive}>
        <Dialog.Title as="h3" className="text-lg font-medium leading-6 text-gray-900">
          Archive Goal
        </Dialog.Title>
        <div className="mt-2">
          <p className="text-sm text-gray-500">
            Are you sure you want to archive {goal.name}?
          </p>
        </div>
      </DangerModal>
    </>
  )
}

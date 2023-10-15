import { type FormEventHandler, Fragment, type ReactElement, useState } from 'react'
import { Dialog, Transition } from '@headlessui/react'
import { Head, Link, router, useForm } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import SecondaryButtonWithDropdown from '@/Components/Buttons/SecondaryButtonWithDropdown'
import SecondaryButtonSmall from '@/Components/Buttons/SecondaryButtonSmall'
import TableHeader from '@/Components/Tables/TableHeader'
import Table from '@/Components/Tables/Table'
import TableHead from '@/Components/Tables/TableHead'
import TableBody from '@/Components/Tables/TableBody'
import DangerModal from '@/Components/Modals/Danger'
import { type Goal, type PageProps, type Project } from '@/types'

export default function ProjectShow ({ auth, project }: PageProps<{ project: Project }>): ReactElement {
  const [confirmProjectArchive, setConfirmProjectArchive] = useState(false)
  const [showCoverImagePreview, setShowCoverImagePreview] = useState(false)

  const updateOrder = (updated: Goal, sibling: Goal): void => {
    const { put } = useForm({
      updated,
      sibling
    })

    put(route('editor.goals.update-order', [updated]), {
      preserveScroll: true
    })
  }

  const archive: FormEventHandler = (e) => {
    e.preventDefault()

    router.delete(route('editor.projects.destroy', [project.id]))
  }

  const sortedGoals = project.goals.sort((a, b) => a.order - b.order)

  const findGoalIndex = (orderNumber: number): number => {
    return sortedGoals.findIndex(goal => goal.order === orderNumber)
  }

  const moveDown = (orderNumber: number): void => {
    const index = findGoalIndex(orderNumber)

    sortedGoals[index].order++
    sortedGoals[index + 1].order--

    updateOrder(sortedGoals[index + 1], sortedGoals[index])
  }

  const moveUp = (orderNumber: number): void => {
    const index = findGoalIndex(orderNumber)

    sortedGoals[index].order--
    sortedGoals[index - 1].order++

    updateOrder(sortedGoals[index - 1], sortedGoals[index])
  }

  const actions = [
    [
      { name: 'Edit', as: 'link', icon: 'PencilSquareIcon', href: route('editor.projects.edit', [project.id]) }
    ],
    [
      { name: 'Archive', as: 'emitter', icon: 'ArchiveBoxIcon', emit: () => { setConfirmProjectArchive(true) } }
    ]
  ]

  const goalCells = {
    name: 'Name'
  }
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
      <Head title={`Admin - Projects - ${project.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <div className="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
            <div className="ml-4 mt-2">
              <Header3>
                Project Details: {project.name}
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
                  {project.name}
                </dd>
              </div>
              <div className="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt className="text-sm font-medium text-gray-500">
                  Belongs to
                </dt>
                <dd className="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                  <Link className="hover:text-gray-600" href={route('editor.collections.show', [project.collection_id])}>
                    {project.collection.name}
                  </Link>
                </dd>
              </div>
              <div className="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt className="text-sm font-medium text-gray-500">
                  Cover Image
                </dt>
                <dd className="mt-1 text-sm font-bold text-gray-900 sm:mt-0 sm:col-span-2">
                  {project.cover_image_path !== undefined ? (
                    <SecondaryButtonSmall className="-my-2 sm:-my-2.5" onClick={() => { setShowCoverImagePreview(true) }}>
                      Show image
                    </SecondaryButtonSmall>
                  ) : (
                    <div className="mt-1 text-sm font-normal text-gray-500 sm:mt-0 sm:col-span-2">
                      No cover image available
                    </div>
                  )}
                </dd>
              </div>
            </dl>
          </div>

          <div className="mt-12">
            <TableHeader
              header="Goals"
              addText="Add goal"
              addRoute={route(
                'editor.drafts.create',
                { type: 'goal', parent_id: project.id })}
            />
            <Table className="mt-2">
              <TableHead cells={goalCells} order={true} actions={true}/>
              <TableBody
                cells={goalCells}
                rows={sortedGoals}
                routeType="editor.goals"
                actions={tableActions}
                order={true}
                moveDown={() => moveDown}
                moveUp={() => moveUp}
              />
            </Table>
          </div>

          {project.child_drafts.length > 0 ? (
            <div className="mt-12">
              <TableHeader header="Goal Drafts"/>
              <Table className="mt-2">
                <TableHead cells={draftCells} actions={true}/>
                <TableBody
                  cells={draftCells}
                  rows={project.child_drafts}
                  routeType="editor.drafts"
                  actions={tableActions}
                />
              </Table>
            </div>
          ) : null}
        </Container>

        {/* Cover Image Preview */}
        <Transition.Root
          show={showCoverImagePreview}
          as={Fragment}
        >
          <Dialog as="div" className="relative z-10" onClose={setShowCoverImagePreview}>
            <Transition.Child
              as={Fragment}
              enter="ease-out duration-300"
              enterFrom="opacity-0"
              enterTo="opacity-100"
              leave="ease-in duration-200"
              leaveFrom="opacity-100"
              leaveTo="opacity-0"
            >
              <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
            </Transition.Child>

            <div className="fixed inset-0 z-10 overflow-y-auto">
              <div className="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <Transition.Child
                  as={Fragment}
                  enter="ease-out duration-300"
                  enterFrom="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                  enterTo="opacity-100 translate-y-0 sm:scale-100"
                  leave="ease-in duration-200"
                  leaveFrom="opacity-100 translate-y-0 sm:scale-100"
                  leaveTo="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                >
                  <Dialog.Panel className="relative transform block w-full h-full overflow-hidden rounded-lg bg-gray-600 text-left shadow-xl transition-all sm:w-full sm:max-w-4xl">
                    <img src={project.cover_image_url} alt={`${project.name} cover image`} className="object-cover pointer-events-none"/>
                  </Dialog.Panel>
                </Transition.Child>
              </div>
            </div>
          </Dialog>
        </Transition.Root>
      </Admin>

      <DangerModal dangerButtonText="Archive" destroy={archive} open={confirmProjectArchive} setOpen={setConfirmProjectArchive}>
        <Dialog.Title as="h3" className="text-lg font-medium leading-6 text-gray-900">
          Archive Project
        </Dialog.Title>
        <div className="mt-2">
          <p className="text-sm text-gray-500">
            Are you sure you want to archive {project.name}?
          </p>
        </div>
      </DangerModal>
    </>
  )
}

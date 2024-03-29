import { Fragment, type ReactElement, useState } from 'react'
import { Dialog, Transition } from '@headlessui/react'
import { ArrowTopRightOnSquareIcon } from '@heroicons/react/24/outline'
import { Head } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import Container from '@/Components/Container'
import { Header3 } from '@/Components/Typography/Headers'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import { DescriptionList, DescriptionListItem } from '@/Components/DescriptionList'
import SecondaryButtonSmall from '@/Components/Buttons/SecondaryButtonSmall'
import Anchor from '@/Components/Anchor'
import ChoiceContentDisplay from '@/Components/ChoiceContentDisplay'
import { type ChoiceContent, type Draft, type PageProps } from '@/types'
import Prose from '@/Components/Prose'

export default function DraftShow ({ auth, draft }: PageProps<{ draft: Draft }>): ReactElement {
  const [showCoverImagePreview, setShowCoverImagePreview] = useState(false)

  return (
    <>
      <Head title={`Admin - Drafts - ${draft.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <div>
            <div className="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
              <div className="ml-4 mt-2">
                <Header3>
                  Draft Details: {draft.name}
                </Header3>
              </div>
              <div className="ml-4">
                <PrimaryButton href={route('editor.drafts.edit', [draft.id])}>
                  Edit
                </PrimaryButton>
              </div>
            </div>

            <div className="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
              <DescriptionList>
                <DescriptionListItem term="Name" details={draft.name}/>
                {draft.cover_image_path !== null && (
                  <DescriptionListItem term="Cover Image">
                    <SecondaryButtonSmall
                      onClick={() => { setShowCoverImagePreview(true) }}
                      className="-my-2 sm:-my-2.5"
                    >
                      Show image
                    </SecondaryButtonSmall>
                  </DescriptionListItem>
                )}
                {draft.summary !== null && (
                  <DescriptionListItem term="Summary" className="prose max-w-3xl prose-a:text-blue-500">
                    <Prose html={draft.summary}/>
                  </DescriptionListItem>
                )}
                {draft.show_me_video_url !== null && (
                  <DescriptionListItem term={'"Show Me" Video'} className="hover:text-gray-700">
                    <Anchor href={draft.show_me_video_url} target="_blank" className="flex items-center group">
                      <span>{draft.show_me_video_url}</span>
                      <ArrowTopRightOnSquareIcon className="ml-3 flex-shrink-0 h-4 w-4"/>
                    </Anchor>
                  </DescriptionListItem>
                )}
                {draft.content !== null && (
                  <DescriptionListItem
                    term="Content"
                    className="prose max-w-none space-y-6"
                    details={draft.content.map((item: ChoiceContent, idx: number) => <ChoiceContentDisplay item={item} idx={idx} key={idx}/>)}
                  />
                )}
              </DescriptionList>
            </div>
          </div>
        </Container>
      </Admin>

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
            <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"/>
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
                  <img src={draft.cover_image_url} alt={`${draft.name} cover image`} className="object-cover pointer-events-none"/>
                </Dialog.Panel>
              </Transition.Child>
            </div>
          </div>
        </Dialog>
      </Transition.Root>
    </>
  )
}

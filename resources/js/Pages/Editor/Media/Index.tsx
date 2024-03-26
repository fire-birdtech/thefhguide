import { type ReactElement, useState } from 'react'
import { type MediaFile, type PageProps } from '@/types'
import { Head } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import { Header3 } from '@/Components/Typography/Headers'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import Container from '@/Components/Container'
import MediaDetailsModal from '@/Components/Modals/MediaDetails'

export default function MediaIndex ({ auth, files }: PageProps<{ files: MediaFile[] }>): ReactElement {
  const [open, setOpen] = useState<boolean>(false)
  const [selectedFile, setSelectedFile] = useState<MediaFile | undefined>(undefined)

  const viewDetails = (file: MediaFile): void => {
    setSelectedFile(file)
    setOpen(true)
  }

  return (
    <>
      <Head title="Media"/>

      <Admin user={auth.user}>
        <Container>
          <div className="md:flex md:items-center md:justify-between">
            <div className="min-w-0 flex-1">
              <Header3>
                Media Library
              </Header3>
            </div>
            <div className="mt-4 flex md:ml-4 md:mt-0">
              <PrimaryButton href={route('editor.media.create')}>
                Add Media
              </PrimaryButton>
            </div>
          </div>

          <ul role="list" className="mt-4 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-5 xl:gap-x-8">
            {files.map((file: MediaFile) => (
              <li key={file.id} className="relative">
                <div className="group aspect-h-7 aspect-w-10 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                  <img src={file.url} alt="" className="pointer-events-none object-cover group-hover:opacity-75" />
                  <button type="button" onClick={() => { viewDetails(file) }} className="absolute inset-0 focus:outline-none">
                    <span className="sr-only">View details for {file.name}</span>
                  </button>
                </div>
                <p className="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{file.name}</p>
              </li>
            ))}
          </ul>
        </Container>

        <MediaDetailsModal file={selectedFile} open={open} setOpen={() => { setOpen(false) }}/>
      </Admin>
    </>
  )
}

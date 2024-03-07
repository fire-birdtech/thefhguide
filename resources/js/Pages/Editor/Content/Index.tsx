import { type ReactElement, useState } from 'react'
import { Head } from '@inertiajs/react'
import Admin from '@/Layouts/Admin'
import { Header3 } from '@/Components/Typography/Headers'
import ContentCard from '@/Components/Cards/Editor/ContentCard'
import Container from '@/Components/Container'
import { type Collection, type PageProps, type Project } from '@/types'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import AddCollectionModal from '@/Components/Modals/AddCollection'
import { CollectionType } from '@/enums'

type ContextIndexProps = {
  collections: Collection[]
  pageCollections: Collection[]
  projects: Project[]
} & PageProps

export default function ContentIndex ({ auth, collections, pageCollections, projects }: ContextIndexProps): ReactElement {
  const [confirmNewCollection, setConfirmNewCollection] = useState(false)
  const [newCollectionType, setNewCollectionType] = useState<CollectionType | null>(null)

  const addCollection = (type: CollectionType): void => {
    setNewCollectionType(type)
    setConfirmNewCollection(true)
  }

  return (
    <>
      <Head title="Site Content"/>

      <Admin user={auth.user}>
        <div>
          <div className="w-full py-8 px-4 sm:px-6 lg:px-8">
            <Header3>
              Project Collections
            </Header3>
            <div className="mt-4 grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7">
              {collections.map((collection) => (
                <ContentCard key={collection.id} content={collection} type="collection"/>
              ))}
              {projects.map((project) => (
                <ContentCard key={project.id} content={project} type="project"/>
              ))}
            </div>
          </div>

          <Container>
            <div className="md:flex md:items-center md:justify-between">
              <div className="min-w-0 flex-1">
                <Header3>
                  Pages
                </Header3>
              </div>
              <div className="mt-4 flex md:ml-4 md:mt-0">
                <PrimaryButton
                  onClick={() => {
                    addCollection(CollectionType.PAGE)
                  }}
                >
                  Add
                </PrimaryButton>
              </div>
            </div>
            <div className="mt-4 grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7">
              {pageCollections.length > 0 ? pageCollections.map((collection) => (
                <ContentCard key={collection.id} content={collection} type="collection"/>
              )) : null}
            </div>
          </Container>
        </div>

        <AddCollectionModal
          close={() => {
            setConfirmNewCollection(false)
          }}
          open={confirmNewCollection}
          type={newCollectionType}
        />
      </Admin>
    </>
  )
}

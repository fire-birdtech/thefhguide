import {type FormEventHandler, type ReactElement} from "react"
import {MediaFile, type Page, type PageProps} from "@/types"
import {Head, useForm} from "@inertiajs/react"
import Admin from "@/Layouts/Admin"
import Container from "@/Components/Container"
import {Header3} from "@/Components/Typography/Headers"
import InputLabel from "@/Components/Forms/InputLabel"
import TextInput from "@/Components/Forms/TextInput"
import InputError from "@/Components/Forms/InputError"
import SecondaryButton from "@/Components/Buttons/SecondaryButton"
import PrimaryButton from "@/Components/Buttons/PrimaryButton"
import {MediaFilesProvider} from "@/contexts/MediaFilesContext";
import {ContentSlug} from "@/enums";
import ContentSectionEdit from "@/Components/ContentSectionEdit";

export default function PagesEdit ({ auth, files, page }: PageProps<{ files: MediaFile[], page: Page }>): ReactElement {
  const {data, setData, errors, put} = useForm({
    name: page.name,
    details: page.content
  })

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    put(route('editor.pages.update', [page.slug]), {
      preserveScroll: true,
    })
  }

  const addContent = () => {
    let { details } = data
    details = [
      ...details,
      {}
    ]

    setData({
      ...data,
      details: [
        ...details
      ],
    })
  }

  const add = (value: string) => {
    let { details } = data

    if (value === ContentSlug.HERO_FULL_WIDTH) {
      details = [
        ...details,
        {
          type: value,
          image_url: '',
          title: '',
        }
      ]
    }
    if (value === ContentSlug.CONTENT_RIGHT_IMAGE) {
      details = [
        ...details,
        {
          type: value,
          image_url: '',
          image_width: '',
          title: '',
          body: '',
        }
      ]
    }
    if (value === ContentSlug.SIMPLE_CONTENT) {
      details = [
        ...details,
        {
          type: value,
          title: '',
          body: '',
        }
      ]
    }

    setData({
      ...data,
      details: [
        ...details
      ],
    })
  }

  const update = (value: any, index: number) => {
    let { details } = data
    details[index] = value

    setData({
      ...data,
      details: [
        ...details,
      ]
    })
  }

  return (
    <>
      <Head title="Edit Page"/>

      <Admin user={auth.user}>
        <Container>
          <Header3>
            Edit Page: {page.name}
          </Header3>
          <div className="mt-4 bg-white rounded-md shadow">
            <form onSubmit={submit} className="sm:divide-y sm:divide-gray-200">
              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Page name" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-4">
                  <TextInput
                    value={data.name}
                    className="block w-full"
                    isFocused={true}
                    onChange={(e) => {
                      setData('name', e.target.value)
                    }}
                  />
                  <InputError message={errors.name}/>
                </div>
              </div>

              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Content" className="sm:mt-px sm:pt-2"/>
                <MediaFilesProvider initialFiles={files}>
                  <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-4">
                    {data.details.map((item, index) => (
                      <ContentSectionEdit key={index} content={item} onChange={(value) => { update(value, index) }}/>
                    ))}
                    <SecondaryButton onClick={() => addContent()}>
                      Add section
                    </SecondaryButton>
                  </div>
                </MediaFilesProvider>
              </div>

              <div className="px-6 py-4">
                <div className="flex justify-end space-x-3">
                  <SecondaryButton href="#">
                    Cancel
                  </SecondaryButton>
                  <PrimaryButton type="submit">
                    Save
                  </PrimaryButton>
                </div>
              </div>
            </form>
          </div>
        </Container>
      </Admin>
    </>
  )
}

import {Head, useForm} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import {Hero, MediaFile, PageContentElement, PageProps} from "@/types";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";
import InputError from "@/Components/Forms/InputError";
import {MediaFilesProvider} from "@/contexts/MediaFilesContext";
import PageHero from "@/Components/Content/Forms/PageHero";
import ContentSectionEdit from "@/Components/ContentSectionEdit";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import {FormEventHandler} from "react";

export default function PagesCreate ({ auth, collectionId, files }: PageProps<{ collectionId: number, files: MediaFile[] }>) {
  const {data, setData, errors, post, processing} = useForm({
    name: '',
    hero: null,
    details: [],
    type: 'info',
    collectionId,
  })

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    post(route('editor.pages.store'))
  }

  const updateHero = (value: Hero) => {
    setData({
      ...data,
      hero: value,
    })
  }

  const addContent = () => {
    let details: PageContentElement[][] = [[]]

    setData({
      ...data,
      details: [
        ...details
      ],
    })
  }

  const updateContent = (value: any, index: number) => {
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
      <Head title="Create Page" />

      <Admin user={auth.user}>
        <Container>
          <div className="flex items-center justify-between">
            <Header3>
              Create Page
            </Header3>
            <div className="flex justify-end space-x-3">
              <SecondaryButton href="#">
                Cancel
              </SecondaryButton>
              <PrimaryButton onClick={submit}>
                Save
              </PrimaryButton>
            </div>
          </div>
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
                <InputLabel label="Hero" optional className="sm:mt-px sm:pt-2"/>
                <MediaFilesProvider initialFiles={files}>
                  <div className="mt-1 sm:mt-0 sm:col-span-4">
                    <PageHero hero={data.hero} onChange={(value) => { updateHero(value) }}/>
                  </div>
                </MediaFilesProvider>
              </div>

              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Content" className="sm:mt-px sm:pt-2"/>
                <MediaFilesProvider initialFiles={files}>
                  <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-4">
                    {data.details && data.details.map((item, index) => (
                      <ContentSectionEdit key={index} section={item} onChange={(value) => { updateContent(value, index) }}/>
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
                  <PrimaryButton type="submit" disabled={processing}>
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

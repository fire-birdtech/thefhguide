import {type FormEventHandler, type ReactElement, useState} from "react"
import {type Page, type PageProps} from "@/types"
import {Head, useForm} from "@inertiajs/react"
import Admin from "@/Layouts/Admin"
import Container from "@/Components/Container"
import {Header3} from "@/Components/Typography/Headers"
import InputLabel from "@/Components/Forms/InputLabel"
import TextInput from "@/Components/Forms/TextInput"
import InputError from "@/Components/Forms/InputError"
import SecondaryButton from "@/Components/Buttons/SecondaryButton"
import PrimaryButton from "@/Components/Buttons/PrimaryButton"
import AddContent from "@/Components/AddContent";

export default function PagesEdit ({ auth, page }: PageProps<{ page: Page }>): ReactElement {
  const [addContent, setAddContent] = useState<boolean>(true)

  const {data, setData, errors, put} = useForm({
    name: page.name,
  })

  const submit: FormEventHandler = (e) => {
    e.preventDefault()

    put(route('editor.pages.update', [page.slug]))
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
                <div className="mt-1 py-2 sm:mt-0 sm:col-span-4">
                  {addContent ? (
                    <AddContent/>
                  ) : (
                    <SecondaryButton>
                      Add content
                    </SecondaryButton>
                  )}
                </div>
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

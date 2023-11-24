import {type FormEventHandler, type ReactElement, useState} from "react"
import {type Page, type PageProps} from "@/types"
import {Head, useForm} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";
import InputError from "@/Components/Forms/InputError";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";

import HeroFullWidth from '../../../../../images/hero-full-width.png'
import HeroTwoColumn from '../../../../../images/hero-two-column.png'
import ImageLinkGrid from '../../../../../images/image-link-grid.png'

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
                    <div>
                      <ul className="col-span-3 grid grid-cols-1 gap-x-6 gap-y-6 sm:grid-cols-2 sm:gap-y-10 md:grid-cols-3 xl:grid-cols-4s xl:gap-x-8">
                        <li>
                          <div className="group relative before:absolute before:-inset-2.5 before:rounded-[20px] before:bg-gray-50 before:opacity-0 hover:before:opacity-100">
                            <div className="relative aspect-[2/1] overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-900/10">
                              <img src={HeroFullWidth} alt="" className="absolute inset-0 h-full w-full"/>
                            </div>
                            <h4 className="mt-2 text-sm font-medium text-gray-500 group-hover:text-blue-600">
                              <a href="#">
                                <span className="absolute -inset-2.5 z-10"/>
                                <span className="relative">
                                  Hero Full Width
                                </span>
                              </a>
                            </h4>
                          </div>
                        </li>

                        <li>
                          <div className="group relative before:absolute before:-inset-2.5 before:rounded-[20px] before:bg-gray-50 before:opacity-0 hover:before:opacity-100">
                            <div className="relative aspect-[2/1] overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-900/10">
                              <img src={HeroTwoColumn} alt="" className="absolute inset-0 h-full w-full"/>
                            </div>
                            <h4 className="mt-2 text-sm font-medium text-gray-500 group-hover:text-blue-600">
                              <a href="#">
                                <span className="absolute -inset-2.5 z-10"/>
                                <span className="relative">
                                  Hero Two Column
                                </span>
                              </a>
                            </h4>
                          </div>
                        </li>

                        <li>
                          <div className="group relative before:absolute before:-inset-2.5 before:rounded-[20px] before:bg-gray-50 before:opacity-0 hover:before:opacity-100">
                            <div className="relative aspect-[2/1] overflow-hidden rounded-lg bg-gray-100 ring-1 ring-gray-900/10">
                              <img src={ImageLinkGrid} alt="" className="absolute inset-0 h-full w-full"/>
                            </div>
                            <h4 className="mt-2 text-sm font-medium text-gray-500 group-hover:text-blue-600">
                              <a href="#">
                                <span className="absolute -inset-2.5 z-10"/>
                                <span className="relative">
                                  Image Link Grid
                                </span>
                              </a>
                            </h4>
                          </div>
                        </li>
                      </ul>
                    </div>
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

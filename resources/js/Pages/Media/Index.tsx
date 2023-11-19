import {type ReactElement} from "react"
import {type PageProps} from "@/types"
import {Head} from "@inertiajs/react"
import Admin from "@/Layouts/Admin"
import {Header3} from "@/Components/Typography/Headers"
import PrimaryButton from "@/Components/Buttons/PrimaryButton";

export default function MediaIndex ({ auth }: PageProps): ReactElement {
  return (
    <>
      <Head title="Media"/>

      <Admin user={auth.user}>
        <div className="w-full py-8 px-4 sm:px-6 lg:px-8">
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
        </div>
      </Admin>
    </>
  )
}

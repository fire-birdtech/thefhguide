import {type ReactElement} from "react"
import {type PageProps} from "@/types"
import {Head} from "@inertiajs/react"
import Admin from "@/Layouts/Admin"
import {Header3} from "@/Components/Typography/Headers"

export default function MediaIndex ({ auth }: PageProps): ReactElement {
  return (
    <>
      <Head title="Media"/>

      <Admin user={auth.user}>
        <div className="w-full py-8 px-4 sm:px-6 lg:px-8">
          <Header3>
            Media Library
          </Header3>
        </div>
      </Admin>
    </>
  )
}

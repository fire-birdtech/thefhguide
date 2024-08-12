import { type ReactElement } from 'react'
import Authenticated from '@/Layouts/Authenticated'
import { type PageProps } from '@/types'
import OnlineTrackerNavigation from '@/Components/Navigation/online-tracker'
import { Head } from '@inertiajs/react'
import {Heading} from "@/Components/Typography/Headers";
import TextInput from "@/Components/Forms/TextInput";
import InputLabel from "@/Components/Forms/InputLabel";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import TextArea from "@/Components/Forms/TextArea";

export default function Groups ({ auth }: PageProps): ReactElement {
  return (
    <Authenticated
      user={auth.user}
      header={<OnlineTrackerNavigation />}
    >
      <Head title="Tracker Reports Groups" />

      <div className="p-4 sm:px-6 lg:px-8">
        <div className="bg-white overflow-hidden shadow-md ring-1 ring-gray-300 sm:rounded-sm">
          <Heading className="p-4">
            Groups
          </Heading>
          <div className="border-t border-gray-300 p-4 space-y-4">
            <p>
              All reports are run with data from Group members. A Group contains a list of email addresses associated
              with accounts in The Family History Guide. When you run a Group report, it compiles the slider-bar
              responses from all non-private accounts contained in the group and then produces a report. Sharing your
              data in a Group does not grant access to view Notes fields; those are always private.
            </p>
            <div className="mt-4 grid grid-cols-12 gap-x-4">
              <div className="col-span-4">
                <form>
                  <fieldset className="border-2 border-neutral-100 p-4 m-2">
                    <legend className="text-xl">
                      Create New Group
                    </legend>
                    <InputLabel label="Name of Group" />
                    <TextInput className="mt-1 w-full" />
                    <PrimaryButton className="mt-3">
                      Create
                    </PrimaryButton>
                  </fieldset>
                </form>
              </div>
              <div className="col-span-8">
                <form>
                  <fieldset className="border-2 border-neutral-100 p-4 m-2">
                    <legend className="text-xl">
                      Request Access to Another User&apos;s Data
                    </legend>
                    <p>
                      Input the email address that the user has associated with his/her account. Users will be asked
                      whether to grant you access to their data. If they accept, you will be able to add them to Groups.
                    </p>
                    <div className="mt-3">
                      <InputLabel label="User's Email Address" />
                      <TextInput type="email" className="mt-1 w-96" />
                    </div>
                    <div className="mt-3">
                      <InputLabel label="Message (optional)" />
                      <TextArea className="mt-1 w-full"></TextArea>
                    </div>
                    <PrimaryButton className="mt-3">
                      Request
                    </PrimaryButton>
                  </fieldset>
                </form>
              </div>
            </div>

            <div className="mt-4 grid grid-cols-12 gap-x-4">
              <div className="col-span-4">
                <Heading level={2}>
                  Your Groups:
                </Heading>
                <p>
                  These are the groups you have access to see.
                </p>
              </div>

              <div className="col-span-4">
                <Heading level={2}>
                  Request to View Others&apos; Data:
                </Heading>
                <p>
                  These are users to whom you have sent data requests.
                </p>
              </div>

              <div className="col-span-4">
                <Heading level={2}>
                  Requests to View Your Data:
                </Heading>
                <p>
                  These are users with whom you have shared your Online Tracker data, or who are requesting access to
                  your data. When you approve a request, the requesting user can add your slider-bar data to their
                  Reports. Or, click No Thanks if you do not want to grant access to the requesting user. To remove
                  access to your account data by a user you previously approved, click Revoke.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  )
}

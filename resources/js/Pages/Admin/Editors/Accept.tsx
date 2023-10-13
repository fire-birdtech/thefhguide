import {FormEventHandler, type ReactElement} from "react";
import {Head, useForm} from "@inertiajs/react";
import Guest from "@/Layouts/Guest";
import PrimaryButtonFullWidth from "@/Components/Buttons/PrimaryButtonFullWidth";
import TextInputCombined from "@/Components/Forms/TextInputCombined";
import {type Invitation} from "@/types";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";
import InputError from "@/Components/Forms/InputError";

interface EditorAcceptProps {
  invitation: Invitation
  hasAccount: boolean
}

export default function EditorAccept({ invitation, hasAccount }: EditorAcceptProps): ReactElement {
  const {
    post: postAccept,
    processing: processingAccept,
  } = useForm({
    email: invitation.email,
    role: invitation.role,
    admin_id: invitation.admin_id,
    id: invitation.id,
  });

  const submitAccept: FormEventHandler = (e) => {
    e.preventDefault();

    postAccept(route('invitations.accept'));
  }

  const {
    data,
    setData,
    reset,
    errors,
    post: postRegister,
    processing: processingRegister,
  } = useForm({
    name: invitation.name,
    email: invitation.email,
    id: invitation.id,
    role: invitation.role,
    admin_id: invitation.admin_id,
    password: '',
    password_confirmation: '',
  });

  const submitRegister: FormEventHandler = (e) => {
    e.preventDefault();

    postRegister(route('invitations.register'), {
      onFinish: () => reset('password', 'password_confirmation'),
    });
  }

  return (
    <>
      <Head title="Accept Invitation"/>

      <Guest>
        <div className="text-center sm:pt-1 sm:text-left">
          <p className="text-sm font-medium text-gray-500">
            Welcome,
          </p>
          <p className="text-xl font-bold text-gray-900 sm:text-2xl">
            {invitation.name}
          </p>
        </div>
        <div className="mt-4">
          {hasAccount ? (
            <>
              <p className="mt-1 text-sm text-gray-500">
                It looks like you already have an account for {invitation.email}.
              </p>
              <div className="mt-8">
                <PrimaryButtonFullWidth onClick={submitAccept} disabled={processingAccept}>
                  Accept Invitation
                </PrimaryButtonFullWidth>
              </div>
            </>
          ) : (
            <>
              <p className="mt-1 text-sm text-gray-500">
                Please complete your account by adding a password.
              </p>
              <form onSubmit={submitRegister} className="mt-3 mb-1 space-y-3">
                <div>
                  <InputLabel label="Name"/>
                  <div>
                    <TextInput
                      value={data.name}
                      className="mt-1 block w-full"
                      onChange={(e) => {
                        setData('name', e.target.value)
                      }}
                      required
                    />
                    <InputError message={errors.name}/>
                  </div>
                </div>

                <div>
                  <InputLabel label="Email"/>
                  <div>
                    <TextInput
                      type="email"
                      value={data.email}
                      className="mt-1 block w-full"
                      onChange={(e) => {
                        setData('email', e.target.value)
                      }}
                      required
                    />
                    <InputError message={errors.email}/>
                  </div>
                </div>

                <div>
                  <InputLabel label="Password"/>
                  <div>
                    <TextInput
                      type="password"
                      value={data.password}
                      className="mt-1 block w-full"
                      onChange={(e) => {
                        setData('password', e.target.value)
                      }}
                      required
                    />
                    <InputError message={errors.password}/>
                  </div>
                </div>

                <div>
                  <InputLabel label="Confirm Password"/>
                  <div>
                    <TextInput
                      type="password"
                      value={data.password_confirmation}
                      className="mt-1 block w-full"
                      onChange={(e) => {
                        setData('password_confirmation', e.target.value)
                      }}
                      required
                    />
                    <InputError message={errors.password_confirmation}/>
                  </div>
                </div>

                <div className="mt-8">
                  <PrimaryButtonFullWidth>
                    Register &amp; Accept Invitation
                  </PrimaryButtonFullWidth>
                </div>
              </form>
            </>
          )}
        </div>
      </Guest>
    </>
  );
}

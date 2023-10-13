import {FormEventHandler, useRef} from "react";
import {useForm} from "@inertiajs/react";
import {User} from "@/types";
import {Header3} from "@/Components/Typography/Headers";
import {Paragraph} from "@/Components/Typography/Paragraphs";
import TextInput from "@/Components/Forms/TextInput";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import InputLabel from "@/Components/Forms/InputLabel";
import InputError from "@/Components/Forms/InputError";

export default function UpdatePassword({user}: { user: User }) {
  const passwordInput = useRef<HTMLInputElement>();
  const currentPasswordInput = useRef<HTMLInputElement>();

  const {data, setData, errors, put, reset, processing, recentlySuccessful} = useForm({
    current_password: '',
    password: '',
    password_confirmation: ''
  });

  const updatePassword: FormEventHandler = (e) => {
    e.preventDefault();

    put(route('settings.update-password'), {
      preserveScroll: true,
      onSuccess: () => {
        reset()
      },
      onError: (errors) => {
        if (errors.password !== null) {
          reset('password', 'password_confirmation')
          passwordInput.current?.focus()
        }

        if (errors.current_password !== null) {
          reset('current_password')
          currentPasswordInput.current?.focus()
        }
      }
    });
  }

  return (
    <div className="space-y-6 sm:space-y-5">
      <div>
        <Header3>
          Change Password
        </Header3>
        <Paragraph className="mt-1 max-w-2xl">
          Ensure your account is using a long, random password to stay secure.
        </Paragraph>
      </div>

      <form onSubmit={updatePassword} className="pt-4 border-t border-gray-200">
        <div className="max-w-md space-y-6 sm:space-y-5">
          <div>
            <InputLabel label="Current Password"/>
            <TextInput
              type="password"
              value={data.current_password}
              className="mt-1 block w-full"
              isFocused
              onChange={(e) => {
                setData('current_password', e.target.value)
              }}
            />
            <InputError message={errors.current_password} className="mt-1"/>
          </div>

          <div>
            <InputLabel label="New Password"/>
            <TextInput
              type="password"
              value={data.password}
              className="mt-1 block w-full"
              onChange={(e) => {
                setData('password', e.target.value)
              }}
            />
            <InputError message={errors.current_password} className="mt-1"/>
          </div>

          <div>
            <InputLabel label="Confirm New Password"/>
            <TextInput
              type="password"
              value={data.password_confirmation}
              className="mt-1 block w-full"
              onChange={(e) => {
                setData('password_confirmation', e.target.value)
              }}
            />
            <InputError message={errors.current_password} className="mt-1"/>
          </div>

          <PrimaryButton>
            Update Password
          </PrimaryButton>
        </div>
      </form>
    </div>
  )
}

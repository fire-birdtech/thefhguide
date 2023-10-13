import {User} from "@/types";
import {Header3} from "@/Components/Typography/Headers";
import {Paragraph} from "@/Components/Typography/Paragraphs";
import TextInput from "@/Components/Forms/TextInput";
import {useForm} from "@inertiajs/react";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import InputLabel from "@/Components/Forms/InputLabel";
import InputError from "@/Components/Forms/InputError";

export default function UpdateProfile({user}: { user: User }) {
  const {data, setData, post, processing, errors, reset} = useForm({
    name: user.name,
    email: user.email,
  });

  return (
    <div className="space-y-6 sm:space-y-5">
      <div>
        <Header3>
          Public Profile
        </Header3>
        <Paragraph className="mt-1 max-w-2xl">
          This information will be displayed publicly so be careful what you share.
        </Paragraph>
      </div>
      <form className="pt-4 border-t border-gray-200">
        <div className="max-w-md space-y-6 sm:space-y-5">
          <div>
            <InputLabel label="Name"/>
            <TextInput
              value={data.name}
              className="mt-1 block w-full"
              isFocused={true}
              onChange={(e) => {
                setData('name', e.target.value)
              }}
              required
            />
            <InputError message={errors.name} className="mt-1"/>
          </div>

          <div>
            <InputLabel label="Email"/>
            <TextInput
              type="email"
              value={data.email}
              className="mt-1 block w-full"
              onChange={(e) => {
                setData('email', e.target.value)
              }}
              required
            />
            <InputError message={errors.email} className="mt-1"/>
          </div>

          <PrimaryButton disabled={processing}>
            Update profile
          </PrimaryButton>
        </div>
      </form>
    </div>
  );
}

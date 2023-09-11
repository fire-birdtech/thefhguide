import {type FormEventHandler, type ReactElement} from "react";
import {useForm} from "@inertiajs/react";
import TextInput from "@/Components/Forms/TextInput";
import InputLabel from "@/Components/Forms/InputLabel";
import {type Choice} from "@/types";
import InputError from "@/Components/Forms/InputError";
import Summary from "@/Components/Forms/Choices/Summary";

export default function ChoiceEdit({choice}: {
  choice: Choice;
}): ReactElement {
  const {data, setData, errors} = useForm({
    ...choice,
  });

  const submit = (e): FormEventHandler => {
    e.preventDefault();
  }

  return (
    <div className="border-t border-gray-200">
      <form onSubmit={submit} className="sm:divide-y sm:divide-gray-200">
        <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
          <InputLabel label="Name" className="sm:mt-px sm:pt-2"/>
          <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
            <TextInput
              value={data.name}
              className="block w-full"
              isFocused
              onChange={(e) => setData('name', e.target.value)}
            />
            <InputError message={errors.name} className="mt-1"/>
          </div>
        </div>
        <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
          <InputLabel label="Content" className="sm:mt-px sm:pt-2"/>
          <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
            {choice.content.map((item, idx) =>
              {item.type === 'summary' && <Summary key={idx} value={item}/>}
            )}
          </div>
        </div>
      </form>
    </div>
  );
}

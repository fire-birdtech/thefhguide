import {type FormEventHandler, type ReactElement} from "react";
import {useForm} from "@inertiajs/react";
import TextInput from "@/Components/Forms/TextInput";
import InputLabel from "@/Components/Forms/InputLabel";
import InputError from "@/Components/Forms/InputError";
import Summary from "@/Components/Forms/Choices/Summary";
import {type Choice} from "@/types";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import TextBlock from "@/Components/Forms/Choices/TextBlock";
import Header from "@/Components/Forms/Choices/Header";

export default function ChoiceEdit({choice, close}: {
  choice: Choice;
  close: () => {};
}): ReactElement {
  const {data, setData, errors} = useForm({
    ...choice,
  });

  const updateProperty = (index: number, value: string) => {
    data.content[index].data = value;
  }

  const submit = (e): FormEventHandler => {
    e.preventDefault();
    console.log(data);
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
            {choice.content.map((item, idx): void => {
              if (item.type === 'summary') return <Summary key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)}/>
              if (item.type === 'text') return <TextBlock key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)}/>
              if (item.type === 'header') return <Header key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)}/>
            })}
          </div>
        </div>

        <div className="px-6 py-4">
          <div className="flex justify-end space-x-3">
            <SecondaryButton onClick={close}>
              Cancel
            </SecondaryButton>
            <PrimaryButton type="submit">
              Save
            </PrimaryButton>
          </div>
        </div>
      </form>
    </div>
  );
}

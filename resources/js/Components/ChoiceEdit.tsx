import {type FormEventHandler, type ReactElement, useState} from "react";
import {router} from "@inertiajs/react";
import TextInput from "@/Components/Forms/TextInput";
import InputLabel from "@/Components/Forms/InputLabel";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import ChoiceContentForm from "@/Components/Forms/Choices/ChoiceContentForm";
import {type Choice, type ChoiceContent, type Resource} from "@/types";

export default function ChoiceEdit({choice, close}: {
  choice: Choice;
  close: () => void;
}): ReactElement {
  const [choiceData, setChoiceData] = useState<Choice>({
    ...choice,
  });
  const [confirmDeleteProperty, setConfirmDeleteProperty] = useState<boolean>(false);
  const [selectedPropertyIndexForDeletion, setSelectedPropertyIndexForDeletion] = useState<number|undefined>(undefined);

  const updateContent = (value: ChoiceContent[]): void => {
    let { content } = choiceData;
    content = value;

    setChoiceData({
      ...choiceData,
      content: [
        ...content,
      ],
    });
  }

  const submit = (e): void => {
    e.preventDefault();

    router.put(route('editor.choices.update', [choice]), choiceData, {
      preserveScroll: true,
      onSuccess: () => close(),
    });
  }

  return (
    <div className="border-t border-gray-200">
      <form onSubmit={submit} className="sm:divide-y sm:divide-gray-200">
        <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
          <InputLabel label="Name" className="sm:mt-px sm:pt-2"/>
          <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
            <TextInput
              value={choiceData.name}
              className="block w-full"
              isFocused
              onChange={(e) => setChoiceData({
                ...choiceData,
                name: e.target.value,
              })}
            />
          </div>
        </div>
      </form>

      <ChoiceContentForm content={choiceData.content} update={(value: ChoiceContent[]) => updateContent(value)}/>

      <div className="px-6 py-4">
        <div className="flex justify-end space-x-3">
          <SecondaryButton onClick={close}>
            Cancel
          </SecondaryButton>
          <PrimaryButton onClick={submit}>
            Save
          </PrimaryButton>
        </div>
      </div>
    </div>
  );
}

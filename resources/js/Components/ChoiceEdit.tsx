import {type FormEventHandler, type ReactElement, useState} from "react";
import {Dialog} from "@headlessui/react";
import {router} from "@inertiajs/react";
import TextInput from "@/Components/Forms/TextInput";
import InputLabel from "@/Components/Forms/InputLabel";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import ChoiceContentForm from "@/Components/Forms/Choices/ChoiceContentForm";
import DangerModal from "@/Components/Modals/Danger";
import {type Choice, type Resource} from "@/types";

export default function ChoiceEdit({choice, close}: {
  choice: Choice;
  close: () => {};
}): ReactElement {
  const [choiceData, setChoiceData] = useState<Choice>({
    ...choice,
  });
  const [confirmDeleteProperty, setConfirmDeleteProperty] = useState<boolean>(false);
  const [selectedPropertyIndexForDeletion, setSelectedPropertyIndexForDeletion] = useState<number|undefined>(undefined);

  const updateProperty = (index: number, value: string|Resource[]): void => {
    let { content } = choiceData;
    content[index].data = value;

    setChoiceData({
      ...choiceData,
      content,
    });
  }

  const addProperty = (type: string): void => {
    type === 'resources'
      ? setChoiceData({
          ...choiceData,
          content: [
            ...choiceData.content,
            {'type': type, 'data': []}
          ]
        })
      : setChoiceData({
          ...choiceData,
          content: [
            ...choiceData.content,
            { 'type': type, 'data': "" }
          ]
        });
  }

  const handleDelete = (index: number): void => {
    setSelectedPropertyIndexForDeletion(index);
    setConfirmDeleteProperty(true);
  }

  const deleteProperty = (): void => {
    if (selectedPropertyIndexForDeletion !== undefined) {
      let selectedChoice = choiceData;
      selectedChoice.content.splice(selectedPropertyIndexForDeletion, 1);
      setChoiceData({
        ...selectedChoice,
      });
    }
    setConfirmDeleteProperty(false);
  }

  const submit = (e): FormEventHandler => {
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

      <ChoiceContentForm content={choiceData.content}/>

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

import {type FormEventHandler, type ReactElement, useState} from "react";
import {Dialog} from "@headlessui/react";
import {router, useForm} from "@inertiajs/react";
import TextInput from "@/Components/Forms/TextInput";
import InputLabel from "@/Components/Forms/InputLabel";
import InputError from "@/Components/Forms/InputError";
import Summary from "@/Components/Forms/Choices/Summary";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import TextBlock from "@/Components/Forms/Choices/TextBlock";
import Header from "@/Components/Forms/Choices/Header";
import Exercises from "@/Components/Forms/Choices/Exercises";
import QUIKLinks from "@/Components/Forms/Choices/QUIKLinks";
import ResourceList from "@/Components/Forms/Choices/ResourceList";
import DangerModal from "@/Components/Modals/Danger";
import AddContentButton from "@/Components/Buttons/Choices/AddContentButton";
import {type Choice, type ChoiceContent, type Resource} from "@/types";

export default function ChoiceEdit({choice, close}: {
  choice: Choice;
  close: () => {};
}): ReactElement {
  const [choiceData, setChoiceData] = useState<Choice>({
    ...choice,
  });
  const [confirmDeleteProperty, setConfirmDeleteProperty] = useState<boolean>(false);
  const [selectedPropertyIndexForDeletion, setSelectedPropertyIndexForDeletion] = useState<number|undefined>(undefined);
  const [hasSummary, setHasSummary] = useState<boolean>(!!choiceData.content.find((item: ChoiceContent): boolean => item.type === 'summary'));
  const [hasExercises, setHasExercises] = useState<boolean>(!!choiceData.content.find((item: ChoiceContent): boolean => item.type === 'exercises'));

  const updateProperty = (index: number, value: string|Resource[]): void => {
    let { content } = choiceData;
    content[index].data = value;

    setChoiceData({
      ...choiceData,
      content,
    });
  }

  const handleDelete = (index: number): void => {
    setSelectedPropertyIndexForDeletion(index);
    setConfirmDeleteProperty(true);
  }

  const deleteProperty = (): void => {
    if (selectedPropertyIndexForDeletion !== undefined) {
      choiceData.content.splice(selectedPropertyIndexForDeletion, 1);
    }
  }

  const submit = (e): FormEventHandler => {
    e.preventDefault();

    router.put(route('editor.choices.update', [choice]), choiceData, {
      preserveScroll: true,
      onSuccess: () => close(),
    });
  }

  return <>
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

      <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
        <InputLabel label="Content" className="sm:mt-px sm:pt-2"/>
        <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
          {choiceData.content.map((item, idx): void => {
            if (item.type === 'summary') return <Summary key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
            if (item.type === 'text') return <TextBlock key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
            if (item.type === 'resources') return <ResourceList key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
            if (item.type === 'header') return <Header key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
            if (item.type === 'exercises') return <Exercises key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
            if (item.type === 'quiklinks') return <QUIKLinks key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
          })}
          <div className="space-x-2">
            {!hasSummary && (
              <AddContentButton value="Add Summary" color="sky"/>
            )}
            <AddContentButton value="Add Text Block" color="red"/>
            <AddContentButton value="Add Resource List" color="purple"/>
            <AddContentButton value="Add Header" color="orange"/>
            {!hasExercises && (
              <AddContentButton value="Add Exercises" color="emerald"/>
            )}
            <AddContentButton value="Add QUIKLinks" color="yellow"/>
          </div>
        </div>
      </div>

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

    <DangerModal
      destroy={deleteProperty}
      open={confirmDeleteProperty}
      setOpen={setConfirmDeleteProperty}
    >
      <Dialog.Title as="h3" className="text-lg font-medium leading-6 text-gray-900">
        Delete Choice Content Item
      </Dialog.Title>
      <div className="mt-2">
        <p className="text-sm text-gray-500">
          Are you sure you want to delete this data item? All data will be permanently
          removed forever. This action cannot be undone.
        </p>
      </div>
    </DangerModal>
  </>;
}

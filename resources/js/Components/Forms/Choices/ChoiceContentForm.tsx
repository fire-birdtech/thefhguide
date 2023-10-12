import {type ReactElement, useState} from "react";
import {Dialog} from "@headlessui/react";
import {useForm} from "@inertiajs/react";
import InputLabel from "@/Components/Forms/InputLabel";
import Summary from "@/Components/Forms/Choices/Summary";
import TextBlock from "@/Components/Forms/Choices/TextBlock";
import ResourceList from "@/Components/Forms/Choices/ResourceList";
import Header from "@/Components/Forms/Choices/Header";
import Exercises from "@/Components/Forms/Choices/Exercises";
import QUIKLinks from "@/Components/Forms/Choices/QUIKLinks";
import AddContentButton from "@/Components/Buttons/Choices/AddContentButton";
import DangerModal from "@/Components/Modals/Danger";
import {type ChoiceContent, type Resource} from "@/types";

interface ChoiceContentFormProps {
  content: ChoiceContent[]
  update?: (value: ChoiceContent[]) => {}
}

export default function ChoiceContentForm({ content, update }: ChoiceContentFormProps): ReactElement {
  const [confirmDeleteProperty, setConfirmDeleteProperty] = useState<boolean>(false);
  const [selectedPropertyIndexForDeletion, setSelectedPropertyIndexForDeletion] = useState<number|undefined>(undefined);
  const [hasSummary, setHasSummary] = useState<boolean>(!!content.find((item: ChoiceContent): boolean => item.type === 'summary'));
  const [hasExercises, setHasExercises] = useState<boolean>(!!content.find((item: ChoiceContent): boolean => item.type === 'exercises'));

  const {data, setData} = useForm<ChoiceContent[]>([
    ...content,
  ]);

  const addProperty = (type: string): void => {
    type === 'resources'
      ? setData([
          ...data,
          {'type': type, 'data': []}
        ])
      : setData([
        ...data,
        {'type': type, 'data': ""}
      ]);

    update(data);
  }

  const updateProperty = (index: number, value: string|Resource[]): void => {
    let content = data;
    content[index].data = value;

    setData([
      ...content
    ]);

    update(data);
  }

  const handleDelete = (index: number): void => {
    setSelectedPropertyIndexForDeletion(index);
    setConfirmDeleteProperty(true);
  }

  const deleteProperty = (): void => {
    if (selectedPropertyIndexForDeletion !== undefined) {
      let content = data;
      data.splice(selectedPropertyIndexForDeletion, 1);
      setData([
        ...content,
      ]);
    }

    update(data);
    setConfirmDeleteProperty(false);
  }

  return <>
    <div className="px-6 py-4 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:pt-4">
      <InputLabel label="Content" className="sm:mt-px sm:pt-1"/>
      <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
        {data.map((item, idx): void => {
          if (item.type === 'summary') return <Summary key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
          if (item.type === 'text') return <TextBlock key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
          if (item.type === 'resources') return <ResourceList key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
          if (item.type === 'header') return <Header key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
          if (item.type === 'exercises') return <Exercises key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
          if (item.type === 'quiklinks') return <QUIKLinks key={idx} index={idx} value={item.data} update={(index, value) => updateProperty(index, value)} remove={(index) => handleDelete(index)}/>
        })}
        <div className="space-x-2">
          {!hasSummary && (
            <AddContentButton
              value="Add Summary"
              color="sky"
              onClick={() => {
                addProperty('summary')
              }}
            />
          )}
          <AddContentButton
            value="Add Text Block"
            color="red"
            onClick={() => {
              addProperty('text')
            }}
          />
          <AddContentButton
            value="Add Resource List"
            color="purple"
            onClick={() => {
              addProperty('resources')
            }}
          />
          <AddContentButton
            value="Add Header"
            color="orange"
            onClick={() => {
              addProperty('header')
            }}
          />
          {!hasExercises && (
            <AddContentButton
              value="Add Exercises"
              color="emerald"
              onClick={() => {
                addProperty('exercises')
              }}
            />
          )}
          <AddContentButton
            value="Add QUIKLinks"
            color="yellow"
            onClick={() => {
              addProperty('quiklinks')
            }}
          />
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

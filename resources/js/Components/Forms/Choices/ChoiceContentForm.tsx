import {type ReactElement, useState} from "react";
import InputLabel from "@/Components/Forms/InputLabel";
import Summary from "@/Components/Forms/Choices/Summary";
import TextBlock from "@/Components/Forms/Choices/TextBlock";
import ResourceList from "@/Components/Forms/Choices/ResourceList";
import Header from "@/Components/Forms/Choices/Header";
import Exercises from "@/Components/Forms/Choices/Exercises";
import QUIKLinks from "@/Components/Forms/Choices/QUIKLinks";
import AddContentButton from "@/Components/Buttons/Choices/AddContentButton";
import {ChoiceContent} from "@/types";

interface ChoiceContentFormProps {
  add: (type: string) => {}
  content: ChoiceContent[]
  remove: (index: number) => {}
  update: (index: number, value: string) => {}
}

export default function ChoiceContentForm({ add, content, remove, update }: ChoiceContentFormProps): ReactElement {
  const [hasSummary, setHasSummary] = useState<boolean>(!!content.find((item: ChoiceContent): boolean => item.type === 'summary'));
  const [hasExercises, setHasExercises] = useState<boolean>(!!content.find((item: ChoiceContent): boolean => item.type === 'exercises'));

  return (
    <div className="px-6 py-4 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:pt-4">
      <InputLabel label="Content" className="sm:mt-px sm:pt-1"/>
      <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
        {content.map((item, idx): void => {
          if (item.type === 'summary') return <Summary key={idx} index={idx} value={item.data} update={(index, value) => update(index, value)} remove={(index) => remove(index)}/>
          if (item.type === 'text') return <TextBlock key={idx} index={idx} value={item.data} update={(index, value) => update(index, value)} remove={(index) => remove(index)}/>
          if (item.type === 'resources') return <ResourceList key={idx} index={idx} value={item.data} update={(index, value) => update(index, value)} remove={(index) => remove(index)}/>
          if (item.type === 'header') return <Header key={idx} index={idx} value={item.data} update={(index, value) => update(index, value)} remove={(index) => remove(index)}/>
          if (item.type === 'exercises') return <Exercises key={idx} index={idx} value={item.data} update={(index, value) => update(index, value)} remove={(index) => remove(index)}/>
          if (item.type === 'quiklinks') return <QUIKLinks key={idx} index={idx} value={item.data} update={(index, value) => update(index, value)} remove={(index) => remove(index)}/>
        })}
        <div className="space-x-2">
          {!hasSummary && (
            <AddContentButton
              value="Add Summary"
              color="sky"
              onClick={() => {
                add('summary')
              }}
            />
          )}
          <AddContentButton
            value="Add Text Block"
            color="red"
            onClick={() => {
              add('text')
            }}
          />
          <AddContentButton
            value="Add Resource List"
            color="purple"
            onClick={() => {
              add('resources')
            }}
          />
          <AddContentButton
            value="Add Header"
            color="orange"
            onClick={() => {
              add('header')
            }}
          />
          {!hasExercises && (
            <AddContentButton
              value="Add Exercises"
              color="emerald"
              onClick={() => {
                add('exercises')
              }}
            />
          )}
          <AddContentButton
            value="Add QUIKLinks"
            color="yellow"
            onClick={() => {
              add('quiklinks')
            }}
          />
        </div>
      </div>
    </div>
  );
}

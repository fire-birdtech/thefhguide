import {type ReactElement} from "react";
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import TextEditor from "@/Components/Forms/TextEditor";

export default function Exercises({value, remove, index, update}: {
  value: string,
  index: number,
  update: (index: number, value: string) => {},
  remove?: (index: number) => {}
}): ReactElement {
  const updateExercises = (value: string) => {
    update(index, value)
  }

  return (
    <div className="flex flex-col">
      <ContentBlockHeader color="emerald" remove={() => remove(index)}>
        Exercises
      </ContentBlockHeader>
      <div className="w-full border-2 border-emerald-200 rounded-b-md rounded-tr-md">
        <TextEditor value={value} update={updateExercises}/>
      </div>
    </div>
  );
}

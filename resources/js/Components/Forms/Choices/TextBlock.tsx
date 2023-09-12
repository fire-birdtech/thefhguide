import {type ReactElement} from "react";
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import TextEditor from "@/Components/Forms/TextEditor";

export default function TextBlock({value, remove, index, update}: {
  value: string,
  index: number,
  update: (index: number, value: string) => {},
  remove?: () => {}
}): ReactElement {
  const updateTextBlock = (value: string) => {
    update(index, value);
  }

  return (
    <div className="flex flex-col">
      <ContentBlockHeader color="red" remove={remove}>
        Text Block
      </ContentBlockHeader>
      <div className="w-full border-2 border-red-200 rounded-b rounded-tr">
        <TextEditor value={value} update={updateTextBlock}/>
      </div>
    </div>
  )
}

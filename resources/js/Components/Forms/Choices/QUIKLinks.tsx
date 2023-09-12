import {type ReactElement} from "react";
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import TextEditor from "@/Components/Forms/TextEditor";

export default function QUIKLinks({value, remove, index, update}: {
  value: string,
  index: number,
  update: (index: number, value: string) => {},
  remove?: () => {}
}): ReactElement {
  const updateQuiklinks = (value: string): void => {
    update(index, value)
  }

  return (
    <div className="flex flex-col">
      <ContentBlockHeader color="yellow" remove={remove}>
        QUIKLinks
      </ContentBlockHeader>
      <div className="w-full border-2 border-yellow-200 rounded-b rounded-tr">
        <TextEditor value={value} update={updateQuiklinks}/>
      </div>
    </div>
  );
}

import {type ReactElement} from "react";
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";
import TextEditor from "@/Components/Forms/TextEditor";

export default function Summary({value, remove}): ReactElement {
  return (
    <div className="flex flex-col">
      <ContentBlockHeader color="sky" remove={remove}>
        Summary
      </ContentBlockHeader>
      <div className="w-full border-2 border-sky-200 rounded-b rounded-tr">
        <TextEditor />
      </div>
    </div>
  );
}

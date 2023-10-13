import {type ReactElement} from "react";
import {Header3} from "@/Components/Typography/Headers";
import EditorCard from "@/Components/Cards/Admin/Dashboard/EditorCard";
import {type Editor} from "@/types";

export default function ({editors}: {
  editors: Editor[];
}): ReactElement {
  <>
    <Header3>
      My Editors
    </Header3>
    <div className="mt-4 grid grid-cols-1 gap-6 sm:grid-cols-2 2xl:grid-cols-3">
      {editors.map((editor) => (
        <EditorCard key={editor.id} editor={editor}/>
      ))}
    </div>
  </>
}

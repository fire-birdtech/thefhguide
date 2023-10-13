import {type ReactElement} from "react";
import DraftItem from "@/Components/Drafts/DraftItem";
import {Header3} from "@/Components/Typography/Headers";
import {type Draft} from "@/types";

export default function DraftList({drafts}: {
  drafts: Draft[];
}): ReactElement {
  return (
    <div className="mt-6">
      <Header3>
        My Drafts
      </Header3>
      <div className="mt-4">
        <ul role="list" className="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 2xl:grid-cols-4">
          {drafts.map((draft) => <DraftItem key={draft.id} draft={draft}/>)}
        </ul>
      </div>
    </div>
  );
}

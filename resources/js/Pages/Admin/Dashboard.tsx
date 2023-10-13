import {type ReactElement} from "react";
import {Head} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import DraftList from "@/Components/Drafts/DraftList";
import EditorList from "@/Components/EditorList";
import {type Draft, type Editor, type PageProps} from "@/types";

export default function AdminDashboard({auth, drafts, editors}: PageProps<{
  drafts: Draft[];
  editors: Editor[];
}>): ReactElement {
  return (
    <>
      <Head title="Admin Dashboard"/>

      <Admin user={auth.user}>
        <div className="w-full py-8 px-4 sm:px-6 lg:px-8">
          {editors.length > 0 ? <EditorList editors={editors}/> : null}
          {drafts.length > 0 ? <DraftList drafts={drafts}/> : null}
        </div>
      </Admin>
    </>
  );
}

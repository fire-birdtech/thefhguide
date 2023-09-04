import {Head} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import DraftList from "@/Components/Drafts/DraftList";
import EditorList from "@/Components/EditorList";

export default function AdminDashboard({ auth, drafts, editors }) {
    return (
        <>
            <Head title="Admin Dashboard"/>

            <Admin user={auth.user}>
                <div className="w-full py-8 px-4 sm:px-6 lg:px-8">
                    {editors.length ? <EditorList editors={editors}/> : null}
                    {drafts.length ? <DraftList drafts={drafts}/> : null}
                </div>
            </Admin>
        </>
    );
}

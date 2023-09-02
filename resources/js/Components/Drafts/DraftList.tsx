import DraftItem from "@/Components/Drafts/DraftItem";

export default function DraftList({ drafts }) {
    return (
        <ul role="list" className="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 2xl:grid-cols-4">
            {drafts.map((draft) => <DraftItem key={draft.id} draft={draft}/>)}
        </ul>
    );
}

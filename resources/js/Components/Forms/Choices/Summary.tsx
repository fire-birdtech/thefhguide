import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";

export default function Summary({ value, remove }) {
    return (
        <div className="flex flex-col">
            <ContentBlockHeader color="sky" remove={remove}>
                Summary
            </ContentBlockHeader>
            <div className="w-full border-2 border-sky-200 rounded-b rounded-tr"></div>
        </div>
    );
}

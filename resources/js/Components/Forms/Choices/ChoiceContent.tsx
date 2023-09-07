import InputLabel from "@/Components/Forms/InputLabel";

interface Resource {
  type: string;
  links: string[];

}

interface Content {
  type: string;
  data: string;
}

export default function ChoiceContent({ content, update }) {
  return (
    <div className="px-6 py-4 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:pt-4">
      <InputLabel label="Content" className="sm:mt-px sm:pt-1"/>
      <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7"></div>
    </div>
  );
}

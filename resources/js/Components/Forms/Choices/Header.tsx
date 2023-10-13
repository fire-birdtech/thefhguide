import {ReactElement} from "react";
import ContentBlockHeader from "@/Components/Forms/Choices/ContentBlockHeader";

export default function Header({value, remove, index, update}: {
  value: string,
  index: number,
  update: (index: number, value: string) => {},
  remove?: (index: number) => {}
}): ReactElement {
  const updateHeader = (value: string): void => {
    update(index, value)
  }

  return (
    <div className="flex flex-col">
      <ContentBlockHeader color="orange" remove={() => remove!(index)}>
        Header
      </ContentBlockHeader>
      <div className="w-full p-4 border-2 border-orange-200 rounded-b rounded-tr">
        <input type="text" value={value} onChange={(e) => updateHeader(e.target.value)} className="w-full rounded text-sm border border-orange-200 focus:border-orange-700 focus:ring-0" placeholder="Header text"/>
      </div>
    </div>
  );
}

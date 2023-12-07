import {type ReactElement} from "react";
import {type PageContentElement} from "@/types";
import {ContentElementType} from "@/enums";
import SectionTitle from "@/Components/Content/SectionTitle";

export default function ContentSectionShow ({ section }: { section: PageContentElement[] }): ReactElement {
  return (
    <div className="py-8">
      {section.map((element: PageContentElement, index: number) => {
        if (element.type === ContentElementType.TITLE) return <SectionTitle key={index} title={element.data}/>
      })}
    </div>
  )
}

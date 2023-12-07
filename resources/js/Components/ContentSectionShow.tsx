import {type ReactElement} from "react";
import {type PageContentElement} from "@/types";
import {ContentElementType} from "@/enums";
import SectionTitle from "@/Components/Content/SectionTitle";
import RightAlignedImage from "@/Components/Content/RightAlignedImage";

export default function ContentSectionShow ({ section }: { section: PageContentElement[] }): ReactElement {
  return (
    <div className="py-8">
      {section.map((element: PageContentElement, index: number) => {
        if (element.type === ContentElementType.TITLE) return <SectionTitle key={index} title={element.data}/>
        if (element.type === ContentElementType.RIGHT_ALIGNED_IMAGE) return <RightAlignedImage key={index} image={element.data}/>
      })}
    </div>
  )
}

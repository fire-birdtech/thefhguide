import {type ReactElement} from "react";
import {type ContentImage} from "@/types";

export default function LeftAlignedImage ({ image }: { image: ContentImage}): ReactElement {
  return (
    <figure className="block w-full">
      <img src={image.url} alt="" className="mt-3"/>
    </figure>
  )
}

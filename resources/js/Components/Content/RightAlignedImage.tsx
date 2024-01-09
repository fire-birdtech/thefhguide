import {type ReactElement} from "react";
import {type ContentImage} from "@/types";

export default function RightAlignedImage ({ image }: { image: ContentImage }): ReactElement {
  return <img src={image.url} width={image.width} alt="" className="mt-3 float-right ml-4 max-w-md"/>
}

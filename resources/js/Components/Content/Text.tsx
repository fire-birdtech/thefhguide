import {ReactElement} from "react";

export default function Text ({ text }: { text: string }): ReactElement {
  return <div dangerouslySetInnerHTML={{ __html: text }} className="block w-full"/>
}

import {ReactElement} from "react";
import {Resource} from "@/types";
import {DocumentTextIcon, VideoCameraIcon} from "@heroicons/react/24/outline";
import Anchor from "@/Components/Anchor";

export default function ResourceListItem({ resource }: { resource: Resource }): ReactElement {
  return (
    <li className="flex items-center justify-between text-sm">
      <div className="flex w-full flex-col">
        <span className="ml-2 truncate">{resource.description}</span>
        <ul className="mt-3 pl-3 space-y-1">
          {resource.links.map((link, linkIdx) => (
            <li className="flex" key={linkIdx}>
              {link.type === 'document' && <DocumentTextIcon className="h-5 w-auto flex-shrink-0 text-gray-400" aria-hidden={true}/>}
              {link.type === 'video' && <VideoCameraIcon className="h-5 w-auto flex-shrink-0 text-gray-400" aria-hidden={true}/>}
              <Anchor href={link.link} className="pl-2">
                {link.text}
              </Anchor>
            </li>
          ))}
        </ul>
      </div>
    </li>
  );
}

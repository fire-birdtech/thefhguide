import {type ReactElement} from "react";
import {type Resource} from "@/types";
import {DocumentTextIcon} from "@heroicons/react/24/outline";
import {PlayCircleIcon} from "@heroicons/react/24/solid";

export default function ResourceList ({ resources }: { resources: Resource[] }): ReactElement {
  return (
    <ul>
      {resources.map((resource, index) => (
        <li key={index}>
          <span>{resource.description}</span>
          <ul className="prose-li:list-none">
            {resource.links.map((link, linkIdx) => (
              <li key={linkIdx}>
                <a href={link.link} className="flex items-center gap-x-1">
                  {link.type === 'document' ? (
                    <DocumentTextIcon className="h-5 w-5" aria-hidden="true"/>
                  ) : (
                    <PlayCircleIcon className="h-5 w-5" aria-hidden="true"/>
                  )}
                  <span>{link.text}</span>
                </a>
              </li>
            ))}
          </ul>
        </li>
      ))}
    </ul>
  )
}

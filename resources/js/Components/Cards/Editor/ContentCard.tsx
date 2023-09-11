import {type ReactElement} from "react";
import {Link} from "@inertiajs/react";
import {type Collection, type Project} from "@/types";

export default function ContentCard({ content, type }: {
  content: Collection|Project;
  type: string;
}): ReactElement {
  return (
    <li className="col-span-1 border-2 border-transparent flex flex-col items-center justify-center rounded-lg bg-white text-center shadow hover:border-blue-400 hover:bg-blue-50">
      <Link className="p-6" href={route(type === 'project' ? 'editor.projects.show' : 'editor.collections.show', content.id)}>
        <div className="flex flex-1 flex-col">
          <p className="text-sm font-medium text-gray-900">
            {content.name}
          </p>
        </div>
      </Link>
    </li>
  );
}

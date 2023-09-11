import {type ReactElement} from "react";
import {Link} from "@inertiajs/react";
import {DocumentTextIcon} from "@heroicons/react/24/outline";
import {type Draft} from "@/types";

export default function DraftItem({draft}: {
  draft: Draft;
}): ReactElement {
  return (
    <li className="col-span-1">
      <Link
        href={route('editor.drafts.show', [draft.id])}
        className="flex flex-col bg-white hover:bg-blue-50 border-2 border-transparent hover:border-blue-400 text-center rounded-lg shadow"
      >
        <div className="flex w-full items-start justify-between space-x-6 p-6">
          <div className="flex-1 truncate">
            <div className="flex items-center space-x-3">
              <h3 className="truncate text-sm font-medium text-gray-900">
                {draft.name}
              </h3>
              <p className="mt-1 truncate text-xs text-left text-gray-500">
                Last update {new Date(draft.updated_at).toLocaleDateString('en-us', {weekday: "long", year: "numeric", month: "short", day: "numeric"})}
              </p>
            </div>
            <div className="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-md bg-blue-400 text-white">
              <DocumentTextIcon className="h-5 w-5"/>
            </div>
          </div>
        </div>
      </Link>
    </li>
  );
}

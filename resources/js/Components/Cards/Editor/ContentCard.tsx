import {Link} from "@inertiajs/react";
import {Header3} from "@/Components/Typography/Headers";

export default function ContentCard({ content, type }) {
  return (
    <li className="col-span-1 border-2 border-transparent flex flex-col items-center justify-center rounded-lg bg-white text-center shadow hover:border-blue-400 hover:bg-blue-50">
      <Link className="p-6" href={route(type === 'project' ? 'editor.projects.show' : 'editor.collections.show', [content.id])}>
        <div className="flex flex-1 flex-col">
          <Header3>
            {content.name}
          </Header3>
        </div>
      </Link>
    </li>
  );
}

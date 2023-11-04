import {ReactElement} from "react";
import {Link} from "@inertiajs/react";
import classNames from "@/Utils/classNames";

export interface ProjectNavigationProps {
  navigation: [
    {
      name: string,
      link: string,
    }
  ]
}

export default function ProjectNavigation({ navigation }: ProjectNavigationProps): ReactElement {
  return (
    <header className="mt-10 py-7 fixed inset-x-0 z-30 bg-white">
      <nav className="mx-auto flex items-center flex-wrap gap-x-3 gap-y-2 text-sm px-4 py-3 lg:px-8 lg:py-0" aria-label="Page">
        {navigation.map((item, index) => (
          <Link key={index} href={item.link} className={classNames(
            window.location.toString() === item.link ? 'font-bold' : '',
          )}>
            {item.name}
          </Link>
        ))}
      </nav>
    </header>
  );
}

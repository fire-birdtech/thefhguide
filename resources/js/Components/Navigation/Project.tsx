import {ReactElement} from "react";
import {Link} from "@inertiajs/react";
import classNames from "@/Utils/classNames";
import FamilySearchLogo from "@/logos/FamilySearchLogo";
import AncestryLogo from "@/logos/AncestryLogo";
import MyHeritageLogo from "@/logos/MyHeritageLogo";
import FindmypastLogo from "@/logos/FindmypastLogo";

const logos = {
  familysearch: FamilySearchLogo,
  ancestry: AncestryLogo,
  myheritage: MyHeritageLogo,
  findmypast: FindmypastLogo
}

const links = {
  familysearch: 'https://www.familysearch.org',
  ancestry: 'https://www.ancestry.com/',
  myheritage: 'https://www.myheritage.com/',
  findmypast: 'https://www.findmypast.com/'
}

export interface ProjectNavigationProps {
  navigation: [
    {
      name: string,
      link: string,
    }
  ],
  collectionSlug: string,
}

export default function ProjectNavigation({ navigation, collectionSlug }: ProjectNavigationProps): ReactElement {
  const LogoComponent = logos[collectionSlug]

  return (
    <header className="mt-10 py-7 fixed inset-x-0 z-30 bg-white">
      <nav className="mx-auto flex items-center flex-wrap gap-x-3 gap-y-2 text-sm px-4 py-3 lg:px-8 lg:py-0" aria-label="Page">
        {navigation.map((item, index) => (
          <Link key={index} href={item.link} className={classNames(
            window.location.toString() === item.link ? 'font-bold' : '',
            'hover:text-[#ff9f1c]'
          )}>
            {item.name}
          </Link>
        ))}
        <div className="ml-4">
          {Object.keys(logos).indexOf(collectionSlug) >= 0 ? (
            <a href={links[collectionSlug]} target="_blank" rel="noopener noreferrer nofollow">
              <LogoComponent className="h-5" />
            </a>
          ) : null}
        </div>
      </nav>
    </header>
  );
}

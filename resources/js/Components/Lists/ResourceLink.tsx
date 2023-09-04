import {DocumentTextIcon, StarIcon, VideoCameraIcon} from "@heroicons/react/24/outline";

export default function ResourceLink({ resource }) {
    return (
        <li className="flex items-center space-x-2">
            <StarIcon className="h-5 w-5 flex-shrink-0"/>
            {resource.type === 'document' && <DocumentTextIcon className="h-5 w-5 flex-shrink-0"/>}
            {resource.type === 'video' && <VideoCameraIcon className="h-5 w-5 flex-shrink-0"/>}
            <a href={resource.link} target="_blank" rel="nofollow noopener noreferrer">
                {resource.text}
            </a>
        </li>
    );
}

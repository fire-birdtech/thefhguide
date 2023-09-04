import {XMarkIcon} from "@heroicons/react/24/solid";
import classNames from "@/Utils/classNames";

const textStyles = {
    emerald: 'text-emerald-700',
    orange: 'text-orange-700',
    purple: 'text-purple-700',
    red: 'text-red-700',
    sky: 'text-sky-700',
    yellow: 'text-yellow-700'
}
const bgStyles = {
    emerald: 'bg-emerald-200',
    orange: 'bg-orange-200',
    purple: 'bg-purple-200',
    red: 'bg-red-200',
    sky: 'bg-sky-200',
    yellow: 'bg-yellow-200'
}
const closeIconStyles = {
    emerald: 'hover:bg-emerald-300 focus:bg-emerald-400',
    orange: 'hover:bg-orange-300 focus:bg-orange-400',
    purple: 'hover:bg-purple-300 focus:bg-purple-400',
    red: 'hover:bg-red-300 focus:bg-red-400',
    sky: 'hover:bg-sky-300 focus:bg-sky-400',
    yellow: 'hover:bg-yellow-300 focus:bg-yellow-400'
}

export default function ContentBlockHeader({children, color, remove}) {
    return (
        <div className="block group">
            <span className={classNames(
                textStyles[color],
                bgStyles[color],
                'inline-flex items-center rounded-t px-2 py-0.5 text-xs leading-6 font-medium',
            )}>
                {children}
                <button
                    type="button"
                    onClick={remove}
                    className={classNames(
                        textStyles[color],
                        closeIconStyles[color],
                        'hidden ml-1.5 -mr-0.5 h-3.5 w-3.5 flex-shrink-0 items-center justify-center rounded group-hover:inline-flex focus:outline-none',
                    )}
                >
                    <span className="sr-only">Remove content block</span>
                    <XMarkIcon className="h-3 w-3"/>
                </button>
            </span>
        </div>
    );
}

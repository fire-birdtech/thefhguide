import {useState} from "react";
import {XMarkIcon} from "@heroicons/react/24/outline";
import {EyeIcon, PencilSquareIcon} from "@heroicons/react/24/solid";

const listStyleAlpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

export default function ExpandableStackedListItem({ item }) {
  const [expanded, setExpanded] = useState(false);
  const [edit, setEdit] = useState(false);
  const [show, setShow] = useState(false);

  const close = () => {
    setExpanded(false);
    setEdit(false);
    setShow(false);
  }

  return (
    <div className="relative overflow-hidden bg-white rounded-md shadow ring-1 ring-black ring-opacity-5">
      <div className="block h-full">
        <div className="flex items-center px-4 py-4 sm:px-6">
          <div className="min-w-0 flex-1 sm:flex sm:items-center sm:justify-between">
            <div className="truncate">
              <div className="flex items-center text-sm">
                <div className="inline-flex items-center justify-center font-bold w-6 h-6 bg-gray-300 text-white rounded-full mr-2">
                  {listStyleAlpha[item.order - 1]}
                </div>
                <p className="truncate font-medium">
                  {item.name}
                </p>
              </div>
            </div>
          </div>

          <div className="ml-5 flex flex-shrink-0 space-x-2">
            {expanded ? (
              <div onClick={() => close()} className="text-gray-500 hover:text-gray-700 cursor-pointer">
                <XMarkIcon className="h-6 w-6"/>
              </div>
            ) : (
              <>
                <button onClick={() => setShow(true)} className="text-blue-600 hover:text-blue-900 cursor-pointer">
                    <EyeIcon className="h-6 w-6"/>
                    <span className="sr-only">View {item.name}</span>
                </button>
                <button onClick={() => setEdit(true)} className="text-blue-600 hover:text-blue-900 cursor-pointer">
                    <PencilSquareIcon className="h-6 w-6"/>
                    <span className="sr-only">Edit {item.name}</span>
                </button>
              </>
            )}
          </div>
        </div>
      </div>
    </div>
  );
}

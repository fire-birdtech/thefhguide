import {FormEventHandler, ReactElement, useState} from "react";
import {useForm} from "@inertiajs/react";
import {DocumentTextIcon, VideoCameraIcon} from "@heroicons/react/24/outline";
import Anchor from "@/Components/Anchor";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import {XMarkIcon} from "@heroicons/react/24/solid";
import PrimaryTextButton from "@/Components/Buttons/PrimaryTextButton";

export default function ({ resource }): ReactElement {
  const [view, setView] = useState('show');

  const {data, setData, errors, put, processing, reset} = useForm({
    ...resource,
  });

  const submit = () => {
    put(route('editor.resources.update'), {
      preserveScroll: true,
      preserveState: true,
    });
  }

  const saveResource: FormEventHandler = (e) => {
    e.preventDefault();

    submit();
    setView('show');
  }

  const addLink = () => { }

  return (
    <li className="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
      {view === 'show' ? (
        <>
          <div className="flex w-full flex-col">
            <span className="ml-2 truncate">{data.description}</span>
            <ul className="mt-3 ml-4 space-y-1">
              {data.links.map((link, linkIdx) => (
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
          <div className="ml-4 flex-shrink-0">
            <PrimaryTextButton onClick={() => setView('edit')}>
              Edit
            </PrimaryTextButton>
          </div>
        </>
      ) : (
        <div className="flex w-full items-center">
          <form className="w-full flex flex-col items-center">
            <div className="w-full flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
              <input
                type="text"
                value={data.description}
                placeholder="Description"
                className="flex-1 border-none text-sm rounded-l-md focus:ring-transparent"
              />
              <div className="flex items-center ml-2 mr-1 space-x-2">
                <PrimaryButton
                  onClick={saveResource}
                  className="px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300"
                  disabled={data.links.length < 1}
                >
                  Save
                </PrimaryButton>
                <button type="button" className="rounded hover:bg-purple-100">
                  <XMarkIcon onClick={() => setView('show')} className="w-5 h-5 text-purple-700"/>
                </button>
              </div>
            </div>
          </form>
          <div className="w-full pl-4 mt-1 space-y-1">
            {resource.links.map((link, linkIdx) => (
              <>
              <div key={linkIdx} className="flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
                <input
                  type="text"
                  value={link.text}
                  placeholder="Name"
                  className="flex-1 border-none text-sm rounded-l-md focus:ring-transparent"
                />
                <input
                  type="text"
                  value={link.link}
                  placeholder="External URL"
                  className="flex-1 border-none text-sm focus:ring-transparent"
                />
                <select
                  value={link.type}
                  className="border-none py-2 pl-3 pr-10 text-sm focus:ring-transparent"
                >
                  <option value="document">Document</option>
                  <option value="video">Video</option>
                </select>
                <div className="flex items-center ml-2 mr-1">
                  <button type="button" className="rounded hover:bg-purple-100">
                    <XMarkIcon className="h-5 w-5 text-purple-700"/>
                  </button>
                </div>
              </div>
                <PrimaryButton
                  onClick={addLink}
                  className="px-2 py-0.5 text-xs rounded bg-purple-200 text-purple-700 hover:bg-purple-300"
                >
                  &#43; Add resource link
                </PrimaryButton>
              </>
            ))}
          </div>
        </div>
      )}
    </li>
  );
}

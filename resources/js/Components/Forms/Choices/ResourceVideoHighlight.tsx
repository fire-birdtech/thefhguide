import {type ReactElement, useState} from "react";
import {FilmIcon} from "@heroicons/react/24/outline";
import RemoveButton from "@/Components/Buttons/Choices/RemoveButton";
import {Highlight} from "@/types";

export default function ResourceVideoHighlight({ index, remove, update }: { index: number, remove: () => {}, update: (key: number, value: Highlight) => {} }): ReactElement {
  const [highlight, setHighlight] = useState({
    text: '',
    link: '',
  });

  const updateHighlight = (key: string, value: string): void => {
    let updatedHighlight = {
      ...highlight,
      [key]: value,
    }
    setHighlight({
      ...updatedHighlight,
    });

    update(index, updatedHighlight);
  }

  return (
    <div className="w-full flex items-center space-x-1">
      <FilmIcon className="h-5 w-5 text-purple-400" aria-hidden="true"/>
      <div className="flex items-center w-full border border-purple-200 rounded-md focus-within:border-purple-300">
        <input
          type="text"
          value={highlight.text}
          onChange={(e) => updateHighlight(
            'text', e.target.value
          )}
          placeholder="Text"
          className="flex-1 border-none text-sm rounded-l-md focus:ring-transparent"
        />
        <input
          type="text"
          value={highlight.link}
          onChange={(e) => updateHighlight(
            'link', e.target.value
          )}
          placeholder="Link"
          className="flex-1 border-none text-sm focus:ring-transparent"
        />
        <div className="flex items-center mx-2">
          <RemoveButton
            onClick={remove}
          />
        </div>
      </div>
    </div>
  );
}

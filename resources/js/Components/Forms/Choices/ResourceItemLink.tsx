import {type ReactElement, useState} from "react";
import RemoveButton from "@/Components/Buttons/Choices/RemoveButton";
import {type ResourceLink} from "@/types";
import ResourceVideoHighlight from "@/Components/Forms/Choices/ResourceVideoHighlight";
import AddButton from "@/Components/Buttons/Choices/AddButton";

export default function ResourceItemLink({index, link, remove, update}: ResourceLink<{ index: number, remove: (key) => {}, update: (key, value) => {} }>): ReactElement {
  const [resourceLink, setResourceLink] = useState<ResourceLink>({
    text: '',
    link: '',
    type: 'document',
    iframe: '',
    highlights: [],
  });

  const updateResource = (key: string, value: string): void => {
    let updatedResourceLink: ResourceLink = {
      ...resourceLink,
      [key]: value,
    }
    setResourceLink({
      ...updatedResourceLink,
    });

    update(index, updatedResourceLink);

  }

  const addHighlight = (): void => {
    let { highlights } = resourceLink;
    highlights.push({
      text: '',
      link: '',
    });

    setResourceLink({
      ...resourceLink,
      highlights: highlights,
    });
  }

  const removeHighlight = (highlightKey): void => {
    let { highlights } = resourceLink;
    delete highlights[highlightKey];

    setResourceLink({
      ...resourceLink,
      highlights: highlights,
    });
  }

  return (
    <>
      <div className="flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
        <input
          type="text"
          value={resourceLink.text}
          onChange={(e) => updateResource('text', e.target.value)}
          placeholder="Name"
          className="flex-1 border-none text-sm rounded-l-md focus:ring-transparent"
        />
        {resourceLink.type === 'document' && (
          <input
            type="text"
            value={resourceLink.link}
            onChange={(e) => updateResource('link', e.target.value)}
            placeholder="External URL"
            className="flex-1 border-none text-sm focus:ring-transparent"
          />
        )}
        {resourceLink.type === 'video' && (
          <input
            type="text"
            value={resourceLink.iframe}
            onChange={(e) => updateResource('iframe', e.target.value)}
            placeholder="IFrame"
            className="flex-1 border-none text-sm focus:ring-transparent"
          />
        )}
        <select
          value={resourceLink.type}
          onChange={(e) => updateResource('type', e.target.value)}
          className="border-none py-2 pl-3 pr-10 text-sm focus:ring-transparent"
        >
          <option value="document">Document</option>
          <option value="video">Video</option>
        </select>
        <div className="flex items-center mx-2">
          <RemoveButton
            onClick={() => remove(index)}
          />
        </div>
      </div>

      {resourceLink.highlights.length > 0 && (
        <div className="ml-4 space-y-1">
          {resourceLink.highlights.map((highlight, index) => (
            <ResourceVideoHighlight key={index} highlight={highlight} remove={() => removeHighlight(index)}/>
          ))}
        </div>
      )}

      {resourceLink.type === 'video' && (
        <div className="ml-4">
          <AddButton
            onClick={() => addHighlight()}
          >
            &#43; Add video highlight
          </AddButton>
        </div>
      )}
    </>
  );
}

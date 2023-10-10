import {type ReactElement, useState} from "react";
import InputLabel from "@/Components/Forms/InputLabel";
import ResourceItemLink from "@/Components/Forms/Choices/ResourceItemLink";
import AddButton from "@/Components/Buttons/Choices/AddButton";
import RemoveButton from "@/Components/Buttons/Choices/RemoveButton";
import {type Resource, type ResourceLink} from "@/types";

export default function AddResourceItem({add}: {
  add: (resource: Resource) => {};
}): ReactElement {
  const [displayAddResourceForm, setDisplayAddResourceForm] = useState(false);
  const [newResourceItem, setNewResourceItem] = useState<Resource>({
    description: '',
    links: [],
  });

  const addResource = (): void => {
    setNewResourceItem({
      ...newResourceItem,
    });
    add(newResourceItem);
    removeResource();
  }

  const removeResource = () => {
    setNewResourceItem({
      description: '',
      links: [],
    });
    setDisplayAddResourceForm(false);
  }

  const addLink = () => {
    setNewResourceItem({
      ...newResourceItem,
      links: [
        ...newResourceItem.links,
        {
          text: '',
          link: '',
          type: '',
          highlights: [],
        },
      ],
    });
  }

  const updateLink = (key: number, value: ResourceLink): void => {
    let { links } = newResourceItem;
    links.splice(key, 1, value);

    setNewResourceItem({
      ...newResourceItem,
      links,
    });
  }

  const removeLink = (key: number): void => {
    let links: ResourceLink[] = newResourceItem.links;
    links.splice(key, 1);
    setNewResourceItem({
      ...newResourceItem,
      links,
    });
  }

  return displayAddResourceForm ? (
    <form className="mt-4">
      <InputLabel label="Add a new resource"/>
      <div className="mt-1 flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
        <input
          type="text"
          placeholder="Description"
          value={newResourceItem.description}
          onChange={(e) => setNewResourceItem({...newResourceItem, description: e.target.value})}
          className="flex-1 border-none text-sm rounded-l-md focus:ring-transparent"
        />
        <div className="flex items-center mx-2 space-x-2">
          <AddButton
            onClick={() => addResource()}
            disabled={newResourceItem.links.length < 1}
          >
            Add Resource
          </AddButton>
          <RemoveButton
            onClick={() => removeResource()}
          />
        </div>
      </div>

      <div className="ml-4 mt-1 space-y-1">
        {newResourceItem.links && newResourceItem?.links.map((link: ResourceLink, key: number) => (
          <ResourceItemLink
            key={key}
            index={key}
            link={link}
            update={(key, value) => updateLink(key, value)}
            remove={removeLink}
          />
        ))}
        <AddButton
          onClick={() => addLink()}
          disabled={false}
        >
          + Add resource link
        </AddButton>
      </div>
    </form>
  ) : (
    <AddButton onClick={() => setDisplayAddResourceForm(true)}>
      + New resource
    </AddButton>
  );
}

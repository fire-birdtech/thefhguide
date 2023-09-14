import {type ReactElement, useState} from "react";
import InputLabel from "@/Components/Forms/InputLabel";
import {ResourceLink} from "@/types";
import ResourceItemLink from "@/Components/Forms/Choices/ResourceItemLink";
import AddButton from "@/Components/Buttons/Choices/AddButton";
import RemoveButton from "@/Components/Buttons/Choices/RemoveButton";

export default function AddResourceItem({add}: {
  add: () => {};
}): ReactElement {
  const [displayAddResourceForm, setDisplayAddResourceForm] = useState(false);
  const [newResourceItem, setNewResourceItem] = useState({
    description: '',
    links: [],
  });

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
        },
      ],
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
          <ResourceItemLink key={key} index={key} link={link} remove={removeLink}/>
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

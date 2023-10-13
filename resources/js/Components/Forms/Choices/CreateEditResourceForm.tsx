import {ReactElement, useState} from "react";
import AddButton from "@/Components/Buttons/Choices/AddButton";
import RemoveButton from "@/Components/Buttons/Choices/RemoveButton";
import ResourceItemLink from "@/Components/Forms/Choices/ResourceItemLink";
import {Resource, ResourceLink} from "@/types";

interface CreateEditResourceFormProps {
  className: string
  resource?: Resource
  save: (resource: Resource) => {}
  setDisplay: () => void
  usage: string
}

export default function CreateEditResourceForm({
  className, resource, save, setDisplay, usage,
}: CreateEditResourceFormProps): ReactElement {
  const [currentResource, setCurrentResource] = useState<Resource>({
    description: resource?.description ?? '',
    links: resource?.links ?? [],
  });

  const addResource = (): void => {
    setCurrentResource({
      ...currentResource,
    });
    save(currentResource);
    removeResource();
  }

  const removeResource = (): void => {
    setCurrentResource({
      description: '',
      links: [],
    });
    setDisplay();
  }

  const cancelEditResource = (): void => {
    setDisplay();
  }

  const addLink = (): void => {
    setCurrentResource({
      ...currentResource,
      links: [
        ...currentResource.links,
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
    let { links } = currentResource;
    links.splice(key, 1, value);

    setCurrentResource({
      ...currentResource,
      links,
    });
  }

  const removeLink = (key: number): void => {
    let links: ResourceLink[] = currentResource.links;
    links.splice(key, 1);
    setCurrentResource({
      ...currentResource,
      links,
    });
  }

  return (
    <form className={className}>
      <div className="mt-1 flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
        <input
          type="text"
          placeholder="Description"
          value={currentResource.description}
          onChange={(e) => setCurrentResource({...currentResource, description: e.target.value})}
          className="flex-1 border-none text-sm rounded-l-md focus:ring-transparent"
        />
        <div className="flex items-center mx-2 space-x-2">
          {usage === 'create' && <>
            <AddButton
              onClick={() => addResource()}
              disabled={currentResource.links.length < 1}
            >
              Add Resource
            </AddButton>
            <RemoveButton
              onClick={() => removeResource()}
            />
          </>}
          {usage === 'edit' && <>
            <AddButton
              onClick={() => addResource()}
            >
              Save
            </AddButton>
            <RemoveButton
              onClick={cancelEditResource}
            />
          </>}
        </div>
      </div>

      <div className="ml-4 mt-1 space-y-1">
        {currentResource.links && currentResource?.links.map((link: ResourceLink, key: number) => (
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
  );
}

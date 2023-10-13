import ResourceLink from "@/Components/Lists/ResourceLink";

export default function ResourceListItemPublic({resource}) {
  console.log('resource', resource);
  return (
    <li>
      <span>
          {resource.description}
      </span>
      <ul className="list-none">
        {resource.links.map((item, idx) => (
          <ResourceLink key={idx} resource={item}/>
        ))}
      </ul>
    </li>
  );
}

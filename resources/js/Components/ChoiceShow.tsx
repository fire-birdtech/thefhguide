import {type ReactElement} from "react";
import ResourceListItemPublic from "@/Components/Lists/ResourceListItemPublic";
import {type Choice, ChoiceContentTypes} from "@/types";

const renderContent = (item, idx) => {
  if (item.type === ChoiceContentTypes.SUMMARY) {
    return (
      <template key={idx}>
        <div className="text-gray-500 font-medium hover:underline">
          Summary
        </div>
        <div dangerouslySetInnerHTML={{__html: item.data}}/>
      </template>
    );
  } else if (item.type === ChoiceContentTypes.RESOURCES) {
    item.data.forEach((resource) => (
      <ResourceListItemPublic key={idx} resource={resource}/>
    ))
  } else if (item.type === ChoiceContentTypes.EXERCISES) {
    return (
      <template key={idx}>
        <div className="text-gray-500 font-medium hover:underline">
          Exercises
        </div>
        <div dangerouslySetInnerHTML={{__html: item.data}}/>
      </template>
    );
  } else {
    return <div key={idx} dangerouslySetInnerHTML={{__html: item.data}}/>;
  }
}

export default function ChoiceShow({choice}: {
  choice: Choice;
}): ReactElement {
  return (
    <div className="border-t border-gray-200">
      <dl className="sm:divide-y sm:divide-gray-200">
        <div className="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt className="text-sm font-medium text-gray-500">
            Name
          </dt>
          <dd className="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-7">
            {choice.name}
          </dd>
        </div>
        <div className="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
          <dt className="text-sm font-medium text-gray-500">
            Content
          </dt>
          <dd className="mt-1 text-sm text-gray-900 prose max-w-none space-y-6 sm:mt-0 sm:col-span-7">
            {choice.content.map((item, idx) => renderContent(item, idx))}
          </dd>
        </div>
      </dl>
    </div>
  );
}

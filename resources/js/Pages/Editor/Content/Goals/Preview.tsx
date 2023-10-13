import {type ReactElement} from "react";
import {Head} from "@inertiajs/react";
import ExpandableChoiceItem from "@/Components/Lists/ExpandableChoiceItem";
import {Goal} from "@/types";

export default function GoalPreview({ goal }: { goal: Goal }): ReactElement {
  return <>
    <Head title={`Preview of ${goal.name}`}/>

    <div className="relative bg-stone-100">
      <div className="h-56 sm:h-96 md:absolute md:right-0 md:h-full md:w-1/2">
        <img
          src={goal.project.cover_image_url}
          alt=""
          className="h-full w-full object-cover border border-stone-900"
        />
      </div>
      <div className="relative px-4 py-16 sm:px-6 lg:px-8">
        <div className="text-center space-y-8 md:w-1/2">
          <h2 className="text-3xl font-display font-bold tracking-normal text-stone-800 sm:text-4.5xl">
            Project {goal.project.order}: {goal.project.name}
          </h2>
          <h3 className="text-2.5xl font-display font-medium text-stone-800">
            <strong>
              Goal {goal.order}:
            </strong>{' '}
            {goal.name}
          </h3>
        </div>
      </div>
    </div>

    <div className="my-8 bg-stone-100 max-w-5xl mx-auto px-4 py-5 sm:px-12">
      <h4 className="text-2xl font-display font-medium leading-8 text-stone-900 sm:truncate sm:tracking-tight">
        Goal {goal.order}: {goal.section_name}
      </h4>
      <div className="mt-6 prose max-w-5xl" dangerouslySetInnerHTML={{ __html: goal.summary }}/>
      <h4 className="mt-16 text-2xl font-display font-medium leading-8 text-stone-900 sm:truncate sm:tracking-tight">
        Choices
      </h4>
      <ul className="mt-8 space-y-8">
        {goal.choices.map((choice) => (
          <ExpandableChoiceItem choice={choice}/>
        ))}
      </ul>
    </div>
  </>;
}

import {ReactElement} from "react";
import {Goal} from "@/types";

export default function GoalPageHeader({ goal }: { goal: Goal }): ReactElement {
  return (
    <div className="relative bg-stone-100">
      <div className="h-56 sm:h-96 md:absolute md:right-0 md:h-full md:w-1/2">
        <img
          src={goal.project.cover_image_url}
          alt=""
          className="h-full w-full object-cover border border-stone-900"
        />
      </div>
      <div className="relative px-4 py-12 sm:px-6 md:py-16 lg:px-8">
        <div className="text-center space-y-4 md:space-y-8 md:w-1/2">
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
  );
}

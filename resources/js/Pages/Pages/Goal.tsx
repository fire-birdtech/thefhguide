import {ReactElement} from "react";
import {Goal, PageProps} from "@/types";
import {Head} from "@inertiajs/react";
import MainNavigation from "@/Components/Navigation/Main";
import GoalPageHeader from "@/Components/GoalPageHeader";
import GoalPageContent from "@/Components/GoalPageContent";

export default function GoalPage({ auth, goal, title }: PageProps<{ goal: Goal, title: string }>): ReactElement {
  return (
    <>
      <Head title={title}/>

      <MainNavigation/>

      <div className="pt-16">
        <GoalPageHeader goal={goal}/>
        <GoalPageContent goal={goal}/>
      </div>
    </>
  );
}

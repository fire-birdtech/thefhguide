import {ReactElement} from "react";
import {Goal, PageProps} from "@/types";
import {Head} from "@inertiajs/react";
import MainNavigation from "@/Components/Navigation/Main";

export default function GoalPage({ auth, goal, title }: PageProps<{ goal: Goal, title: string }>): ReactElement {
  return (
    <>
      <Head title={title}/>

      <MainNavigation/>
    </>
  );
}

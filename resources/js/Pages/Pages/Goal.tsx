import {ReactElement} from "react";
import {Goal, PageProps} from "@/types";
import {Head} from "@inertiajs/react";
import MainNavigation from "@/Components/Navigation/Main";
import GoalPageHeader from "@/Components/GoalPageHeader";
import GoalPageContent from "@/Components/GoalPageContent";
import ProjectNavigation from "@/Components/Navigation/Project";

export default function GoalPage({ auth, goal, project_navigation, title }: PageProps<{ goal: Goal, project_navigation: [{ name: string; link: string; }], title: string }>): ReactElement {
  return (
    <>
      <Head title={title}/>

      <MainNavigation/>
      <ProjectNavigation navigation={project_navigation} collectionSlug={goal.project.collection.slug}/>

      <div className="pt-[8.5rem]">
        <GoalPageHeader goal={goal}/>
        <GoalPageContent goal={goal}/>
      </div>
    </>
  );
}

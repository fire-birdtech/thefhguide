import { type ReactElement } from 'react'
import { type Goal, type PageProps } from '@/types'
import { Head } from '@inertiajs/react'
import MainNavigation from '@/Components/Navigation/Main'
import GoalPageHeader from '@/Components/GoalPageHeader'
import GoalPageContent from '@/Components/GoalPageContent'
import ProjectNavigation from '@/Components/Navigation/Project'

export default function GoalPage ({ auth, goal, projectNavigation, title }: PageProps<{ goal: Goal, projectNavigation: [{ name: string, link: string }], title: string }>): ReactElement {
  return (
    <>
      <Head title={title}/>

      <MainNavigation/>
      <ProjectNavigation navigation={projectNavigation} collectionSlug={goal.project.collection.slug}/>

      <div className="pt-[8.5rem]">
        <GoalPageHeader goal={goal}/>
        <GoalPageContent goal={goal}/>
      </div>
    </>
  )
}

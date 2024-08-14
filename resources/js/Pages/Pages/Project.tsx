import { type ReactElement } from 'react'
import { Head } from '@inertiajs/react'
import { Link } from '@/Components/link'
import { type Project } from '@/types'
import MainNavigation from '@/Components/Navigation/Main'
import ProjectNavigation from '@/Components/Navigation/Project'
import LearningSystemHeader from '@/Components/learning-system-header'
import { Heading } from '@/Components/Typography/Headers'
import { listStyleAlpha } from '@/Utils/string'
import PageLayout from "@/Layouts/Page";

interface Props {
  collectionNavigation: [{ name: string, link: string }]
  project: Project
  title: string
}

const HeaderText = ({ project }: { project: Project }): ReactElement => {
  return (<>
    <Heading>
      {`${project.collection.name} Project ${project.order}:`}
    </Heading>
    <Heading level={2}>
      {project.name}
    </Heading>
    <Heading level={3}>
      Goals and Choices
    </Heading>
  </>)
}

export default function ProjectPage ({ collectionNavigation, project, title }: Props): ReactElement {
  return (
    <PageLayout header={<ProjectNavigation navigation={collectionNavigation} collectionSlug="" />}>
      <Head title={title} />

      <div className="pt-[8.5rem]">
        <LearningSystemHeader
          image={project.cover_image_url}
          text={<HeaderText project={project} />}
        />

        <div className="max-w-5xl mx-auto px-4 py-5 sm:p-12">
          <p>
            Welcome to {project.collection.name} <strong>Project {project.order}: {project.name}</strong>. The{' '}
            {project.goals_count} Goals for learning are included below. Each Goal has links to Choices that you can work
            on, with steps, articles, and videos. You can start with Goal 1 and go Choice by Choice, or you can skip to
            any Choice you&apos;re interested in. To select a different Project, use the Project links above.
          </p>

          <div className="mt-10 grid grid-cols-3 gap-6">
            {project.goals.map(goal => (
              <div key={goal.id}>
                <Heading level={4} fontFamily="sans">
                  Goal {goal.order}: {goal.name}
                </Heading>

                <Heading level={5} fontFamily="sans" className="mt-3">
                  Choices:
                </Heading>
                <ul className="mt-1 list-disc ml-5 space-y-1">
                  {goal.choices.map((choice) => (
                    <li key={choice.id} className="text-sm">
                      <Link href={`${route('pages.show', goal.page.uri)}#${listStyleAlpha[choice.order - 1].toLowerCase()}`}>
                        {listStyleAlpha[choice.order - 1]}: {choice.name}
                      </Link>
                    </li>
                  ))}
                </ul>
              </div>
            ))}
          </div>
        </div>
      </div>
    </PageLayout>
  )
}

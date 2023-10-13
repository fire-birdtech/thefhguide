import {Head} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import {Header3} from "@/Components/Typography/Headers";
import ContentCard from "@/Components/Cards/Editor/ContentCard";
import {type Collection, type PageProps, type Project} from "@/types";

export default function ContentIndex({ auth, collections, projects }: PageProps<{ collections: Collection[], projects: Project[] }>) {
  return (
    <>
      <Head title="Site Content"/>

      <Admin user={auth.user}>
        <div className="w-full py-8 px-4 sm:px-6 lg:px-8">
          <Header3>
            Project Collections
          </Header3>
          <div className="mt-4 grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7">
            {collections.map((collection) => (
              <ContentCard key={collection.id} content={collection} type="collection"/>
            ))}
            {projects.map((project) => (
              <ContentCard key={project.id} content={project} type="project"/>
            ))}
          </div>
        </div>
      </Admin>
    </>
  );
}

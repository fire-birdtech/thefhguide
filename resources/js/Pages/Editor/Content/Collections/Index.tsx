import {type ReactElement} from "react";
import {Head, Link} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import {EyeIcon} from "@heroicons/react/24/outline";
import {PencilSquareIcon} from "@heroicons/react/24/solid";
import {type Collection, type PageProps} from "@/types";

export default function CollectionIndex({ auth, collections }: PageProps<{ collections: Collection[] }>): ReactElement {
  return (
    <>
      <Head title="Admin - Collections"/>

      <Admin user={auth.user}>
        <Container>
          <div className="sm:flex sm:items-center">
            <div className="sm:flex-auto">
              <h1 className="text-xl font-semibold text-gray-900">
                Collections
              </h1>
              <p className="mt-2 text-sm text-gray-700">
                A list of all the project collections
              </p>
            </div>
            <div className="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
              <PrimaryButton href={route('editor.collections.create')}>
                Add collection
              </PrimaryButton>
            </div>
          </div>
          <div className="mt-8 flex flex-col">
            <div className="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div className="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div className="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                  <table className="min-w-full divide-y divide-gray-300">
                    <thead className="bg-gray-50">
                      <tr>
                        <th scope="col" className="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                          Name
                        </th>
                        <th scope="col" className="relative py-3.5 pl-3 pr-4 sm:pr-6">
                          <span className="sr-only">Manage</span>
                        </th>
                      </tr>
                    </thead>
                    <tbody className="bg-white">
                      {collections.map((collection, index) => (
                        <tr key={collection.id} className={index % 2 === 0 ? '' : 'bg-gray-50'}>
                          <td className="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 hover:text-gray-700 sm:pl-6">
                            <Link href={route('editor.collections.show', [collection.slug])}>
                              {collection.name}
                            </Link>
                          </td>
                          <td className="flex justify-end whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium space-x-2 sm:pr-6">
                            <Link href={route('editor.collections.show', [collection.slug])} className="text-blue-600 hover:text-blue-900">
                              <EyeIcon className="h-6 w-6"/>
                              <span className="sr-only">View {collection.name}</span>
                            </Link>
                            <Link href={route('editor.collections.edit', [collection.slug])} className="text-blue-600 hover:text-blue-900">
                              <PencilSquareIcon className="h-6 w-6"/>
                              <span className="sr-only">Edit {collection.name}</span>
                            </Link>
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </Container>
      </Admin>
    </>
  );
}

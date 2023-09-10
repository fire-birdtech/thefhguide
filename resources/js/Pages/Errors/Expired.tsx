import {type ReactElement} from "react";
import {Head, Link} from "@inertiajs/react";
import Error from "@/Layouts/Error";

export default function ExpiredPage(): ReactElement {
  return (
    <>
      <Head title="Page Expired"/>

      <Error>
        <div className="max-w-max mx-auto">
          <div className="sm:flex">
            <p className="text-4xl font-extrabold text-blue-600 sm:text-5xl">
              404
            </p>
            <div className="sm:ml-6">
              <div className="sm:border-l sm:border-gray-200 sm:pl-6">
                <h1 className="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                  Page not found
                </h1>
                <p className="mt-2 text-base text-gray-500">
                  This page has expired. Please request the invitation to be resent.
                </p>
              </div>
              <div className="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                <Link href={route('home')} className="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  Go to home
                </Link>
              </div>
            </div>
          </div>
        </div>
      </Error>
    </>
  );
}

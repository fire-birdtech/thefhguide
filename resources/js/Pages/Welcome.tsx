import { Head, Link } from '@inertiajs/react'
import ApplicationLogo from '@/Components/ApplicationLogo'
import { type PageProps } from '@/types'
import { type ReactElement } from 'react'

export default function Welcome ({ auth }: PageProps): ReactElement {
  return (
    <>
      <Head title="Welcome" />

      <div className="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div className="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          {auth.user !== null
            ? (
              <Link
                href={route('dashboard')}
                className="text-sm text-gray-700 dark:text-gray-400 underline"
              >
                Dashboard
              </Link>
              ) : (
              <>
                <Link
                  href={route('login')}
                  className="text-sm text-gray-700 dark:text-gray-400 underline"
                >
                  Log in
                </Link>
                <Link
                  href={route('register')}
                  className="ml-4 text-sm text-gray-700 dark:text-gray-400 underline"
                >
                  Register
                </Link>
              </>
              )}
          </div>
        <div className="max-w-6xl mx-auto sm:px-6 lg:px-8">
          <ApplicationLogo className="w-auto h-64 fill-current text-gray-500"/>
        </div>
      </div>
    </>
  )
}

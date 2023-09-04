import { type PropsWithChildren } from 'react'
import {Link} from "@inertiajs/react";
import ApplicationLogo from "@/Components/ApplicationLogo";

export default function Guest({ children }: PropsWithChildren) {
  return (
    <div className="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
      <div>
        <Link href={route('home')}>
          <ApplicationLogo className="w-auto h-20 fill-current text-gray-500"/>
        </Link>
      </div>

      <div className="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {children}
      </div>
    </div>
  );
}
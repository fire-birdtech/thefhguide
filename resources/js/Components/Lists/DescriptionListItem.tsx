import {ReactElement} from "react";

export default function ({
  term, children, className, details
}: {term: string, children?: ReactElement, className?: string, details?: string}): ReactElement {
  return (
    <div className="py-4 sm:py-5 sm:grid sm:grid-cols-8 sm:gap-4 sm:px-6">
      <dt className="text-sm font-medium text-gray-500">
        {term}
      </dt>
      <dd className={`mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-7 ${className}`}>
        {details ?? children}
      </dd>
    </div>
  );
}

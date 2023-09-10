import {type PropsWithChildren, type ReactElement} from "react";

export default function Error({ children }: PropsWithChildren): ReactElement {
  return (
    <div className="bg-white min-h-full px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
      {children}
    </div>
  );
}

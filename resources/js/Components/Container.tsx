import {PropsWithChildren} from "react";

export default function Container({ children }: PropsWithChildren) {
  return (
    <div className="w-full py-8 px-4 sm:px-6 lg:px-8">
      {children}
    </div>
  );
}

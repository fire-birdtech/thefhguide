import {PropsWithChildren} from "react";

export function Header3({children}: PropsWithChildren) {
  return (
    <h3 className="text-lg leading-6 font-medium text-gray-900">
      {children}
    </h3>
  );
}

export function Header5({children}: PropsWithChildren) {
    return (
      <h5 className="text-xl leading-6 font-medium text-gray-900">
          {children}
      </h5>
    );
}

import {type ReactElement} from "react";
import classNames from "@/Utils/classNames";

export default function FormText({ className, value }: {
  className: string;
  value: string;
}): ReactElement {
  return (
    <p className={classNames(
      'text-sm py-2', className
    )}>
      {value}
    </p>
  );
}

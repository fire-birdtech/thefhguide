import {CSSProperties, forwardRef, HTMLAttributes} from "react";
import classNames from "@/Utils/classNames";

export interface ActionProps extends HTMLAttributes<HTMLButtonElement> {
  active?: {
    fill: string;
    background: string;
  };
  cursor?: CSSProperties['cursor'];
}

export const Action = forwardRef<HTMLButtonElement, ActionProps>(
  ({active, className, cursor, style, ...props}, ref)  => {
    return (
      <button
        ref={ref}
        {...props}
        className={classNames(
          'group flex items-center justify-center w-3 p-4 flex-grow-0 flex-shrink-0 basis-auto touch-none cursor-pointer rounded border-none outline-none appearance-none bg-transparent hover:bg-black/5 active:bg-black/5 focus-visible:outline-none focus-visible:shadow-action',
          className as string,
        )}
        tabIndex={0}
      />
    );
  }
);

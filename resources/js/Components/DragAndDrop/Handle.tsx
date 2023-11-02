import {forwardRef} from "react";
import {Action, ActionProps} from "@/Components/DragAndDrop/Action";

export const Handle = forwardRef<HTMLButtonElement, ActionProps>(
  (props, ref) => {
    return (
      <Action
        ref={ref}
        cursor="grab"
        {...props}
      >
        <svg className="flex-grow-0 flex-shrink-0 basis-auto m-auto h-full overflow-visible fill-[#919eab] group-hover:fill-[#6f7b88] active:fill-[#788491]" viewBox="0 0 20 20" width="12">
          <path d="M7 2a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 2zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 8zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 7 14zm6-8a2 2 0 1 0-.001-4.001A2 2 0 0 0 13 6zm0 2a2 2 0 1 0 .001 4.001A2 2 0 0 0 13 8zm0 6a2 2 0 1 0 .001 4.001A2 2 0 0 0 13 14z"></path>
        </svg>
      </Action>
    );
  }
);

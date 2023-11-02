import {forwardRef, HTMLAttributes} from "react";
import classNames from "@/Utils/classNames";
import {Action, Handle, Remove} from "@/Components/DragAndDrop";

export interface TreeItemProps extends Omit<HTMLAttributes<HTMLLIElement>, 'id'> {
  childCount?: number;
  clone?: boolean;
  collapsed?: boolean;
  depth: number;
  disableInteraction?: boolean;
  disableSelection?: boolean;
  ghost?: boolean;
  handleProps?: any;
  indicator?: boolean;
  indentationWidth: number;
  value: string;
  onCollapse?(): void;
  onRemove?(): void;
  wrapperRef?(node: HTMLLIElement): void;
}

export const TreeItem = forwardRef<HTMLDivElement, TreeItemProps>(
  ({
    childCount,
    clone,
    depth,
    disableSelection,
    disableInteraction,
    ghost,
    handleProps,
    indentationWidth,
    indicator,
    collapsed,
    onCollapse,
    onRemove,
    value,
    wrapperRef,
    ...props
  }, ref) => {
    return (
      <li
        className={classNames(
          'wrapper',
          clone ? 'clone' : '',
          ghost ? 'ghost' : '',
          indicator ? 'indicator' : '',
          disableSelection ? 'disableSelection' : '',
          disableInteraction ? 'disableInteraction' : '',
        )}
        ref={wrapperRef}
        {...props}
      >
        <div className="relative flex items-center p-2.5 bg-white border border-[#dedede] text-[#222222] box-border" ref={ref}>
          <Handle {...handleProps}/>
          {onCollapse && (
            <Action
              onClick={onCollapse}
              className={classNames(
                collapsed ? 'transform -rotate-90' : '',
              )}
            >
              <svg className="flex-grow-0 flex-shrink-0 basis-auto m-auto h-full overflow-visible fill-[#919eab] transform ease-in-out duration-300 group-hover:fill-[#6f7b88] active:fill-[#788491]" width="10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 41">
                <path d="M30.76 39.2402C31.885 40.3638 33.41 40.995 35 40.995C36.59 40.995 38.115 40.3638 39.24 39.2402L68.24 10.2402C69.2998 9.10284 69.8768 7.59846 69.8494 6.04406C69.822 4.48965 69.1923 3.00657 68.093 1.90726C66.9937 0.807959 65.5106 0.178263 63.9562 0.150837C62.4018 0.123411 60.8974 0.700397 59.76 1.76024L35 26.5102L10.24 1.76024C9.10259 0.700397 7.59822 0.123411 6.04381 0.150837C4.4894 0.178263 3.00632 0.807959 1.90702 1.90726C0.807714 3.00657 0.178019 4.48965 0.150593 6.04406C0.123167 7.59846 0.700153 9.10284 1.75999 10.2402L30.76 39.2402Z" />
              </svg>
            </Action>
          )}
          <span className="flex-grow pl-2 whitespace-nowrap text-ellipsis overflow-hidden">{value}</span>
          {!clone && onRemove && <Remove onClick={onRemove} />}
          {clone && childCount && childCount > 1 ? (
            <span className="absolute -top-2.5 -right-2.5 flex items-center justify-center w-6 h-6 rounded bg-[#2389ff] text-sm font-semibold text-white">
              {childCount}
            </span>
          ) : null}
        </div>
      </li>
    )
  }
)

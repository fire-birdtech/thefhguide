import {AnimateLayoutChanges, useSortable} from "@dnd-kit/sortable";
import {CSSProperties, ReactNode} from "react";
import {CSS} from "@dnd-kit/utilities";
import {TreeItem, TreeItemProps} from "@/Components/DragAndDrop/Tree/TreeItem";
import {iOS} from "@/Utils/DragAndDrop";

const animateLayoutChanges: AnimateLayoutChanges = ({isSorting, wasDragging}) =>
  !(isSorting || wasDragging);

export function SortableTreeItem({id, depth, ...props}: TreeItemProps): ReactNode {
  const {
    attributes,
    isDragging,
    isSorting,
    listeners,
    setDraggableNodeRef,
    setDroppableNodeRef,
    transform,
    transition,
  } = useSortable({
    id,
    animateLayoutChanges,
  })

  const style: CSSProperties = {
    transform: CSS.Transform.toString(transform),
    transition,
  }

  return (
    <TreeItem
      ref={setDraggableNodeRef}
      wrapperRef={setDroppableNodeRef}
      style={style}
      depth={depth}
      ghost={isDragging}
      disableSelection={iOS}
      disableInteraction={isSorting}
      handleProps={{
        ...attributes,
        ...listeners,
      }}
      {...props}
    />
  )
}

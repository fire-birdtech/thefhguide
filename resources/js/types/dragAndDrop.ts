import {UniqueIdentifier} from "@dnd-kit/core";
import {MutableRefObject} from "react";

export interface TreeItem {
  id: UniqueIdentifier;
  children: TreeItem[];
  link?: string
  collapsed?: boolean;
}

export interface FlattenedItem extends TreeItem {
  parentId: UniqueIdentifier | null;
  depth: number;
  index: number;
}

export type SensorContext = MutableRefObject<{
  items: FlattenedItem[];
  offset: number;
}>;

export enum ChoiceContentTypes {
  EXERCISES = "exercises",
  HEADER = "header",
  QUIKLINKS = "quiklinks",
  RESOURCES = "resources",
  SUMMARY = "summary",
  TEXT = "text"
}

export interface User {
  id: number
  name: string
  email: string
  email_verified_at: string
}

export interface Editor {
  id: number;
  name: string;
  email: string;
  roles: Role[];
  unpublished_assignments: Assignment[];
  unpublished_drafts: Draft[];
}

export interface Collection {
  id: number;
  name: string;
  slug: string;
  website_url: string;
  created_at: string;
  updated_at: string;
  locked: boolean;
  deleted_at: string;
  projects: Project[];
}

export interface Project {
  id: number;
  name: string;
  slug: string;
  cover_image_path: string;
  cover_image_url: string;
  instructions: string;
  created_at: string;
  updated_at: string;
  collection_id: number;
  locked: boolean;
  order: number;
  deleted_at: string;
  collection: Collection;
  goals: Goal[];
}

export interface Goal {
  id: number;
  name: string;
  slug: string;
  nav_name: string;
  section_name: string;
  summary: string;
  show_me_video_url: string;
  project_id: number;
  created_at: string;
  updated_at: string;
  locked: boolean;
  order: number;
  deleted_at: string;
  project: Project;
  choices: Choice[];
  child_drafts: Draft[];
}

export interface Choice {
  id: number;
  name: string;
  content: ChoiceContent[];
  goal_id: number;
  created_at: string;
  updated_at: string;
  locked: boolean;
  order: number;
  deleted_at: string;
  goal: Goal;
}

export interface ChoiceContent {
  data: string|Resource[];
  type: string;
}

export interface Resource {
  description: string;
  links: ResourceLink[];
}

export interface ResourceLink {
  text: string;
  link?: string;
  iframe?: string;
  type: string;
  highlights: Highlight[];
}

export interface Highlight {
  text: string;
  link: string;
}

export interface Draft {
  id: number;
  draftable_type: string;
  parentable_type: string;
  parentable_id: number;
  user_id: number;
  name: string;
  summary: string;
  image: File;
  cover_image_path: string;
  cover_image_url: string;
  show_me_video_url: string;
  content: ChoiceContent[];
  publish_date: Date;
  created_at: Date;
  updated_at: Date;
}

export interface Assignment {
  id: number;
  status: string;
  user_id: number;
  assignable_type: string;
  assignable_id: string;
  created_at: string;
  updated_at: string;
  completed_at: string;
  assignable: Goal;
}

export interface Invitation {
  id: number;
  name: string;
  email: string;
  role: string;
  admin_id: number;
  created_at: string;
  updated_at: string;
}

export interface Role {
  id: number;
  name: string;
  created_at: string;
  updated_at: string;
}

export interface NotificationActions {
  view: {
    href: string;
  };
}

export interface NotificationType {
  actions: boolean | NotificationActions;
  message: string;
  title: string;
  type: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User
  }
}

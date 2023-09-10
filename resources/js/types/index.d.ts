export interface User {
  id: number
  name: string
  email: string
  email_verified_at: string
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
}

export interface ChoiceContent {
  data: string;
  type: string;
}

export interface Draft {
  id: number;
  draftable_type: string;
  parentable_type: string;
  parentable_id: number;
  user_id: number;
  name: string;
  summary: string;
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

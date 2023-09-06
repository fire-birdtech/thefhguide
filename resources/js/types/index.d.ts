export interface User {
  id: number
  name: string
  email: string
  email_verified_at: string
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

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
  auth: {
    user: User
  }
}

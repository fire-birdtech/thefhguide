import {PropsWithChildren, type ReactElement} from "react"

export default function ArticleWrapper({ children }: PropsWithChildren): ReactElement {
  return (
    <article className="mx-auto max-w-5xl divide-y divide-gray-300 prose prose-sm prose-headings:font-display prose-headings:font-medium prose-headings:mb-2 prose-h2:mt-0 prose-h2:text-3xl prose-img:float-right prose-img:border prose-img:border-black prose-img:ml-4 prose-img:max-w-md prose-p:last:mb-0">
      {children}
    </article>
  )
}

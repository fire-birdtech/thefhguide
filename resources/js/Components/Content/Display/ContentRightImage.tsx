import {type ReactElement} from "react"

export default function ContentRightImage({ content }: { content: { type?: string, image_url?: string, title?: string, body?: string } }): ReactElement {
  return (
    <section className="py-8">
      <h2>
        {content.title}
      </h2>
    </section>
  )
}

import {type ReactElement} from "react"

export default function ContentRightImage({ content }: { content: { type?: string, image_url?: string, image_width?: string, title?: string, body?: string } }): ReactElement {
  return (
    <section className="py-8">
      <img src={content.image_url} width={content.image_width} alt="" className="mt-14"/>
      <h2>
        {content.title}
      </h2>
      <div dangerouslySetInnerHTML={{ __html: content.body }}/>
    </section>
  )
}

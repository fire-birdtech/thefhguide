import {type ReactElement} from "react"

export default function SimpleContent({ content }: { content: { title?: string, body?: string } }): ReactElement {
  return (
    <section className="py-8">
      <h2>
        {content.title}
      </h2>
      <div dangerouslySetInnerHTML={{ __html:content.body }}/>
    </section>
  )
}

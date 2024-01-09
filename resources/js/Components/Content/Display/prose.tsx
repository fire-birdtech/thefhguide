import {type PropsWithChildren} from "react";
import classNames from "@/Utils/classNames";

export default function Prose ({ className, ...props }: PropsWithChildren & { className?: string } ) {
  const headingStyles = 'prose-headings:font-display prose-headings:font-normal prose-headings:mb-2 prose-headings:leading-tight'
  const h2Styles = 'prose-h2:mt-0 prose-h2:text-[2rem]'
  const h3Styles = 'prose-h3:font-bold prose-h3:text-2xl prose-h3:font-sans prose-h3:first:mt-0'
  const h4Styles = 'prose-h4:text-2xl'
  const paragraphStyles = 'prose-p:text-base prose-p:leading-6 prose-p:font-normal prose-p:mt-0 prose-p:mb-4 last:prose-p:mb-0'
  const imageStyles = 'prose-img:border prose-img:border-black'
  const listStyles = 'prose-li:pl-0 prose-li:my-0'

  return (
    <div
      {...props}
      className={classNames(
        'prose',
        className,
        headingStyles,
        h2Styles,
        h3Styles,
        h4Styles,
        paragraphStyles,
        imageStyles,
        listStyles
      )}
    />
  )
}

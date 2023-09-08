export default function Prose({html}: { html: string }) {
  return <div className="prose prose-sm" dangerouslySetInnerHTML={{ __html: html }}/>;
}

import { type ReactElement } from 'react'
import ContentBlockHeader from '@/Components/Forms/Choices/ContentBlockHeader'
import TextEditor from '@/Components/Forms/TextEditor'

export default function Summary ({ value, remove, index, update }: {
  value: string
  index: number
  update: (index: number, value: string) => void
  remove?: (index: number) => void
}): ReactElement {
  const updateSummary = (value: string): void => {
    update(index, value)
  }

  return (
    <div className="flex flex-col">
      <ContentBlockHeader color="sky" remove={() => { remove(index) }}>
        Summary
      </ContentBlockHeader>
      <div className="w-full border-2 border-sky-200 rounded-b rounded-tr">
        <TextEditor value={value} update={updateSummary} />
      </div>
    </div>
  )
}

import { type ReactElement, useState } from 'react'
import { FilmIcon } from '@heroicons/react/24/outline'
import RemoveButton from '@/Components/Buttons/Choices/RemoveButton'
import { type Highlight } from '@/types'

export default function ResourceVideoHighlight ({ highlight, index, remove, update }: {
  highlight: Highlight
  index: number
  remove: () => void
  update: (key: number, value: Highlight) => void
}): ReactElement {
  const [currentHighlight, setCurrentHighlight] = useState({
    text: highlight.text ?? '',
    link: highlight.link ?? ''
  })

  const updateHighlight = (key: string, value: string): void => {
    const updatedHighlight = {
      ...highlight,
      [key]: value
    }
    setCurrentHighlight({
      ...updatedHighlight
    })

    update(index, updatedHighlight)
  }

  return (
    <div className="w-full flex items-center space-x-1">
      <FilmIcon className="h-5 w-5 text-purple-400" aria-hidden="true"/>
      <div className="flex items-center w-full border border-purple-200 rounded-md focus-within:border-purple-300">
        <input
          type="text"
          value={currentHighlight.text}
          onChange={(e) => {
            updateHighlight(
              'text', e.target.value
            )
          }}
          placeholder="Text"
          className="flex-1 border-none text-sm rounded-l-md focus:ring-transparent"
        />
        <input
          type="text"
          value={currentHighlight.link}
          onChange={(e) => {
            updateHighlight(
              'link', e.target.value
            )
          }}
          placeholder="Link"
          className="flex-1 border-none text-sm focus:ring-transparent"
        />
        <div className="flex items-center mx-2">
          <RemoveButton
            onClick={remove}
          />
        </div>
      </div>
    </div>
  )
}

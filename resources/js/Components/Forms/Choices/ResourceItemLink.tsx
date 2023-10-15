import { type ReactElement, useState } from 'react'
import RemoveButton from '@/Components/Buttons/Choices/RemoveButton'
import ResourceVideoHighlight from '@/Components/Forms/Choices/ResourceVideoHighlight'
import AddButton from '@/Components/Buttons/Choices/AddButton'
import { type Highlight, type ResourceLink } from '@/types'

export default function ResourceItemLink ({ index, link, remove, update }: { index: number, link: ResourceLink, remove: (key: number) => void, update: (key: number, value: ResourceLink) => void }): ReactElement {
  const [resourceLink, setResourceLink] = useState<ResourceLink>({
    text: link.text ?? '',
    link: link.link ?? '',
    type: link.type ?? 'document',
    iframe: link?.iframe ?? '',
    highlights: link?.highlights ?? []
  })

  const updateResource = (key: string, value: string | Highlight[]): void => {
    const updatedResourceLink: ResourceLink = {
      ...resourceLink,
      [key]: value
    }
    setResourceLink({
      ...updatedResourceLink
    })

    update(index, updatedResourceLink)
  }

  const addHighlight = (): void => {
    const { highlights } = resourceLink
    highlights.push({
      text: '',
      link: ''
    })

    setResourceLink({
      ...resourceLink,
      highlights
    })
  }

  const updateHighlight = (key: number, value: Highlight): void => {
    const { highlights } = resourceLink
    highlights.splice(key, 1, value)

    updateResource('highlights', highlights)
  }

  const removeHighlight = (highlightKey: number): void => {
    const { highlights } = resourceLink
    delete highlights[highlightKey]

    setResourceLink({
      ...resourceLink,
      highlights
    })
  }

  return (
    <>
      <div className="flex items-center border border-purple-200 rounded-md focus-within:border-purple-300">
        <input
          type="text"
          value={resourceLink.text}
          onChange={(e) => {
            updateResource('text', e.target.value)
          }}
          placeholder="Name"
          className="flex-1 border-none text-sm rounded-l-md focus:ring-transparent"
        />
        {resourceLink.type === 'document' && (
          <input
            type="text"
            value={resourceLink.link}
            onChange={(e) => {
              updateResource('link', e.target.value)
            }}
            placeholder="External URL"
            className="flex-1 border-none text-sm focus:ring-transparent"
          />
        )}
        {resourceLink.type === 'video' && (
          <input
            type="text"
            value={resourceLink.iframe}
            onChange={(e) => {
              updateResource('iframe', e.target.value)
            }}
            placeholder="IFrame"
            className="flex-1 border-none text-sm focus:ring-transparent"
          />
        )}
        <select
          value={resourceLink.type}
          onChange={(e) => {
            updateResource('type', e.target.value)
          }}
          className="border-none py-2 pl-3 pr-10 text-sm focus:ring-transparent"
        >
          <option value="document">Document</option>
          <option value="video">Video</option>
        </select>
        <div className="flex items-center mx-2">
          <RemoveButton
            onClick={() => { remove(index) }}
          />
        </div>
      </div>

      {resourceLink.highlights.length > 0 && (
        <div className="ml-4 space-y-1">
          {resourceLink.highlights.map((highlight, index) => (
            <ResourceVideoHighlight
              key={index}
              index={index}
              highlight={highlight}
              remove={() => {
                removeHighlight(index)
              }}
              update={(key: number, value: Highlight) => {
                updateHighlight(key, value)
              }}
            />
          ))}
        </div>
      )}

      {resourceLink.type === 'video' && (
        <div className="ml-4">
          <AddButton
            onClick={() => {
              addHighlight()
            }}
          >
            &#43; Add video highlight
          </AddButton>
        </div>
      )}
    </>
  )
}

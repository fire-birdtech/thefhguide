import { type ReactElement } from 'react'
import { type ContentImage, type GridImage, type PageContentElement } from '@/types'
import { ContentElementType } from '@/enums'
import SectionTitle from '@/Components/Content/SectionTitle'
import RightAlignedImage from '@/Components/Content/RightAlignedImage'
import Text from '@/Components/Content/Text'
import ResourceList from '@/Components/Content/Display/ResourceList'
import ImageGrid from '@/Components/Content/Display/ImageGrid'
import LeftAlignedImage from '@/Components/Content/Display/LeftAlignedImage'

export default function ContentSectionShow ({ section }: { section: PageContentElement[] }): ReactElement {
  return (
    <div className="py-8">
      {section.map((element: PageContentElement, index: number) => {
        switch (element.type) {
          case ContentElementType.IMAGE_GRID:
            return <ImageGrid key={index} images={element.data as GridImage[]}/>
          case ContentElementType.LEFT_ALIGNED_IMAGE:
            return <LeftAlignedImage image={element.data as ContentImage}/>
          case ContentElementType.RESOURCE_LIST:
            return <ResourceList key={index} resources={element.data}/>
          case ContentElementType.RIGHT_ALIGNED_IMAGE:
            return <RightAlignedImage key={index} image={element.data}/>
          case ContentElementType.TEXT:
            return <Text key={index} text={element.data}/>
          case ContentElementType.TITLE:
            return <SectionTitle key={index} title={element.data}/>
        }
      })}
    </div>
  )
}

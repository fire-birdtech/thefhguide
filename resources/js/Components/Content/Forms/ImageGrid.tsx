import {type ReactElement} from "react"
import InputLabel from "@/Components/Forms/InputLabel";
import SecondaryButtonSmall from "@/Components/Buttons/SecondaryButtonSmall";
import {GridImage} from "@/types";
import {useForm} from "@inertiajs/react";
import ImageGridItem from "@/Components/Content/Forms/ImageGridItem";

export default function ImageGrid ({ images, onChange }: { images: GridImage[], onChange: (value: any[]) => void }): ReactElement {
  const {data, setData} = useForm([
    ...images
  ])

  const addImage = () => {
    const updatedData = data
    updatedData.push({
      image_url: '',
      text: '',
      link: '',
      title: '',
      border: true
    })

    setData([...updatedData])
    onChange(updatedData)
  }

  const update = (index: number, value: GridImage) => {
    const updatedData = data
    updatedData[index] = value
    setData([...updatedData])
    onChange(updatedData)
  }

  return (
    <>
      <div>
        <InputLabel label="Image Grid"/>
        <div className="mt-1 space-y-2">
          <ul className="grid grid-cols-3 gap-3">
            {data.map((image, index) => (
              <ImageGridItem
                key={index}
                image={image}
                onChange={(value: GridImage) => {
                  update(index, value)
                }}
              />
            ))}
          </ul>
          <SecondaryButtonSmall
            onClick={() => {
              addImage()
            }}
          >
            Add image
          </SecondaryButtonSmall>
        </div>
      </div>
    </>
  )
}

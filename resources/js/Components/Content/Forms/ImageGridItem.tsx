import {type ReactElement, useEffect, useState} from "react";
import {useMediaFiles} from "@/contexts/MediaFilesContext";
import {useForm} from "@inertiajs/react";
import {GridImage} from "@/types";
import ImageGridItemModal from "@/Components/Modals/ImageGridItem";

export default function ImageGridItem ({ image, onChange }: { image: GridImage, onChange: (value: GridImage) => void }): ReactElement {
  const {data, setData} = useForm<GridImage>({
    ...image
  })

  const [open, setOpen] = useState<boolean>(false)

  const onClose = () => setOpen(false)

  const update = (value: GridImage) => {
    setData({...value})
    onChange(value)
  }

  useEffect(() => {
    if (!data.image_url) {
      setTimeout(() => {
        setOpen(true)
      }, 300)
    }
  }, []);

  const files = useMediaFiles()

  return (
    <li>
      <div className="w-full relative flex items-center space-x-3 rounded-lg border border-gray-300 bg-white p-3 shadow-sm focus-within:ring-2 focus-within:ring-blue-500/30 hover:border-gray-400">
        {data.image_url ? (
          <>
            <div className="flex-shrink-0">
              <img className="h-16 w-16 rounded object-cover" src={data.image_url} alt="" />
            </div>
            <div className="min-w-0 w-full flex-1 flex items-center overflow-hidden">
              <button className="text-left focus:outline-none" onClick={() => setOpen(true)}>
                <span className="absolute inset-0" aria-hidden="true" />
                <p className="text-xs font-medium text-gray-900">{data.title}</p>
                <p className="mt-1 text-xs text-gray-600 line-clamp-3">{data.text}</p>
              </button>
            </div>
          </>
        ) : (
          <div className="h-16 w-16 rounded bg-gray-100"/>
        )}
      </div>
      <ImageGridItemModal
        close={onClose}
        files={files}
        item={image}
        onChange={(value: GridImage) => {
          update(value)
        }}
        open={open}
      />
    </li>
  )
}

import { type ReactElement, useState } from 'react'
import { Dialog, DialogActions, DialogBody, DialogTitle } from '@/Components/Modals/dialog'
import InputLabel from '@/Components/Forms/InputLabel'
import SecondaryButtonSmall from '@/Components/Buttons/SecondaryButtonSmall'
import TextInput from '@/Components/Forms/TextInput'
import { type GridImage, type MediaFile } from '@/types'
import { useForm } from '@inertiajs/react'
import TextArea from '@/Components/Forms/TextArea'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import Checkbox from '@/Components/Forms/Checkbox'

interface ImageGridItemModalProps {
  close: () => void
  files: MediaFile[]
  item: GridImage
  onChange: (value: GridImage) => void
  open: boolean
}

export default function ImageGridItemModal ({ close, files, item, onChange, open }: ImageGridItemModalProps): ReactElement {
  const [selectImage, setSelectImage] = useState<boolean>(false)

  const { data, setData } = useForm({
    ...item
  })

  const updateImage = (url: string): void => {
    const updatedData = data
    data.image_url = url
    setData({ ...updatedData })
    onChange(updatedData)
    setSelectImage(false)
  }

  const update = (key: 'text' | 'title' | 'link' | 'border', value: string | boolean): void => {
    const updatedData = data
    console.log('modal', updatedData)
    updatedData[key] = value
    setData({ ...updatedData })
    onChange(updatedData)
  }

  return (
    <Dialog
      open={open}
      onClose={close}
      size={selectImage ? '4xl' : 'lg'}
    >
      <DialogTitle>
        Edit Image Grid Item
      </DialogTitle>
      <DialogBody className="p-6">
        {selectImage ? (
          <ul role="list" className="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            {files.map((file) => (
              <li key={file.id} className="relative">
                <div className="group aspect-h-7 aspect-w-10 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-blue-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                  <img src={file.url} alt="" className="pointer-events-none object-cover group-hover:opacity-75" />
                  <button type="button" onClick={() => { updateImage(file.url) }} className="absolute inset-0 focus:outline-none">
                    <span className="sr-only">View details for {file.name}</span>
                  </button>
                </div>
                <p className="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">{file.name}</p>
              </li>
            ))}
          </ul>
        ) : (
          <form className="space-y-3">
            <div className="space-y-1">
              <InputLabel label="Image" />
              <div className="flex gap-x-4">
                <div className="space-y-1">
                  <img src={data.image_url} alt="" className="w-48" />
                  <SecondaryButtonSmall
                    onClick={() => { setSelectImage(true) }}
                  >
                    Select image
                  </SecondaryButtonSmall>
                </div>
                <div>
                  <Checkbox
                    checked={data.border}
                    onChange={(e) => {
                      setData('border', e.target.checked)
                    }}
                  />
                  <span className="ml-2 text-sm text-gray-600">Display border around image</span>
                </div>
              </div>
            </div>

            <div>
              <InputLabel label="Title" />
              <TextInput
                value={data.title}
                onChange={(e) => {
                  update('title', e.target.value)
                }}
                className="mt-1 w-full block"
              />
            </div>

            <div>
              <InputLabel label="Text" />
              <TextArea
                value={data.text}
                onChange={(e) => {
                  update('text', e.target.value)
                }}
                className="mt-1 w-full block"
              />
            </div>

            <div>
              <InputLabel label="Link" />
              <TextInput
                value={data.link}
                onChange={(e) => {
                  update('link', e.target.value)
                }}
                className="mt-1 w-full block"
              />
            </div>
          </form>
        )}
      </DialogBody>
      <DialogActions>
        <PrimaryButton onClick={close}>
          Done
        </PrimaryButton>
      </DialogActions>
    </Dialog>
  )
}

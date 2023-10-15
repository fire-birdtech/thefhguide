import { type ChangeEvent, type ReactElement, useRef, useState } from 'react'
import InputLabel from '@/Components/Forms/InputLabel'
import classNames from '@/Utils/classNames'
import SecondaryButtonSmall from '@/Components/Buttons/SecondaryButtonSmall'
import InputError from '@/Components/Forms/InputError'

export default function AddCoverImage ({
  errorMessage,
  imagePath,
  imageUrl,
  onChange,
  name
}: {
  errorMessage: string | undefined
  imagePath: string
  imageUrl: string
  onChange: (value: File) => void
  name: string
}): ReactElement {
  const [imagePreview, setImagePreview] = useState<string>()

  const handleImageChange = (e: ChangeEvent<HTMLInputElement>): void => {
    const { files } = e.target

    if (files !== null) {
      setImagePreview(URL.createObjectURL(files[0]))
      onChange(files[0])
    }
  }

  const localRef = useRef<HTMLInputElement>(null)

  return (
    <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:py-4">
      <InputLabel label="Cover Image" className="sm:mt-px sm:pt-1"/>
      <div className="mt-1 sm:mt-0 sm:col-span-7">
        <input
          type="file"
          accept="image/*"
          className="hidden"
          onChange={(e) => { handleImageChange(e) }}
          ref={localRef}
        />

        {imagePreview !== undefined && (
          <span
            className="block w-full h-72 rounded-lg bg-cover bg-no-repeat bg-center"
            style={{
              backgroundSize: 'cover',
              backgroundRepeat: 'no-repeat',
              backgroundPosition: 'center center',
              backgroundImage: `url('${imagePreview}')`
            }}
          />
        )}
        {imagePath !== undefined && (
          <img
            src={imageUrl}
            alt={name}
            className="block w-full h-72 rounded-lg bg-cover bg-no-repeat bg-center object-cover pointer-events-none"
          />
        )}
        <div className={classNames(
          imagePath !== undefined || imagePreview !== undefined ? 'mt-3' : 'mt-0',
          'space-x-4'
        )}>
          <SecondaryButtonSmall onClick={() => localRef.current?.click()}>
            Select a new cover image
          </SecondaryButtonSmall>
        </div>
        <InputError message={errorMessage} className="mt-1"/>
      </div>
    </div>
  )
}

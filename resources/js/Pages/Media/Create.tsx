import {ChangeEvent, type ReactElement} from "react"
import {type PageProps} from "@/types"
import {Head, useForm} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";
import InputError from "@/Components/Forms/InputError";
import FileInput from "@/Components/Forms/FileInput";

export default function MediaCreate ({ auth }: PageProps): ReactElement {
  const {data, setData, errors, processing} = useForm({
    name: '',
    file: {},
  });

  const handleFileChange = (e: ChangeEvent<HTMLInputElement>) => {
    const { files } = e.target

    if (files !== null) {
      setData('file', files[0])
    }
  }

  return (
    <>
      <Head title="Add Media"/>

      <Admin user={auth.user}>
        <Container>
          <div className="flex items-center justify-between flex-wrap sm:flex-nowrap">
            <Header3>
              Add Media
            </Header3>
            <PrimaryButton disabled={processing}>
              Save
            </PrimaryButton>
          </div>

          <div className="mt-4 bg-white rounded-md shadow">
            <form className="sm:divide-y sm:divide-gray-200">
              <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Name" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-7">
                  <TextInput
                    value={data.name}
                    className="block w-full"
                    isFocused={true}
                    onChange={(e) => {
                      setData('name', e.target.value)
                    }}
                  />
                  <InputError message={errors.name}/>
                </div>
              </div>

              <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Image" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-7">
                  <FileInput
                    className="block w-full"
                    onChange={(e) => {
                      handleFileChange(e)
                    }}
                  />
                  <InputError message={errors.file}/>
                </div>
              </div>
            </form>
          </div>
        </Container>
      </Admin>
    </>
  )
}

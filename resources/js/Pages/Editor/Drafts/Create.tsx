import {PageProps} from "@/types";
import {Head, useForm} from "@inertiajs/react";
import {FormEventHandler} from "react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import TextInputCombined from "@/Components/Forms/TextInputCombined";
import AddCoverImage from "@/Components/Forms/AddCoverImage";
import TextEditor from "@/Components/Forms/TextEditor";

export default function ({auth, parent_id, type}: PageProps<{ parent_id: number, type: string }>) {
  const {data, setData, post, errors, reset, processing} = useForm({
    type,
    parent_id,
    name: '',
    image: null,
    summary: null,
    show_me_video_url: null,
    content: null,
  });

  const updateCover = (value: File) => {
    setData('image', value);
  };

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route('editor.drafts.store'));
  }

  return (
    <>
      <Head title="Create Draft"/>

      <Admin user={auth.user}>
        <Container>
          <form onSubmit={submit}>
            <div className="flex items-center justify-between flex-wrap sm:flex-nowrap">
              <Header3>
                Create Draft
              </Header3>
              <PrimaryButton>
                Save
              </PrimaryButton>
            </div>

            <div className="mt-4 bg-white rounded-md shadow">
              <div className="sm:divide-y sm:divide-gray-200">
                <TextInputCombined
                  label="Name"
                  value={data.name}
                  onChange={(e) => setData('name', e.target.value)}
                  message={errors.name}
                />

                {type === 'project' ? (
                  <AddCoverImage
                    name={data.name}
                    errorMessage={errors.image}
                    imagePath={data?.cover_image_path}
                    imageUrl={data?.cover_image_url}
                    onChange={(value) => updateCover(value)}
                  />
                ) : null}

                {type === 'goal' ? (
                  <>
                    <TextEditor/>
                    <TextInputCombined
                      label={`"Show Me" Video`}
                      value={data.show_me_video_url}
                      message={errors.show_me_video_url}
                    />
                  </>
                ) : null}

                {type === 'choice' ? (

                )}
              </div>
            </div>
          </form>
        </Container>
      </Admin>
    </>
  );
}

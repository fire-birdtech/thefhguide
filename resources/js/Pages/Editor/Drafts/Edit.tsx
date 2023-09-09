import {type Draft, type PageProps} from "@/types";
import {Head, useForm} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import PrimaryButtonWithDropDown from "@/Components/Buttons/PrimaryButtonWithDropdown";
import InputLabel from "@/Components/Forms/InputLabel";
import TextInput from "@/Components/Forms/TextInput";
import InputError from "@/Components/Forms/InputError";
import AddCoverImage from "@/Components/Forms/AddCoverImage";
import {useState} from "react";
import PublishModal from "@/Components/Modals/Publish";
import {Dialog} from "@headlessui/react";

export default function DraftEdit({ auth, draft, userCanPublish }: PageProps<{ draft: Draft, userCanPublish: boolean }>) {
  const [confirmDraftPublish, setConfirmDraftPublish] = useState(false);

  const {data, setData, errors, put, processing} = useForm({
    name: draft.name,
    cover_image_path: draft.cover_image_path,
    summary: draft.summary,
    show_me_video_url: draft.show_me_video_url
  });

  const updateCover = (value: File) => {
    setData('cover_image_path', value);
  };

  const save = (): void => {
    put(route('editor.drafts.update', [draft.id]));
  }
  const publish = (): void => {
    put(route('editor.drafts.publish', [draft.id]));
  }
  const notify = (): void => {
    put(route('editor.drafts.notify', [draft.id]));
  }

  const options = [
    { name: 'Publish Draft', icon: 'ArrowUpTrayIcon', show: userCanPublish, emit: () => setConfirmDraftPublish(true) },
    { name: 'Ready for Publish', icon: 'BellAlertIcon', show: !userCanPublish, emit: () => notify() }
  ];

  return (
    <>
      <Head title="Edit Draft"/>

      <Admin user={auth.user}>
        <Container>
          <div className="flex items-center justify-between flex-wrap sm:flex-nowrap">
            <Header3>
              Edit Draft: {draft.name}
            </Header3>
            <div className="space-x-2">
              <PrimaryButtonWithDropDown
                action="Save Draft"
                save={save}
                options={options}
              />
            </div>
          </div>

          <div className="mt-4 bg-white rounded-md shadow">
            <form className="sm:divide-y sm:divide-gray-200">
              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Draft name" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-4">
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

              {draft.draftable_type === 'project' ? (
                <AddCoverImage
                  name={data.cover_image_path}
                  errorMessage={errors.cover_image_path}
                  imagePath={draft.cover_image_path}
                  imageUrl={draft.cover_image_url}
                  onChange={(value) => updateCover(value)}
                />
              ) : null}

              {draft.draftable_type === 'goal' ? (
                // TextEditor

                <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                  <InputLabel label={`"Show Me" Video`} className="sm:mt-px sm:pt-2"/>
                  <div className="mt-1 sm:mt-0 sm:col-span-4">
                    <TextInput
                      value={data.show_me_video_url}
                      className="block w-full"
                      onChange={(e) => {
                        setData('show_me_video_url', e.target.value)
                      }}
                    />
                    <InputError message={errors.show_me_video_url}/>
                  </div>
                </div>
              ) : null}

              {draft.draftable_type === 'choice' ? (
                "add choice content"
              ) : null}
            </form>
          </div>
        </Container>
      </Admin>

      <PublishModal open={confirmDraftPublish} setOpen={setConfirmDraftPublish} publish={publish}>
        <Dialog.Title as="h3" className="text-lg leading-6 font-medium text-gray-900">
          Publish Draft
        </Dialog.Title>
        <div className="mt-2">
          <p className="text-sm text-gray-500">
            Hooray! You&apos;re ready to publish this draft. Please click
            the publish button to confirm this action.
          </p>
        </div>
      </PublishModal>
    </>
  );
}

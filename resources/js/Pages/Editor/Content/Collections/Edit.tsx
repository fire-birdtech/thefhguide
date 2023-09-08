import {Head, useForm} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import TextInputCombined from "@/Components/Forms/TextInputCombined";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";
import {FormEventHandler} from "react";

export default function CollectionEdit({ auth, collection }) {
  const { data, setData, put, processing, errors, reset } = useForm({
    ...collection,
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    put(route('editor.collections.update', [collection.id]));
  }

  return (
    <>
      <Head title={`Admin - Edit ${collection.name}`}/>

      <Admin user={auth.user}>
        <Container>
          <Header3>
            Edit Collection: {collection.name}
          </Header3>
          <div className="mt-4 bg-white shadow overflow-hidden sm:rounded-lg">
            <form onSubmit={submit} className="sm:divide-y sm:divide-gray-200">
              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-starts sm:border-t sm:border-gray-200 sm:py-4">
                <TextInputCombined
                  label="Collection name"
                  value={data.name}
                  className="mt-1 block w-full"
                  onChange={(e) => setData('name', e.target.value)}
              </div>
              <div className="px-6 py-4 sm:border-t sm:border-gray-200">
                <div className="flex justify-end space-x-3">
                  <SecondaryButton href={route('editor.collections.show', [collection.id])}>
                    Cancel
                  </SecondaryButton>
                  <PrimaryButton type="submit">
                    Save
                  </PrimaryButton>
                </div>
              </div>
            </form>
          </div>
        </Container>
      </Admin>
    </>
  );
}

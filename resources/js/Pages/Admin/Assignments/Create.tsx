import {FormEventHandler, Fragment, type ReactElement} from "react";
import {type Goal, type PageProps, type User} from "@/types";
import {Head, useForm} from "@inertiajs/react";
import Admin from "@/Layouts/Admin";
import Container from "@/Components/Container";
import {Header3} from "@/Components/Typography/Headers";
import {Listbox, Transition} from "@headlessui/react";
import {CheckIcon, ChevronUpDownIcon} from "@heroicons/react/24/solid";
import classNames from "@/Utils/classNames";
import InputError from "@/Components/Forms/InputError";
import InputLabel from "@/Components/Forms/InputLabel";
import FormText from "@/Components/Forms/FormText";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";

export default function AssignmentCreate({ auth, assignable, assignableType, editors }: PageProps<{
  assignable: Goal;
  assignableType: string;
  editors: User[];
}>): ReactElement {
  const {data, setData, post, errors} = useForm({
    editor: null,
    assignable_id: assignable.id,
    assignable_type: assignableType,
  });

  const submit: FormEventHandler = (e) => {
    e.preventDefault();

    post(route(`editor.${assignableType}s.show`, assignable.id));
  }

  return (
    <>
      <Head title="Create Assignment"/>

      <Admin user={auth.user}>
        <Container>
          <Header3>
            Create Assignment
          </Header3>
          <div className="mt-4 bg-white shadow sm:rounded-lg">
            <form onSubmit={submit} className="sm:divide-y sm:divide-gray-200">
              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <Listbox value={data.editor} onChange={(value) => setData('editor', value)}>
                  {({open}) => (
                    <>
                      <Listbox.Label className="block text-sm font-medium leading-6 text-gray-700 sm:mt-px sm:pt-1.5">
                        Editor
                      </Listbox.Label>
                      <div className="relative mt-1 sm:mt-0 sm:col-span-2">
                        <Listbox.Button className="relative w-full bg-white border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                          {data.editor !== null ? (
                            <span className="block truncate">
                              {data.editor.name}
                            </span>
                          ) : (
                            <span className="block truncate text-gray-500">
                              Select an editor for this assignment
                            </span>
                          )}
                          <span className="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <ChevronUpDownIcon className="h-5 w-5 text-gray-400"/>
                          </span>
                        </Listbox.Button>

                        <Transition
                          show={open}
                          as={Fragment}
                          leave="transition ease-in duration-100"
                          leaveFrom="opacity-100"
                          leaveTo="opacity-0"
                        >
                          <Listbox.Options className="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
                            {editors.map((editor) => (
                              <Listbox.Option
                                key={editor.id}
                                className={({ active }) =>
                                  classNames(
                                    active ? 'bg-blue-600 text-white' : 'text-gray-900',
                                    'relative cursor-default select-none py-2 pl-3 pr-9'
                                  )
                                }
                                value={editor}
                              >
                                {({active, selected}) => (
                                  <>
                                    <span className={classNames(selected ? 'font-semibold' : 'font-normal', 'block truncate')}>
                                      {editor.name}
                                    </span>

                                    {selected ? (
                                      <span
                                        className={classNames(
                                          active ? 'text-white' : 'text-blue-600',
                                          'absolute inset-y-0 right-0 flex items-center pr-4'
                                        )}
                                      >
                                        <CheckIcon className="h-5 w-5" aria-hidden="true" />
                                      </span>
                                    ) : null}
                                  </>
                                )}
                              </Listbox.Option>
                            ))}
                          </Listbox.Options>
                        </Transition>
                      </div>
                    </>
                  )}
                </Listbox>
                <InputError message={errors.editor} className="mt-1"/>
              </div>

              <div className="px-6 sm:grid sm:grid-cols-5 sm:gap-4 sm:items-start sm:py-4">
                <InputLabel label="Belongs to" className="sm:mt-px sm:pt-2"/>
                <div className="mt-1 sm:mt-0 sm:col-span-4">
                  <FormText value={assignable.name} className="block w-full"/>
                </div>
              </div>

              <div className="px-6 py-4">
                <div className="flex justify-end">
                  <SecondaryButton href={route(`editor.${assignableType}s.show`, assignable.id)}>
                    Cancel
                  </SecondaryButton>
                  <PrimaryButton type="submit" className="ml-3">
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

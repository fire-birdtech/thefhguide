import {FormEventHandler, useRef, useState} from "react";
import {router, useForm} from "@inertiajs/react";
import {Header3} from "@/Components/Typography/Headers";
import {Paragraph} from "@/Components/Typography/Paragraphs";
import DangerButton from "@/Components/Buttons/DangerButton";
import DangerModal from "@/Components/Modals/DangerModal.vue";
import TextInput from "@/Components/Forms/TextInput";
import SecondaryButton from "@/Components/Buttons/SecondaryButton";
import {User} from "@/types";

export default function DeleteAccount({ hasRoles, user }: { hasRoles: boolean, user: User }) {
    const [confirmingUserDeletion, setConfirmingUserDeletion] = useState(false)
    const passwordInput = useRef<HTMLInputElement>()

    const {
        data,
        setData,
        delete: destroy,
        processing,
        reset,
        errors
    } = useForm({
        password: ''
    })

    const confirmUserDeletion = (): void => {
        setConfirmingUserDeletion(true)
    }

    const deleteUser: FormEventHandler = (e) => {
        e.preventDefault()

        destroy(route('profile.destroy'), {
            preserveScroll: true,
            onSuccess: () => { closeModal() },
            onError: () => passwordInput.current?.focus(),
            onFinish: () => { reset() }
        })
    }

    const closeModal = (): void => {
        setConfirmingUserDeletion(false)

        reset()
    }

    return (
        <>
            <div className="space-y-6 sm:space-y-5">
                <div>
                    <Header3>
                        Delete Account
                    </Header3>
                </div>
                <div className="pt-4 border-t border-gray-200">
                    <div className="max-w-md space-y-6 sm:space-y-5">
                        {hasRoles ? (
                            <div className="space-y-2">
                                <Paragraph>
                                    Your account currently has a role in the CMS.
                                </Paragraph>
                                <Paragraph>
                                    You must have the role removed before you can delete your account.
                                </Paragraph>
                            </div>
                        ) : null}
                        <DangerButton onClick={confirmUserDeletion} disabled={hasRoles}>
                            Delete account
                        </DangerButton>
                    </div>
                </div>
            </div>

            {/*<DangerModal show={confirmingUserDeletion} onClose={closeModal}>*/}
            {/*    <form onSubmit={deleteUser} className="p-6">*/}
            {/*        <h2 className="text-lg font-medium text-gray-900">*/}
            {/*            Are you sure you want to delete your account?*/}
            {/*        </h2>*/}

            {/*        <p className="mt-1 text-sm text-gray-600">*/}
            {/*            Once your account is deleted, all of its resources and data will be permanently deleted. Please*/}
            {/*            enter your password to confirm you would like to permanently delete your account.*/}
            {/*        </p>*/}

            {/*        <div className="mt-6">*/}
            {/*            <TextInput*/}
            {/*                label="Password"*/}
            {/*                type="password"*/}
            {/*                ref={passwordInput}*/}
            {/*                value={data.password}*/}
            {/*                onChange={(e) => { setData('password', e.target.value) }}*/}
            {/*                className="mt-1 block w-3/4"*/}
            {/*                isFocused*/}
            {/*                placeholder="Password"*/}
            {/*                message={errors.password}*/}
            {/*            />*/}
            {/*        </div>*/}

            {/*        <div className="mt-6 flex justify-end">*/}
            {/*            <SecondaryButton onClick={closeModal}>Cancel</SecondaryButton>*/}

            {/*            <DangerButton className="ml-3" disabled={processing}>*/}
            {/*                Delete Account*/}
            {/*            </DangerButton>*/}
            {/*        </div>*/}
            {/*    </form>*/}
            {/*</DangerModal>*/}
        </>
    );
}

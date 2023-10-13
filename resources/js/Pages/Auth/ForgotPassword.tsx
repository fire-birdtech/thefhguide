import { type FormEventHandler } from 'react';
import { Head, useForm } from '@inertiajs/react';
import Guest from '@/Layouts/Guest';
import PrimaryButton from '@/Components/Buttons/PrimaryButton';
import TextInput from '@/Components/Forms/TextInputCombined';

export default function ForgotPassword ({ status }: { status?: string }) {
    const { data, setData, post, processing, errors } = useForm({
        email: ''
    })

    const submit: FormEventHandler = (e) => {
        e.preventDefault()

        post(route('password.email'))
    }

    return (
        <Guest>
            <Head title="Forgot Password"/>

            <div className="mb-4 text-sm text-gray-600">
                Forgot your password? No problem. Just let us know your email address and we will email you a password
                reset link that will allow you to choose a new one.
            </div>

            {status !== null && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <form onSubmit={submit}>
                <TextInput
                    label="Email"
                    type="email"
                    value={data.email}
                    className="mt-1 block w-full"
                    isFocused={true}
                    message={errors.email}
                    onChange={(e) => {
                        setData('email', e.target.value)
                    }}
                />

                <div className="flex items-center justify-end mt-4">
                    <PrimaryButton className="ml-4" disabled={processing}>
                        Email Password Reset Link
                    </PrimaryButton>
                </div>
            </form>
        </Guest>
    )
}

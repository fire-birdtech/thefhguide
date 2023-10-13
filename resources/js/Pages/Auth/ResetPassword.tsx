import { useEffect, type FormEventHandler} from 'react'
import { Head, useForm } from '@inertiajs/react'
import Guest from '@/Layouts/Guest'
import PrimaryButton from '@/Components/Buttons/PrimaryButton'
import TextInput from '@/Components/Forms/TextInputCombined'

export default function ResetPassword ({ token, email }: { token: string, email: string }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        token,
        email,
        password: '',
        password_confirmation: ''
    })

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation')
        }
    }, [])

    const submit: FormEventHandler = (e) => {
        e.preventDefault()

        post(route('password.store'))
    }

    return (
        <Guest>
            <Head title="Reset Password"/>

            <form className="space-y-4" onSubmit={submit}>
                <TextInput
                    label="Email"
                    type="email"
                    value={data.email}
                    className="mt-1 block w-full"
                    onChange={(e) => {
                        setData('email', e.target.value)
                    }}
                />

                <TextInput
                    label="Password"
                    type="password"
                    value={data.password}
                    className="mt-1 block w-full"
                    isFocused={true}
                    onChange={(e) => {
                        setData('password', e.target.value)
                    }}
                />

                <TextInput
                    label="Confirm Password"
                    type="password"
                    value={data.password_confirmation}
                    className="mt-1 block w-full"
                    onChange={(e) => {
                        setData('password_confirmation', e.target.value)
                    }}
                />

                <div className="flex items-center justify-end mt-4">
                    <PrimaryButton className="ml-4" disabled={processing}>
                        Reset Password
                    </PrimaryButton>
                </div>
            </form>
        </Guest>
    )
}

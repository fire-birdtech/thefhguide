import { useEffect, type FormEventHandler, type ReactElement } from 'react';
import { Head, Link, useForm } from '@inertiajs/react';
import Guest from "@/Layouts/Guest";
import TextInput from "@/Components/Forms/TextInputCombined";
import PrimaryButton from "@/Components/Buttons/PrimaryButton";

export default function Register () {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation')
        }
    }, []);

    const submit: FormEventHandler = (e) => {
        e.preventDefault()

        post(route('register'))
    };

    return (
        <Guest>
            <Head title="Register"/>

            <form className="space-y-4" onSubmit={submit}>
                <TextInput
                    label="Name"
                    value={data.name}
                    className="mt-1 block w-full"
                    isFocused={true}
                    message={errors.name}
                    onChange={(e) => {
                        setData('name', e.target.value)
                    }}
                    required
                />

                <TextInput
                    label="Email"
                    type="email"
                    value={data.email}
                    className="mt-1 block w-full"
                    message={errors.email}
                    onChange={(e) => {
                        setData('email', e.target.value)
                    }}
                    required
                />

                <TextInput
                    label="Password"
                    type="password"
                    value={data.password}
                    className="mt-1 block w-full"
                    onChange={(e) => {
                        setData('password', e.target.value)
                    }}
                    required
                />

                <TextInput
                    label="Confirm Password"
                    type="password"
                    value={data.password_confirmation}
                    className="mt-1 block w-full"
                    onChange={(e) => {
                        setData('password_confirmation', e.target.value)
                    }}
                    required
                />

                <div className="flex items-center justify-end mt-4">
                    <Link
                        href={route('login')}
                        className="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton className="ml-4" disabled={processing}>
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </Guest>
    );
}

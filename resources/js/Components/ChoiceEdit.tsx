import {useForm} from "@inertiajs/react";
import {FormEventHandler} from "react";
import TextInput from "@/Components/Forms/TextInputCombined";
import InputLabel from "@/Components/Forms/InputLabel";

export default function ChoiceEdit({ choice }) {
    const {data, setData, errors, put, reset, processing} = useForm({
        ...choice,
    });

    const submit = (e): FormEventHandler => {
        e.preventDefault();
    }

    return (
        <div className="border-t border-gray-200">
            <form onSubmit={submit} className="sm:divide-y sm:divide-gray-200">
                <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                    <TextInput
                        label="Name"
                        value={data.name}
                        className="mt-1 block w-full"
                        isFocused
                        message={errors.name}
                        onChange={(e) => setData('name', e.target.value)}
                    />
                </div>
                <div className="px-6 sm:grid sm:grid-cols-8 sm:gap-4 sm:items-start sm:py-4">
                    <InputLabel label="Content" className="sm:mt-px sm:pt-2"/>
                    <div className="mt-1 space-y-4 sm:mt-0 sm:col-span-7">
                        {choice.content.map((item, idx) => (
                            {item.type === 'summary' && }
                        ))}
                    </div>
                </div>
            </form>
        </div>
    );
}

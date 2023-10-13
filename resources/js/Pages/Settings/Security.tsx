import {Head} from "@inertiajs/react";
import UpdatePassword from "@/Components/Forms/UpdatePassword";
import Authenticated from "@/Layouts/Authenticated";
import Settings from "@/Layouts/Settings";
import {PageProps} from "@/types";

export default function SecurityPage({ auth }: PageProps) {
    return (
        <>
            <Head title="Security"/>

            <Authenticated user={auth.user}>
                <Settings>
                    <UpdatePassword/>
                </Settings>
            </Authenticated>
        </>
    );
}

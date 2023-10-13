import {Head} from "@inertiajs/react";
import Authenticated from "@/Layouts/Authenticated";
import Settings from "@/Layouts/Settings";
import UpdateProfile from "@/Components/Forms/UpdateProfile";
import {PageProps} from "@/types";

export default function Profile({ auth }: PageProps) {
    return (
        <>
            <Head title="Profile"/>

            <Authenticated user={auth.user}>
                <Settings>
                    <UpdateProfile user={auth.user}/>
                </Settings>
            </Authenticated>
        </>
    );
}

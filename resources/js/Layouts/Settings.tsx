import {PropsWithChildren} from "react";
import SettingsNav from "@/Components/Navigation/Settings";

export default function Settings({ children }: PropsWithChildren) {
    return (
        <div className="py-12">
            <div className="max-w-7xl mx-auto flex sm:px-6 lg:px-8">
                <SettingsNav/>
                <div className="flex flex-1 flex-col">
                    <div className="flex-1 pl-8">
                        {children}
                    </div>
                </div>
            </div>
        </div>
    );
}

import {PropsWithChildren} from "react";

export default function Table({ children, className = '' }: PropsWithChildren<{ className: string }>) {
    return (
        <div className={`flex flex-col ${className}`}>
            <div className="inline-block min-w-full py-2 align-middle">
                <div className="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table className="min-w-full divide-y divide-gray-300">
                        {children}
                    </table>
                </div>
            </div>
        </div>
    );
}

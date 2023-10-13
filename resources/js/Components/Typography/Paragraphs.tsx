import {PropsWithChildren} from "react";

export function Paragraph({ children, className = '' }: PropsWithChildren<{ className: string }>) {
    return (
        <p className={`text-sm text-gray-500 ${className}`}>
            {children}
        </p>
    );
}

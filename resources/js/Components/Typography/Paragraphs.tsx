import {PropsWithChildren} from "react";

export function Paragraph({ children, className = '' }: PropsWithChildren) {
    return (
        <p className={`text-sm text-gray-500 ${className}`}>
            {children}
        </p>
    );
}

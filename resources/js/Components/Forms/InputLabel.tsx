export default function ({ className, label, optional }) {
    return (
        <label className={`block font-medium text-sm text-gray-700 ${className}`}>
            {label}
            {optional ? (
                <span className="mt-2 block text-xs font-medium uppercase text-gray-500">
                    Optional
                </span>
            ) : null}
        </label>
    );
}

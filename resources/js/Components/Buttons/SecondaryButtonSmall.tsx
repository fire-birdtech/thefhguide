import {Link} from "@inertiajs/react";
import {PropsWithChildren} from "react";
import classNames from "@/Utils/classNames";

export default function SecondaryButtonSmall({ children, onClick, className = '', href = '', type = 'button' }: PropsWithChildren<{
  className?: string,
  href?: string,
  type?: "button" | "submit" | "reset" | undefined,
  onClick: () => void
}>) {
  const styles = classNames(
    'relative inline-flex bg-white px-2.5 py-1.5 border border-gray-300 rounded-md shadow-sm text-xs font-medium text-gray-700 hover:bg-gray-50 focus:ring focus:ring-gray-300 focus:ring-opacity-40 sm:w-auto',
    className,
  );

  return href ? (
    <Link href={href} className={styles}>
      {children}
    </Link>
  ) : (
    <button type={type} className={styles} onClick={onClick}>
      {children}
    </button>
  );
}

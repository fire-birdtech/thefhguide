import {Link, usePage} from "@inertiajs/react";
import classNames from "@/Utils/classNames";

export default function AdminNavigation() {
    const { component } = usePage();
    const navigation = [
        { name: 'Dashboard', href: '#', show: true, components: ['Admin/Dashboard','Editor/Dashboard'] },
        { name: 'Content', href: '#', show: true, components: ['Editor/Content/*'] },
        { name: 'Assignments', href: '#', show: true, components: ['Admin/Assignments/*','Editor/Assignments/*'] },
        { name: 'Admins & Editors', href: '#', show: true, components: ['Admin/Editors/*'] },
    ];

    return (
        <aside className="hidden lg:flex lg:flex-shrink-0">
            <div className="flex flex-col w-64">
                <div className="flex-1 flex flex-col min-h-0">
                    <div className="flex-1 flex flex-col py-8 overflow-y-auto">
                        <nav className="space-y-2 px-4" aria-label="Sidebar">
                            {navigation.map((item, index) => (
                                <Link
                                    key={index}
                                    href={item.href}
                                    className={classNames(
                                        item.components.includes(component) ? 'bg-gray-200 text-gray-900 font-semibold' : 'text-gray-600 hover:bg-gray-200 hover:text-gray-900',
                                        'group flex items-center px-3 py-2 text-sm font-medium rounded-md'
                                    )}
                                >
                                    {item.name}
                                </Link>
                            ))}
                        </nav>
                    </div>
                </div>
            </div>
        </aside>
    );
}

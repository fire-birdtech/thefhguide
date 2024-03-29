import './bootstrap'
import '../css/app.css'

import { createRoot } from 'react-dom/client'
import { createInertiaApp } from '@inertiajs/react'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

const appName = import.meta.env.VITE_APP_NAME ?? 'The Family History Guide'

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: async (name) => await resolvePageComponent(`./Pages/${name}.tsx`, import.meta.glob('./Pages/**/*.tsx')),
  setup ({ el, App, props }) {
    const root = createRoot(el)

    // eslint-disable-next-line react/react-in-jsx-scope
    root.render(<App {...props} />)
  },
  progress: {
    color: '#4B5563'
  }
}).catch(err => { console.log(err) })

import ReactDOMServer from 'react-dom/server'
import { createInertiaApp } from '@inertiajs/react'
import createServer from '@inertiajs/react/server'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { route, type RouteParams } from 'ziggy-js'

const appName = import.meta.env.VITE_APP_NAME ?? 'The Family History Guide'

createServer(async (page) =>
  await createInertiaApp({
    page,
    render: ReactDOMServer.renderToString,
    title: (title) => `${title} - ${appName}`,
    resolve: async (name) => await resolvePageComponent(`./Pages/${name}.tsx`, import.meta.glob('./Pages/**/*.tsx')),
    setup: ({ App, props }) => {
      global.route = (name: any, params: RouteParams<any> | undefined, absolute: boolean | undefined) =>
        route(name, params, absolute, {
          // @ts-expect-error: Useless description
          ...page.props.ziggy,
          // @ts-expect-error: Useless description
          location: new URL(page.props.ziggy.location)
        })

      return <App {...props} />
    }
  })
)

import { type AxiosInstance } from 'axios'
import type ziggyRoute from 'ziggy-js'

declare global {
  interface Window {
    axios: AxiosInstance
  }

  const route: typeof ziggyRoute
}

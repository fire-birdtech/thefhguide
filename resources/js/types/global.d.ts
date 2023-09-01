import { type AxiosInstance } from 'axios'
import { type Config as ZiggyConfig } from 'ziggy-js'
import type ziggyRoute from 'ziggy-js'

declare global {
  interface Window {
    axios: AxiosInstance
  }

  const route: typeof ziggyRoute
  const Ziggy: ZiggyConfig
}

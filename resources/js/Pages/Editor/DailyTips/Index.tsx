import { type ReactElement } from 'react'
import Admin from '@/Layouts/Admin'
import { type DailyTip, type PageProps } from '@/types'
import { Head } from '@inertiajs/react'
import { Heading } from '@/Components/Typography/Headers'
import CreateTip from '@/Pages/Editor/DailyTips/partials/create-tip'
import TipList from '@/Pages/Editor/DailyTips/partials/tip-list'

type Props = {
  tips: DailyTip[]
} & PageProps

export default function DailyTips ({ auth, tips }: Props): ReactElement {
  return (
    <Admin user={auth.user}>
      <Head title="Editor - Daily Tips"/>

      <div className="w-full py-8 px-4 sm:px-6 lg:px-8">
        <Heading level={3} fontFamily="sans">
          Daily Tips
        </Heading>

        <div className="mt-4">
          <CreateTip />
        </div>

        <div className="mt-6">
          <TipList tips={tips} />
        </div>
      </div>
    </Admin>
  )
}

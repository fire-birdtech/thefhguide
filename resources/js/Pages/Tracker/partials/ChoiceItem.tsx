import { type Choice } from '@/types'
import { type ReactElement, useEffect, useRef } from 'react'
import { listStyleAlpha } from '@/Utils/string'
import { useForm } from '@inertiajs/react'

const TrackerStatus = ['Not Started', 'Started', 'Good', 'Proficient']

export default function ChoiceItem ({ choice }: { choice: Choice }): ReactElement {
  const { data, setData, post } = useForm({
    choice_id: choice.id,
    notes: choice?.users[0]?.pivot?.notes ?? '',
    status: choice?.users[0]?.pivot?.status ?? 0
  })

  const submit = (): void => {
    post(route('tracker.store'), {
      preserveScroll: true,
      preserveState: true
    })
  }

  const isFirstRun = useRef(true)

  useEffect(() => {
    if (!isFirstRun.current) {
      submit()
    } else {
      isFirstRun.current = false
    }
  }, [data])

  return (
    <div className="grid grid-cols-10 items-center gap-x-4">
      <div className="col-span-3">
        {`${listStyleAlpha[choice.order - 1]}: ${choice.name}`}
      </div>
      <div className="col-span-3">
        <textarea
          className="w-full rounded-sm"
          rows={3}
          value={data.notes}
          onChange={(event) => {
            setData('notes', event.target.value)
          }}
        ></textarea>
      </div>
      <div className="col-span-3">
        <div className="flex items-center">
          <div>
            <input
              type="range"
              min={0}
              max={3}
              value={data.status}
              onChange={(event) => {
                setData('status', event.target.value)
              }}
            />
            <div className="flex justify-between px-1">
              <span>0</span>
              <span>1</span>
              <span>2</span>
              <span>3</span>
            </div>
          </div>
          <div className="ml-8">
            {TrackerStatus[data.status]}
          </div>
        </div>
      </div>
      <div>
        {choice?.users[0]?.pivot?.updated_at}
      </div>
    </div>
  )
}

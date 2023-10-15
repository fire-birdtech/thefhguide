import { type ReactElement, useState } from 'react'
import AddButton from '@/Components/Buttons/Choices/AddButton'
import { type Resource } from '@/types'
import CreateEditResourceForm from '@/Components/Forms/Choices/CreateEditResourceForm'
import { Header5 } from '@/Components/Typography/Headers'

export default function AddResourceItem ({ add }: {
  add: (resource: Resource) => void
}): ReactElement {
  const [displayAddResourceForm, setDisplayAddResourceForm] = useState(false)

  return displayAddResourceForm ? <>
    <Header5>
      Add a new resource
    </Header5>
    <CreateEditResourceForm usage="create" save={add} setDisplay={() => { setDisplayAddResourceForm(false) }}/>
  </> : (
    <AddButton onClick={() => { setDisplayAddResourceForm(true) }}>
      + New resource
    </AddButton>
  )
}

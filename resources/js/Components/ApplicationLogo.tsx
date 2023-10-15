import { type ReactElement } from 'react'
import logo from '../../logo-long.png'
import classNames from '@/Utils/classNames'

export default function ApplicationLogo ({ className }: { className: string }): ReactElement {
  return <img className={classNames('h-10 w-auto', className)} src={logo} alt="The Family History Guide Logo"/>
}

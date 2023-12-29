type Class = string | undefined

export default function classNames (...classes: Class[]): string {
  return classes.filter(Boolean).join(' ')
}

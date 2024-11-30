import { type ReactElement } from 'react'
import { type DailyTip } from '@/types'
import { Heading } from '@/Components/Typography/Headers'

export default function TipList ({ tips }: { tips: DailyTip[] }): ReactElement {
  console.log(tips)
  return (
    <div className="mt-8">
      <Heading level={4}>
        Recent Daily Tips
      </Heading>
      <dl className="mt-3 space-y-4">
        {tips.map(tip => (
          <div key={tip.id}>
            <dt className="flex items-start space-x-3">
              <span className="font-medium">{tip.title}</span>
              <span className="italic">{new Date(tip.created_at).toLocaleDateString('en-us', { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' })}</span>
            </dt>
            <dd className="mt-1">
              <div dangerouslySetInnerHTML={{ __html: tip.body }}/>
            </dd>
          </div>
        ))}
      </dl>
    </div>
  )
}

// export default function TipList ({ years }: { years: any[] }): ReactElement {
//   return (
//     <dl>
//       {Object.entries(years).map((months, index) => (
//         <Disclosure key={index}>
//           <dt>
//             <DisclosureButton className="group flex w-full items-start">
//               <span className="mr-2 flex h-7 items-center">
//                 <ChevronRightIcon aria-hidden="true" className="size-4 group-data-[open]:hidden" />
//                 <ChevronDownIcon aria-hidden="true" className="size-4 [.group:not([data-open])_&]:hidden" />
//               </span>
//               <span className="text-base/7 font-semibold">{Object.keys(years)[index]}</span>
//             </DisclosureButton>
//           </dt>
//           <DisclosurePanel>
//             <dl className="ml-6">
//               {Object.entries(months[1]).map((month, index) => {
//                 console.log(month)
//                 return (
//                   <span key={index}>{JSON.stringify(month)}</span>
//                 )
//               })}
//             </dl>
//           </DisclosurePanel>
//         </Disclosure>
//       ))}
//     </dl>
//   )
// }

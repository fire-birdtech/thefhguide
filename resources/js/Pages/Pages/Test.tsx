import { type ReactElement } from 'react'
import { Head, Link } from '@inertiajs/react'
import MainNavigation from '@/Components/Navigation/Main'

export default function TestPage (): ReactElement {
  return (
    <>
      <Head title="Test"/>

      <MainNavigation/>

      <div className="mt-14 py-7 fixed inset-x-0 z-30 bg-white border-b border-gray-300">
        <nav className="mx-auto flex items-center flex-wrap gap-x-3 gap-y-2 text-sm px-4 py-3 lg:px-8 lg:py-0" aria-label="Page">
          <Link href="#" className="hover:text-[#ff9f1c]">
            Overview Video
          </Link>

          <Link href="#" className="hover:text-[#ff9f1c]">
            About The Family History Guide
          </Link>

          <Link href="#" className="hover:text-[#ff9f1c]">
            FAQs
          </Link>

          <Link href="#" className="hover:text-[#ff9f1c]">
            About the Projects
          </Link>

          <Link href="#" className="hover:text-[#ff9f1c]">
            Project Resources
          </Link>
        </nav>
      </div>

      <div className="bg-white pt-16 sm:pt-[8.3rem]">
        <div>
          <div className="relative overflow-hidden bg-gray-900 px-6 py-20 sm:px-10 sm:py-16 md:px-12 lg:px-20">
            <img
              className="absolute inset-0 h-full w-full object-cover scale-125"
              src="https://thefhguide.com/img/get-started-hero.jpg"
              alt=""
            />
            <div className="relative mx-auto max-w-5xl pt-28 space-y-2">
              <h1 className="text-[#2ec4b6] font-bold text-[2.5rem] leading-[3rem] font-display">
                Introduction
              </h1>
              <button className="text-xl p-4 inline-block rounded transition-all duration-300 ease-in-out bg-[#02253d] text-white border border-transparent hover:bg-white hover:text-[#02253d] hover:border-[#02253d]">
                Overview Video
              </button>
            </div>
          </div>
        </div>
      </div>

      <article className="mx-auto max-w-5xl divide-y divide-gray-300 prose prose-headings:font-display prose-headings:font-medium prose-headings:mb-2 prose-h2:mt-0 prose-h2:text-3xl prose-img:float-right prose-img:border prose-img:border-black prose-img:ml-4 prose-img:max-w-md prose-p:last:mb-0">
        <section className="py-8">
          <img src="https://thefhguide.com/img/y-point-new.png" width="450" alt=""/>
          <h2>
            About The Family History Guide
          </h2>
          <p>
            The Family History Guide is a free website that represents a best-in-class learning environment for family
            history. Its scope is broad, but its focus is narrow enough to help you achieve your goals, step by step.
            Whether you're brand new to family history or a seasoned researcher—or somewhere in between—The Family
            History Guide can be your difference maker.
          </p>
          <p>
            <strong>Mission Statement:</strong> "Our mission is to greatly increase the number of people actively
            involved in family history worldwide, and to make everyone's family history journey easier, more efficient,
            and more enjoyable."
          </p>
          <p>Here are some of the unique features you'll find on the site:</p>
          <ul>
            <li>Goals for learning, supported by flexible Choices</li>
            <li>Step-by-step instructions to make learning easier</li>
            <li>Links to videos and articles from FamilySearch, Ancestry, and more</li>
            <li>QUIKLinks that take you to record searches from multiple sources, with a single click</li>
            <li>Project Tracker sheets and training materials for self-study or group instruction</li>
            <li>Activities for families, individuals, youth, and kids</li>
            <li>Family history resources for faiths, including members of The Church of Jesus Christ of Latter-day Saints, Catholics, Protestants, and those of Jewish heritage</li>
          </ul>
          <p>
            <strong>FamilySearch Connection</strong>: The FamilySearch article <a href="https://www.familysearch.org/en/fieldops/article/family-tree-basics" target="_blank" rel="noreferrer">"Family Tree Essentials"</a> points to The Family History Guide as a trusted learning resource.
          </p>
          <p>
            <strong>Overview</strong>: For an overview article about The Family History Guide, <a href="https://rejoiceandbeexceedingglad.blogspot.com/2019/01/what-is-family-history-guide.html" target="_blank" rel="noreferrer">click here</a>.
          </p>
        </section>

        <section className="py-8">
          <h2>
            Frequently Asked Questions
          </h2>
          <p>
            For a list of questions and answers about The Family History Guide, see the <a href="faq.html" target="_blank">FAQ page</a>.
          </p>
        </section>

        <section className="py-8">
          <img src="https://thefhguide.com/img/speaks.jpg" width="280" alt=""/>
          <h2>
            About the Projects
          </h2>
          <p>
            The Projects in The Family History Guide are listed in the top menu (or side menu, if you are using a tablet
            or phone). There are separate Projects for FamilySearch, Ancestry, MyHeritage, and Findmypast.
          </p>
          <h3>
            Goals, Choices, Instructions, Resources
          </h3>
          <p>
            To help you with learning and doing your family history, each Project has Goals, Choices, Instructions, and
            Resources. Projects are found in the top menu, such FamilySearch, Project 1: Family Tree.
          </p>
          <ul>
            <li>
              <em>Goals</em> are activities you can work on, often for an extended period of time or for many ancestors. Think of these as learning objectives, rather than quotas. (Example ... "Goal 1: Navigate Family Tree.")
            </li>
            <li>
              <em>Choices</em> are different aspects of a Goal that you can try. These are often shown in a suggested sequence, but you can determine the order. (Example ... "Choice A: Sign in to FamilySearch and move around the Family Tree screen.")
            </li>
            <li>
              <em>Instructions</em> are the steps you follow to complete a Choice. (Example ... "1. Go to www.familysearch.org and near the upper-right corner of the window, click Sign In.")
            </li>
            <li>
              <em>Resources</em> are links to helpful articles and videos you can use to teach yourself important family history concepts and skills. (Learn more in <a href="introduction.html#res">Project Resources</a> below.)
            </li>
          </ul>
        </section>

        <section className="py-8">
          <img src="https://thefhguide.com/img/button-press.jpg" width="374" alt=""/>
          <h2>
            Project Resources
          </h2>
          <p>
            Many of the Choices and Instructions in The Family History Guide link to documents and videos.
          </p>
          <p>
            <em>Try it</em>: Launch a video or document by clicking an icon from the list above.
          </p>
          <p>
            <em>Page numbers</em> in parentheses, such as (p. 3-4), mean the information you need is on those pages.
            Page numbers without parentheses, such as 8 pgs., mean the document is 8 pages long. (No page number means
            the document is a web page.) Hold the mouse pointer over the document icon above; it directs you to page 3.
          </p>
          <p>
            <em>Icon video timings</em> in parentheses, such as (3:00-4:30), mean the information you need is in that
            part of the video, so you can fast-forward to it. With no parentheses, such as 25:21, the timing refers to
            the total length of the video.
          </p>
        </section>
      </article>
    </>
  )
}

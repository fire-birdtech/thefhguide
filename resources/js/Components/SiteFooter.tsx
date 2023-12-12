import {type ReactElement} from "react";
import donate from '@images/footer/donate-small.png'
import association from '@images/footer/logo-long-a1-small.png'
import youtube from '@images/footer/youtube1-small.png'
import facebook from '@images/footer/facebook-small.png'
import blog from '@images/footer/blog1-small.png'
import pinterest from '@images/footer/badgeRGB-small.png'
import instagram from '@images/footer/instagram.webp'
import twitter from '@images/footer/twitter-icon-small.png'
import sorenson from '@images/footer/sorenson-logo.png'
import miller from '@images/footer/miller.png'
import ashton from '@images/footer/ashton.jpg'
import ExternalLink from "@/Components/ExternalLink";

export default function SiteFooter (): ReactElement {
  return (
    <footer className="bg-[#eeeeee] pt-12 pb-4">
      <div className="max-w-5xl mx-auto space-y-4 py-4">
        <div className="flex items-center justify-around">
          <a href="#">
            <img src={donate} alt="Donate to the Family History Guide Association"/>
          </a>
          <a href="#">
            <img src={association} alt="The Family History Guide Association"/>
          </a>
          <ExternalLink href="https://www.youtube.com/@thefamilyhistoryguide">
            <img className="border border-gray-900" src={youtube} alt="The Family History Guide YouTube channel"/>
          </ExternalLink>
        </div>

        <div className="flex items-center justify-around">
          <ExternalLink href="https://www.facebook.com/TheFamilyHistoryGuide/">
            <img className="h-12" src={facebook} alt="The Family History Guide Facebook page"/>
          </ExternalLink>
          <ExternalLink href="#">
            <img className="h-12 border border-gray-900" src={blog} alt="The Family History Guide Blog"/>
          </ExternalLink>
          <ExternalLink href="https://pinterest.com/thefamilyhistoryguide">
            <img className="h-12" src={pinterest} alt="The Family History Guide Pinterest Profile"/>
          </ExternalLink>
          <ExternalLink href="http://www.instagram.com/thefhguide">
            <img className="h-12 border border-gray-900" src={instagram} alt="The Family History Guide Instragram Profile"/>
          </ExternalLink>
          <ExternalLink href="https://twitter.com/seethefhguide">
            <img className="h-12" src={twitter} alt="The Family History Guide Twitter Profile"/>
          </ExternalLink>
        </div>

        <div className="border-t border-gray-900/10 pt-4">
          <div className="text-center">
            <ExternalLink
              href="https://form.jotform.com/81444529105151"
              className="font-extrabold text-[#17a08f] hover:text-[#ff9f1c] uppercase text-sm"
            >
              Contact Us
            </ExternalLink>
          </div>
          <div className="mt-4 text-center text-gray-800 text-sm">
            <p>
              Copyright 2023 The Family History Guide Association, a 501(c)(3) public charity organization. All rights reserved.
            </p>
            <p>
              The products (services) offered by The Family History Guide Association are neither made, provided, approved
              nor endorsed by Intellectual Reserve, Inc., FamilySearch International, or The Church of Jesus Christ of
              Latter-day Saints. Any content or opinions expressed, implied or included in or with the goods (services)
              offered by The Family History Guide Association are solely those of The Family History Guide Association
              and not those of Intellectual Reserve, Inc., FamilySearch International, or The Church of Jesus Christ of
              Latter-day Saints.
            </p>
            <a href="#" className="text-[#17a08f] hover:text-[#ff9f1c]">
              Photo Credits
            </a>
          </div>
        </div>
      </div>

      <div className="border-t border-gray-900/10 py-4">
        <div className="max-w-7xl mx-auto flex items-center justify-around">
          <img className="w-72 border border-gray-900" src={sorenson} alt="Sorenson Legacy Foundation"/>
          <img className="w-72 border border-gray-900" src={miller} alt="Larry H. & Gail Miller Family Foundation"/>
          <img className="w-52 border border-gray-900" src={ashton} alt="Ashton Family Foundation"/>
          <ExternalLink href="https://www.guidestar.org/profile/82-1081685">
            <img className="w-40" src="https://widgets.guidestar.org/gximage2?o=9651601&l=v4" alt="The Family History Guide Association Guidestar Profile"/>
          </ExternalLink>
        </div>
      </div>
    </footer>
  )
}
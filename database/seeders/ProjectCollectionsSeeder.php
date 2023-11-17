<?php

namespace Database\Seeders;

use App\Models\Choice;
use App\Models\Collection;
use App\Models\Goal;
use App\Models\GoalPage;
use App\Models\Project;
use App\Models\ResourceLink;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ProjectCollectionsSeeder extends Seeder
{
    private array $collections = [
        [
            'name' => 'FamilySearch',
            'website_url' => 'https://www.familysearch.org/',
            'projects' => [
                [
                    'name' => 'Family Tree',
                    'cover_image' => 'https://thefhguide.com/img/single-tree-2.jpg',
                    'file' => 'familysearch/project1.json',
                ],
                [
                    'name' => 'Memories',
                    'cover_image' => 'https://thefhguide.com/img/hero-bg1.jpg',
                    'file' => 'familysearch/project2.json',
                ],
                [
                    'name' => 'Descendants',
                    'cover_image' => 'https://thefhguide.com/img/1-descendants1.jpg',
                    'file' => 'familysearch/project3.json',
                ],
                [
                    'name' => 'Discover',
                    'cover_image' => 'https://thefhguide.com/img/header3.jpg',
                    'file' => 'familysearch/project4.json',
                ],
                [
                    'name' => 'Indexing',
                    'cover_image' => 'https://thefhguide.com/img/y-ellis2.jpg',
                    'file' => 'familysearch/project5.json',
                ],
                [
                    'name' => 'Help',
                    'cover_image' => 'https://thefhguide.com/img/teacher-student-crop.jpg',
                    'file' => 'familysearch/project6.json',
                ],
                [
                    'name' => 'Technology',
                    'cover_image' => 'https://thefhguide.com/img/tech-city.jpg',
                    'file' => 'familysearch/project7.json',
                ],
                [
                    'name' => 'DNA',
                    'cover_image' => 'https://thefhguide.com/img/y-dna2-crop.jpg',
                    'file' => 'familysearch/project8.json',
                ],
                [
                    'name' => 'Family Tree App',
                    'cover_image' => 'https://thefhguide.com/img/y-phone-pair.jpg',
                    'file' => 'familysearch/project9.json',
                ],
                [
                    'name' => 'Memories App',
                    'cover_image' => 'https://thefhguide.com/img/act/fun-basket2.png',
                    'file' => 'familysearch/project10.json',
                ],
                [
                    'name' => 'Goldie May',
                    'cover_image' => 'https://thefhguide.com/img/gm-tfhg2.png',
                    'file' => 'familysearch/project11.json',
                ],
            ],
        ],
        [
            'name' => 'Ancestry',
            'website_url' => 'https://www.ancestry.com/',
            'projects' => [
                [
                    'name' => 'Get Started',
                    'cover_image' => 'https://thefhguide.com/img/laptop-woman2.jpg',
                    'file' => 'ancestry/project1.json',
                ],
                [
                    'name' => 'Family Tree',
                    'cover_image' => 'https://thefhguide.com/img/walking2.jpg',
                    'file' => 'ancestry/project2.json',
                ],
                [
                    'name' => 'Documents, Stories, Photos',
                    'cover_image' => 'https://thefhguide.com/img/y-old-photos.jpg',
                    'file' => 'ancestry/project3.json',
                ],
                [
                    'name' => 'Research',
                    'cover_image' => 'https://thefhguide.com/img/y-researcher2.jpg',
                    'file' => 'ancestry/project4.json',
                ],
                [
                    'name' => 'Help',
                    'cover_image' => 'https://thefhguide.com/img/y-individual1.jpg',
                    'file' => 'ancestry/project5.json',
                ],
                [
                    'name' => 'Technology',
                    'cover_image' => 'https://thefhguide.com/img/tech-city.jpg',
                    'file' => 'ancestry/project6.json',
                ],
                [
                    'name' => 'DNA',
                    'cover_image' => 'https://thefhguide.com/img/y-dna4.jpg',
                    'file' => 'ancestry/project7.json',
                ],
                [
                    'name' => 'Ancestry App',
                    'cover_image' => 'https://thefhguide.com/img/y-phone-tracks1.jpg',
                    'file' => 'ancestry/project8.json',
                ],
            ],
        ],
        [
            'name' => 'MyHeritage',
            'website_url' => 'https://www.myheritage.com/',
            'projects' => [
                [
                    'name' => 'Account',
                    'cover_image' => 'https://thefhguide.com/img/hero-mh-p2.jpg',
                    'file' => 'myheritage/project1.json',
                ],
                [
                    'name' => 'Family Tree',
                    'cover_image' => 'https://thefhguide.com/img/mh-tree4.jpg',
                    'file' => 'myheritage/project2.json',
                ],
                [
                    'name' => 'Documents and Photos',
                    'cover_image' => 'https://thefhguide.com/img/hero-mh-p3b.jpg',
                    'file' => 'myheritage/project3.json',
                ],
                [
                    'name' => 'Research',
                    'cover_image' => 'https://thefhguide.com/img/hero-mh-p5.jpg',
                    'file' => 'myheritage/project4.json',
                ],
                [
                    'name' => 'Help',
                    'cover_image' => 'https://thefhguide.com/img/y-people-puzzle1.jpg',
                    'file' => 'myheritage/project5.json',
                ],
                [
                    'name' => 'Technology',
                    'cover_image' => 'https://thefhguide.com/img/tech-city.jpg',
                    'file' => 'myheritage/project6.json',
                ],
                [
                    'name' => 'DNA',
                    'cover_image' => 'https://thefhguide.com/img/dna6.jpg',
                    'file' => 'myheritage/project7.json',
                ],
                [
                    'name' => 'MyHeritage App',
                    'cover_image' => 'https://thefhguide.com/img/y-biz-tablet.jpg',
                    'file' => 'myheritage/project8.json',
                ],
            ],
        ],
        [
            'name' => 'Findmypast',
            'website_url' => 'https://www.findmypast.com/',
            'projects' => [
                [
                    'name' => 'Account',
                    'cover_image' => 'https://thefhguide.com/img/y-tracks1.jpg',
                    'file' => 'findmypast/project1.json',
                ],
                [
                    'name' => 'Family Tree',
                    'cover_image' => 'https://thefhguide.com/img/y-tree-road.jpg',
                    'file' => 'findmypast/project2.json',
                ],
                [
                    'name' => 'Documents and Photos',
                    'cover_image' => 'https://thefhguide.com/img/y-photos1.jpg',
                    'file' => 'findmypast/project3.json',
                ],
                [
                    'name' => 'Research',
                    'cover_image' => 'https://thefhguide.com/img/y-notebook2.jpg',
                    'file' => 'findmypast/project4.json',
                ],
                [
                    'name' => 'Help',
                    'cover_image' => 'https://thefhguide.com/img/y-tech.jpg',
                    'file' => 'findmypast/project5.json',
                ],
                [
                    'name' => 'Technology',
                    'cover_image' => 'https://thefhguide.com/img/y-mac-apps.jpg',
                    'file' => 'findmypast/project6.json',
                ],
                [
                    'name' => 'DNA',
                    'cover_image' => 'https://thefhguide.com/img/dna-hold1.jpg',
                    'file' => 'findmypast/project7.json',
                ],
            ],
        ],
        [
            'name' => 'Ethnic',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'African-American',
                    'cover_image' => 'https://thefhguide.com/img/hero-african.jpg',
                    'file' => 'ethnic/african-american.json',
                ],
                [
                    'name' => 'Asian',
                    'cover_image' => 'https://thefhguide.com/img/hero-asian1.jpg',
                    'file' => 'ethnic/asian.json',
                ],
                [
                    'name' => 'Basque',
                    'cover_image' => 'https://thefhguide.com/img/hero-basque1.jpg',
                    'file' => 'ethnic/basque.json',
                ],
                [
                    'name' => 'Hispanic',
                    'cover_image' => 'https://thefhguide.com/img/hero-hispanic.jpg',
                    'file' => 'ethnic/hispanic.json',
                ],
                [
                    'name' => 'Jewish',
                    'cover_image' => 'https://thefhguide.com/img/hero-jewish.jpg',
                    'file' => 'ethnic/jewish.json',
                ],
                [
                    'name' => 'Native American',
                    'cover_image' => 'https://thefhguide.com/img/hero-native.jpg',
                    'file' => 'ethnic/native-american.json',
                ],
            ],
        ],
        [
            'name' => 'North America',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Canada',
                    'cover_image' => 'https://thefhguide.com/img/hero-canada.jpg',
                    'file' => 'north-america/canada.json',
                ],
                [
                    'name' => 'Caribbean',
                    'cover_image' => 'https://thefhguide.com/img/hero-caribbean.jpg',
                    'file' => 'north-america/caribbean.json',
                ],
                [
                    'name' => 'Central America',
                    'cover_image' => 'https://thefhguide.com/img/hero-central.jpg',
                    'file' => 'north-america/central-america.json',
                ],
                [
                    'name' => 'Costa Rica',
                    'cover_image' => 'https://thefhguide.com/img/hero-costa.jpg',
                    'file' => 'north-america/costa-rica.json',
                ],
                [
                    'name' => 'Dominican Republic',
                    'cover_image' => 'https://thefhguide.com/img/hero-dominican.jpg',
                    'file' => 'north-america/dominican-republic.json',
                ],
                [
                    'name' => 'Jamaica',
                    'cover_image' => 'https://thefhguide.com/img/hero-jamaica.jpg',
                    'file' => 'north-america/jamaica.json',
                ],
                [
                    'name' => 'Mexico',
                    'cover_image' => 'https://thefhguide.com/img/hero-mexico.jpg',
                    'file' => 'north-america/mexico.json',
                ],
                [
                    'name' => 'United States',
                    'cover_image' => 'https://thefhguide.com/img/hero-us.jpg',
                    'file' => 'north-america/united-states.json',
                ],
            ],
        ],
        [
            'name' => 'British Isles',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Channel Islands',
                    'cover_image' => 'https://thefhguide.com/img/x-channel-islands.jpg',
                    'file' => 'british-isles/channel-islands.json',
                ],
                [
                    'name' => 'England',
                    'cover_image' => 'https://thefhguide.com/img/hero-england1.jpg',
                    'file' => 'british-isles/england.json',
                ],
                [
                    'name' => 'Ireland',
                    'cover_image' => 'https://thefhguide.com/img/hero-ireland.jpg',
                    'file' => 'british-isles/ireland.json',
                ],
                [
                    'name' => 'Isle of Man',
                    'cover_image' => 'https://thefhguide.com/img/x-isle-of-man.jpg',
                    'file' => 'british-isles/isle-of-man.json',
                ],
                [
                    'name' => 'Northern Ireland',
                    'cover_image' => 'https://thefhguide.com/img/x-northern-ireland.jpg',
                    'file' => 'british-isles/northern-ireland.json',
                ],
                [
                    'name' => 'Scotland',
                    'cover_image' => 'https://thefhguide.com/img/hero-scotland.jpg',
                    'file' => 'british-isles/scotland.json',
                ],
                [
                    'name' => 'Wales',
                    'cover_image' => 'https://thefhguide.com/img/hero-wales.jpg',
                    'file' => 'british-isles/wales.json',
                ],
            ],
        ],
        [
            'name' => 'Scandinavia',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Denmark',
                    'cover_image' => 'https://thefhguide.com/img/hero-denmark.jpg',
                    'file' => 'scandinavia/denmark.json',
                ],
                [
                    'name' => 'Finland',
                    'cover_image' => 'https://thefhguide.com/img/hero-finland.jpg',
                    'file' => 'scandinavia/finland.json',
                ],
                [
                    'name' => 'Iceland',
                    'cover_image' => 'https://thefhguide.com/img/hero-iceland.jpg',
                    'file' => 'scandinavia/iceland.json',
                ],
                [
                    'name' => 'Norway',
                    'cover_image' => 'https://thefhguide.com/img/hero-norway1.jpg',
                    'file' => 'scandinavia/norway.json',
                ],
                [
                    'name' => 'Sweden',
                    'cover_image' => 'https://thefhguide.com/img/hero-sweden.jpg',
                    'file' => 'scandinavia/sweden.json',
                ],
            ],
        ],
        [
            'name' => 'Central Europe',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Austria',
                    'cover_image' => 'https://thefhguide.com/img/hero-austria.jpg',
                    'file' => 'central-europe/austria.json',
                ],
                [
                    'name' => 'Croatia',
                    'cover_image' => 'https://thefhguide.com/img/hero-croatia.jpg',
                    'file' => 'central-europe/croatia.json',
                ],
                [
                    'name' => 'Czech Republic',
                    'cover_image' => 'https://thefhguide.com/img/hero-czech1.jpg',
                    'file' => 'central-europe/czech-republic.json',
                ],
                [
                    'name' => 'Germany',
                    'cover_image' => 'https://thefhguide.com/img/hero-germany.jpg',
                    'file' => 'central-europe/germany.json',
                ],
                [
                    'name' => 'Poland',
                    'cover_image' => 'https://thefhguide.com/img/hero-poland.jpg',
                    'file' => 'central-europe/poland.json',
                ],
                [
                    'name' => 'Slovakia',
                    'cover_image' => 'https://thefhguide.com/img/hero-slovakia.jpg',
                    'file' => 'central-europe/slovakia.json',
                ],
                [
                    'name' => 'Slovenia',
                    'cover_image' => 'https://thefhguide.com/img/hero-slovenia1.jpg',
                    'file' => 'central-europe/slovenia.json',
                ],
                [
                    'name' => 'Switzerland',
                    'cover_image' => 'https://thefhguide.com/img/hero-switzerland.jpg',
                    'file' => 'central-europe/switzerland.json',
                ],
            ],
        ],
        [
            'name' => 'Western Europe',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Belgium',
                    'cover_image' => 'https://thefhguide.com/img/hero-belgium.jpg',
                    'file' => 'western-europe/belgium.json',
                ],
                [
                    'name' => 'France',
                    'cover_image' => 'https://thefhguide.com/img/hero-france.jpg',
                    'file' => 'western-europe/france.json',
                ],
                [
                    'name' => 'Greece',
                    'cover_image' => 'https://thefhguide.com/img/hero-greece.jpg',
                    'file' => 'western-europe/greece.json',
                ],
                [
                    'name' => 'Italy',
                    'cover_image' => 'https://thefhguide.com/img/hero-italy.jpg',
                    'file' => 'western-europe/italy.json',
                ],
                [
                    'name' => 'Netherlands',
                    'cover_image' => 'https://thefhguide.com/img/hero-netherlands.jpg',
                    'file' => 'western-europe/netherlands.json',
                ],
                [
                    'name' => 'Portugal',
                    'cover_image' => 'https://thefhguide.com/img/hero-portugal.jpg',
                    'file' => 'western-europe/portugal.json',
                ],
                [
                    'name' => 'Spain',
                    'cover_image' => 'https://thefhguide.com/img/hero-spain.jpg',
                    'file' => 'western-europe/spain.json',
                ],
            ],
        ],
        [
            'name' => 'Eastern Europe',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Hungary',
                    'cover_image' => 'https://thefhguide.com/img/hero-hungary.jpg',
                    'file' => 'eastern-europe/hungary.json',
                ],
                [
                    'name' => 'Latvia',
                    'cover_image' => 'https://thefhguide.com/img/hero-latvia1.jpg',
                    'file' => 'eastern-europe/latvia.json',
                ],
                [
                    'name' => 'Lithuania',
                    'cover_image' => 'https://thefhguide.com/img/hero-lithuania.jpg',
                    'file' => 'eastern-europe/lithuania.json',
                ],
                [
                    'name' => 'Romania',
                    'cover_image' => 'https://thefhguide.com/img/hero-romania.jpg',
                    'file' => 'eastern-europe/romania.json',
                ],
                [
                    'name' => 'Russia',
                    'cover_image' => 'https://thefhguide.com/img/hero-russia.jpg',
                    'file' => 'eastern-europe/russia.json',
                ],
                [
                    'name' => 'Ukraine',
                    'cover_image' => 'https://thefhguide.com/img/hero-ukraine.jpg',
                    'file' => 'eastern-europe/ukraine.json',
                ],
                [
                    'name' => 'Europe Miscellaneous',
                    'cover_image' => 'https://thefhguide.com/img/x-europe1.png',
                    'file' => 'eastern-europe/miscellaneous.json',
                ],
            ],
        ],
        [
            'name' => 'Africa, Asia, and Pacific',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Australia',
                    'cover_image' => 'https://thefhguide.com/img/hero-aus.jpg',
                    'file' => 'asia-pacific-africa/australia.json',
                ],
                [
                    'name' => 'China',
                    'cover_image' => 'https://thefhguide.com/img/hero-china.jpg',
                    'file' => 'asia-pacific-africa/china.json',
                ],
                [
                    'name' => 'India',
                    'cover_image' => 'https://thefhguide.com/img/hero-india.jpg',
                    'file' => 'asia-pacific-africa/india.json',
                ],
                [
                    'name' => 'Indonesia',
                    'cover_image' => 'https://thefhguide.com/img/hero-indonesia.jpg',
                    'file' => 'asia-pacific-africa/indonesia.json',
                ],
                [
                    'name' => 'Japan',
                    'cover_image' => 'https://thefhguide.com/img/hero-japan.jpg',
                    'file' => 'asia-pacific-africa/japan.json',
                ],
                [
                    'name' => 'New Zealand',
                    'cover_image' => 'https://thefhguide.com/img/hero-newzealand.jpg',
                    'file' => 'asia-pacific-africa/new-zealand.json',
                ],
                [
                    'name' => 'Pacific Islands',
                    'cover_image' => 'https://thefhguide.com/img/hero-pacific.jpg',
                    'file' => 'asia-pacific-africa/pacific-islands.json',
                ],
                [
                    'name' => 'Philippines',
                    'cover_image' => 'https://thefhguide.com/img/hero-philippines1.jpg',
                    'file' => 'asia-pacific-africa/philippines.json',
                ],
                [
                    'name' => 'South Africa',
                    'cover_image' => 'https://thefhguide.com/img/hero-south-africa.jpg',
                    'file' => 'asia-pacific-africa/south-africa.json',
                ],
                [
                    'name' => 'South Korea',
                    'cover_image' => 'https://thefhguide.com/img/hero-south-korea.jpg',
                    'file' => 'asia-pacific-africa/south-korea.json',
                ],
                [
                    'name' => 'Africa Miscellaneous',
                    'cover_image' => 'https://thefhguide.com/img/x-drc-over.jpg',
                    'file' => 'asia-pacific-africa/africa-miscellaneous.json',
                ],
                [
                    'name' => 'Asia Miscellaneous',
                    'cover_image' => 'https://thefhguide.com/img/x-asia.jpg',
                    'file' => 'asia-pacific-africa/asia-miscellaneous.json',
                ],
            ],
        ],
        [
            'name' => 'South America',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Argentina',
                    'cover_image' => 'https://thefhguide.com/img/hero-arg.jpg',
                    'file' => 'south-america/argentina.json',
                ],
                [
                    'name' => 'Brazil',
                    'cover_image' => 'https://thefhguide.com/img/hero-brazil.jpg',
                    'file' => 'south-america/brazil.json',
                ],
                [
                    'name' => 'Chile',
                    'cover_image' => 'https://thefhguide.com/img/hero-chile.jpg',
                    'file' => 'south-america/chile.json',
                ],
                [
                    'name' => 'Colombia',
                    'cover_image' => 'https://thefhguide.com/img/hero-colombia.jpg',
                    'file' => 'south-america/colombia.json',
                ],
                [
                    'name' => 'Peru',
                    'cover_image' => 'https://thefhguide.com/img/hero-peru.jpg',
                    'file' => 'south-america/peru.json',
                ],
                [
                    'name' => 'South America Miscellaneous',
                    'cover_image' => 'https://thefhguide.com/img/x-ecuador.png',
                    'file' => 'south-america/miscellaneous.json',
                ],
            ],
        ],
        [
            'name' => 'U.S. States',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Washington, D.C.',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-wash-dc.jpg',
                    'file' => 'united-states/washington-dc.json',
                ],
                [
                    'name' => 'Puerto Rico',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-puerto-rico.jpg',
                    'file' => 'united-states/puerto-rico.json',
                ],
                [
                    'name' => 'Alabama',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-alabama.jpg',
                    'file' => 'united-states/alabama.json',
                ],
                [
                    'name' => 'Alaska',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-alaska.jpg',
                    'file' => 'united-states/alaska.json',
                ],
                [
                    'name' => 'Arizona',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-arizona.jpg',
                    'file' => 'united-states/arizona.json',
                ],
                [
                    'name' => 'Arkansas',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-arkansas.jpg',
                    'file' => 'united-states/arkansas.json',
                ],
                [
                    'name' => 'California',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-california.jpg',
                    'file' => 'united-states/california.json',
                ],
                [
                    'name' => 'Colorado',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-colorado.jpg',
                    'file' => 'united-states/colorado.json',
                ],
                [
                    'name' => 'Connecticut',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-connecticut.jpg',
                    'file' => 'united-states/connecticut.json',
                ],
                [
                    'name' => 'Delaware',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-delaware.jpg',
                    'file' => 'united-states/delaware.json',
                ],
                [
                    'name' => 'Florida',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-florida.jpg',
                    'file' => 'united-states/florida.json',
                ],
                [
                    'name' => 'Georgia',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-georgia.jpg',
                    'file' => 'united-states/georgia.json',
                ],
                [
                    'name' => 'Hawaii',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-hawaii.jpg',
                    'file' => 'united-states/hawaii.json',
                ],
                [
                    'name' => 'Idaho',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-idaho.jpg',
                    'file' => 'united-states/idaho.json',
                ],
                [
                    'name' => 'Illinois',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-illinois.jpg',
                    'file' => 'united-states/illinois.json',
                ],
                [
                    'name' => 'Indiana',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-indiana.jpg',
                    'file' => 'united-states/indiana.json',
                ],
                [
                    'name' => 'Iowa',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-iowa.jpg',
                    'file' => 'united-states/iowa.json',
                ],
                [
                    'name' => 'Kansas',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-kansas.jpg',
                    'file' => 'united-states/kansas.json',
                ],
                [
                    'name' => 'Kentucky',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-kentucky.jpg',
                    'file' => 'united-states/kentucky.json',
                ],
                [
                    'name' => 'Louisiana',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-louisiana.jpg',
                    'file' => 'united-states/louisiana.json',
                ],
                [
                    'name' => 'Maine',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-maine.jpg',
                    'file' => 'united-states/maine.json',
                ],
                [
                    'name' => 'Maryland',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-maryland.jpg',
                    'file' => 'united-states/maryland.json',
                ],
                [
                    'name' => 'Massachusetts',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-massachusetts.jpg',
                    'file' => 'united-states/massachusetts.json',
                ],
                [
                    'name' => 'Michigan',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-michigan.jpg',
                    'file' => 'united-states/michigan.json',
                ],
                [
                    'name' => 'Minnesota',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-minnesota.jpg',
                    'file' => 'united-states/minnesota.json',
                ],
                [
                    'name' => 'Mississippi',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-mississippi.jpg',
                    'file' => 'united-states/mississippi.json',
                ],
                [
                    'name' => 'Missouri',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-missouri.jpg',
                    'file' => 'united-states/missouri.json',
                ],
                [
                    'name' => 'Montana',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-montana.jpg',
                    'file' => 'united-states/montana.json',
                ],
                [
                    'name' => 'Nebraska',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-nebraska.jpg',
                    'file' => 'united-states/nebraska.json',
                ],
                [
                    'name' => 'Nevada',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-nevada.jpg',
                    'file' => 'united-states/nevada.json',
                ],
                [
                    'name' => 'New Hampshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-new-hampshire.jpg',
                    'file' => 'united-states/new-hampshire.json',
                ],
                [
                    'name' => 'New Jersey',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-new-jersey.jpg',
                    'file' => 'united-states/new-jersey.json',
                ],
                [
                    'name' => 'New Mexico',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-new-mexico.jpg',
                    'file' => 'united-states/new-mexico.json',
                ],
                [
                    'name' => 'New York',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-new-york.jpg',
                    'file' => 'united-states/new-york.json',
                ],
                [
                    'name' => 'North Carolina',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-north-carolina.jpg',
                    'file' => 'united-states/north-carolina.json',
                ],
                [
                    'name' => 'North Dakota',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-north-dakota.jpg',
                    'file' => 'united-states/north-dakota.json',
                ],
                [
                    'name' => 'Ohio',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-ohio.jpg',
                    'file' => 'united-states/ohio.json',
                ],
                [
                    'name' => 'Oklahoma',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-oklahoma.jpg',
                    'file' => 'united-states/oklahoma.json',
                ],
                [
                    'name' => 'Oregon',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-oregon.jpg',
                    'file' => 'united-states/oregon.json',
                ],
                [
                    'name' => 'Pennsylvania',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-pennsylvania.jpg',
                    'file' => 'united-states/pennsylvania.json',
                ],
                [
                    'name' => 'Rhode Island',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-rhode-island.jpg',
                    'file' => 'united-states/rhode-island.json',
                ],
                [
                    'name' => 'South Carolina',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-south-carolina.jpg',
                    'file' => 'united-states/south-carolina.json',
                ],
                [
                    'name' => 'South Dakota',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-south-dakota.jpg',
                    'file' => 'united-states/south-dakota.json',
                ],
                [
                    'name' => 'Tennessee',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-tennessee.jpg',
                    'file' => 'united-states/tennessee.json',
                ],
                [
                    'name' => 'Texas',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-texas.jpg',
                    'file' => 'united-states/texas.json',
                ],
                [
                    'name' => 'Utah',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-utah.jpg',
                    'file' => 'united-states/utah.json',
                ],
                [
                    'name' => 'Vermont',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-vermont.jpg',
                    'file' => 'united-states/vermont.json',
                ],
                [
                    'name' => 'Virginia',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-virginia.jpg',
                    'file' => 'united-states/virginia.json',
                ],
                [
                    'name' => 'Washington',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-washington.jpg',
                    'file' => 'united-states/washington.json',
                ],
                [
                    'name' => 'West Virginia',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-west-virginia.jpg',
                    'file' => 'united-states/west-virginia.json',
                ],
                [
                    'name' => 'Wisconsin',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-wisconsin.jpg',
                    'file' => 'united-states/wisconsin.json',
                ],
                [
                    'name' => 'Wyoming',
                    'cover_image' => 'https://thefhguide.com/img/hero-us-wyoming.jpg',
                    'file' => 'united-states/wyoming.json',
                ],
            ],
        ],
        [
            'name' => 'English Counties',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Bedfordshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-bedfordshire.jpg',
                    'file' => 'england/bedfordshire.json',
                ],
                [
                    'name' => 'Berkshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-berkshire.jpg',
                    'file' => 'england/berkshire.json',
                ],
                [
                    'name' => 'Buckinghamshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-buckinghamshire.jpg',
                    'file' => 'england/buckinghamshire.json',
                ],
                [
                    'name' => 'Cambridgeshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-cambridgeshire.jpg',
                    'file' => 'england/cambridgeshire.json',
                ],
                [
                    'name' => 'Cheshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-cheshire.jpg',
                    'file' => 'england/cheshire.json',
                ],
                [
                    'name' => 'Cornwall',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-cornwall.jpg',
                    'file' => 'england/cornwall.json',
                ],
                [
                    'name' => 'Cumberland',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-cumberland.jpg',
                    'file' => 'england/cumberland.json',
                ],
                [
                    'name' => 'Derbyshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-derbyshire.jpg',
                    'file' => 'england/derbyshire.json',
                ],
                [
                    'name' => 'Devon',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-devon.jpg',
                    'file' => 'england/devon.json',
                ],
                [
                    'name' => 'Dorset',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-dorset.jpg',
                    'file' => 'england/dorset.json',
                ],
                [
                    'name' => 'Durham',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-durham.jpg',
                    'file' => 'england/durham.json',
                ],
                [
                    'name' => 'Essex',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-essex.jpg',
                    'file' => 'england/essex.json',
                ],
                [
                    'name' => 'Gloucestershire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-gloucestershire.jpg',
                    'file' => 'england/gloucestershire.json',
                ],
                [
                    'name' => 'Hampshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-hampshire.jpg',
                    'file' => 'england/hampshire.json',
                ],
                [
                    'name' => 'Herefordshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-herefordshire.jpg',
                    'file' => 'england/herefordshire.json',
                ],
                [
                    'name' => 'Hertfordshire',
                    'cover_image' => 'https://thefhguide.com/img/x-en-hrt-over.jpg',
                    'file' => 'england/hertfordshire.json',
                ],
                [
                    'name' => 'Kent',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-kent.jpg',
                    'file' => 'england/kent.json',
                ],
                [
                    'name' => 'Lancashire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-lancashire.jpg',
                    'file' => 'england/lancashire.json',
                ],
                [
                    'name' => 'Leicestershire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-leicestershire.jpg',
                    'file' => 'england/leicestershire.json',
                ],
                [
                    'name' => 'Lincolnshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-lincolnshire.jpg',
                    'file' => 'england/lincolnshire.json',
                ],
                [
                    'name' => 'London',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-london.jpg',
                    'file' => 'england/london.json',
                ],
                [
                    'name' => 'Middlesex',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-middlesex.jpg',
                    'file' => 'england/middlesex.json',
                ],
                [
                    'name' => 'Norfolk',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-norfolk.jpg',
                    'file' => 'england/norfolk.json',
                ],
                [
                    'name' => 'Northamptonshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-northamptonshire.jpg',
                    'file' => 'england/northamptonshire.json',
                ],
                [
                    'name' => 'Northumberland',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-northumberland.jpg',
                    'file' => 'england/northumberland.json',
                ],
                [
                    'name' => 'Nottinghamshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-nottinghamshire.jpg',
                    'file' => 'england/nottinghamshire.json',
                ],
                [
                    'name' => 'Oxfordshire',
                    'cover_image' => 'https://thefhguide.com/img/x-en-oxf-over.jpg',
                    'file' => 'england/oxfordshire.json',
                ],
                [
                    'name' => 'Rutland',
                    'cover_image' => 'https://thefhguide.com/img/x-en-rut-over.jpg',
                    'file' => 'england/rutland.json',
                ],
                [
                    'name' => 'Shropshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-shropshire.jpg',
                    'file' => 'england/shropshire.json',
                ],
                [
                    'name' => 'Somerset',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-somerset.jpg',
                    'file' => 'england/somerset.json',
                ],
                [
                    'name' => 'Staffordshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-staffordshire.jpg',
                    'file' => 'england/staffordshire.json',
                ],
                [
                    'name' => 'Suffolk',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-suffolk.jpg',
                    'file' => 'england/suffolk.json',
                ],
                [
                    'name' => 'Surrey',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-surrey.jpg',
                    'file' => 'england/surrey.json',
                ],
                [
                    'name' => 'Sussex',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-sussex.jpg',
                    'file' => 'england/sussex.json',
                ],
                [
                    'name' => 'Warwickshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-warwickshire.jpg',
                    'file' => 'england/warwickshire.json',
                ],
                [
                    'name' => 'Westmorland',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-westmorland.jpg',
                    'file' => 'england/westmorland.json',
                ],
                [
                    'name' => 'Wiltshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-wiltshire.jpg',
                    'file' => 'england/wiltshire.json',
                ],
                [
                    'name' => 'Worcestershire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-worcestershire.jpg',
                    'file' => 'england/worcestershire.json',
                ],
                [
                    'name' => 'Yorkshire',
                    'cover_image' => 'https://thefhguide.com/img/hero-eng-yorkshire.jpg',
                    'file' => 'england/yorkshire.json',
                ],
            ],
        ],
        [
            'name' => 'Canadian Provinces',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'Alberta',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-alberta.jpg',
                    'file' => 'canada/alberta.json',
                ],
                [
                    'name' => 'British Columbia',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-bc.jpg',
                    'file' => 'canada/british-columbia.json',
                ],
                [
                    'name' => 'Manitoba',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-manitoba.jpg',
                    'file' => 'canada/manitoba.json',
                ],
                [
                    'name' => 'New Brunswick',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-nb.jpg',
                    'file' => 'canada/new-brunswick.json',
                ],
                [
                    'name' => 'Newfoundland',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-nf1.jpg',
                    'file' => 'canada/newfoundland.json',
                ],
                [
                    'name' => 'Nova Scotia',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-ns.jpg',
                    'file' => 'canada/nova-scotia.json',
                ],
                [
                    'name' => 'Ontario',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-ontario.jpg',
                    'file' => 'canada/ontario.json',
                ],
                [
                    'name' => 'Prince Edward Island',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-pei.jpg',
                    'file' => 'canada/prince-edward-island.json',
                ],
                [
                    'name' => 'Quebec',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-quebec.jpg',
                    'file' => 'canada/quebec.json',
                ],
                [
                    'name' => 'Saskatchewan',
                    'cover_image' => 'https://thefhguide.com/img/hero-ca-saskatchewan.jpg',
                    'file' => 'canada/saskatchewan.json',
                ],
                [
                    'name' => 'Territories',
                    'cover_image' => 'https://thefhguide.com/img/yukon.jpg',
                    'file' => 'canada/territories.json',
                ],
            ],
        ],
        [
            'name' => 'Australian States',
            'website_url' => null,
            'projects' => [
                [
                    'name' => 'New South Wales',
                    'cover_image' => 'https://thefhguide.com/img/hero-aus-nsw.jpg',
                    'file' => 'australia/new-south-wales.json',
                ],
                [
                    'name' => 'Queensland',
                    'cover_image' => 'https://thefhguide.com/img/hero-aus-qld.jpg',
                    'file' => 'australia/queensland.json',
                ],
                [
                    'name' => 'South Australia',
                    'cover_image' => 'https://thefhguide.com/img/hero-aus-sa.jpg',
                    'file' => 'australia/south-australia.json',
                ],
                [
                    'name' => 'Tasmania',
                    'cover_image' => 'https://thefhguide.com/img/hero-aus-tas.jpg',
                    'file' => 'australia/tasmania.json',
                ],
                [
                    'name' => 'Victoria',
                    'cover_image' => 'https://thefhguide.com/img/hero-aus-vic.jpg',
                    'file' => 'australia/victoria.json',
                ],
                [
                    'name' => 'Western Australia',
                    'cover_image' => 'https://thefhguide.com/img/hero-aus-wa.jpg',
                    'file' => 'australia/western-australia.json',
                ],
            ],
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        collect($this->collections)->each(function ($collection) {
            $newCollection = Collection::firstOrCreate([
                'name' => $collection['name'],
                'website_url' => $collection['website_url'],
            ]);

            foreach ($collection['projects'] as $project) {
                $newProject = Project::firstOrCreate([
                    'name' => $project['name'],
                    'collection_id' => $newCollection->id,
                ]);

                if (! empty($project['cover_image'])) {
                    $info = pathinfo($project['cover_image']);
                    $contents = file_get_contents($project['cover_image']);
                    $file = '/tmp/'.$info['basename'];
                    file_put_contents($file, $contents);
                    $newProject->updateCoverImage(new UploadedFile($file, $info['basename']));
                }

                var_dump('Reading '.$project['file']);

                $file = File::get(__DIR__.'/../data/'.$project['file']);
                $goals = json_decode($file);

                foreach ($goals as $goal) {
                    $newGoal = Goal::firstOrCreate([
                        'name' => $goal->name,
                        'nav_name' => $goal->nav_name ?? $goal->name,
                        'section_name' => $goal->section_name,
                        'summary' => $goal->summary,
                        'project_id' => $newProject->id,
                    ]);

                    $page = GoalPage::create([
                        'slug' => $newGoal->slug,
                        'uri' => "{$newCollection->slug}/{$newProject->slug}/{$newGoal->slug}",
                    ]);

                    $page->goal()->save($newGoal);

                    foreach ($goal->choices as $choice) {
                        if (! isset($choice->name)) {
                            continue;
                        }
                        $choiceContent = [];

                        if (isset($choice->content->hidden)) {
                            foreach ($choice->content->hidden as $hidden) {
                                if ($hidden->type === 'summary') {
                                    $choiceContent[] = [
                                        'type' => 'summary',
                                        'data' => $hidden->content,
                                    ];
                                }
                            }
                        }

                        if (isset($choice->content->text)) {
                            $choiceContent[] = [
                                'type' => 'text',
                                'data' => $choice->content->text,
                            ];
                        }

                        if (isset($choice->content->resources[0])) {
                            $resourcesList = [];
                            foreach ($choice->content->resources[0] as $resource) {
                                if (count($resource->links) < 1) {
                                    continue;
                                }

                                $resourcesList[] = [
                                    'description' => $resource->description,
                                    'links' => $resource->links,
                                ];
                            }

                            $choiceContent[] = [
                                'type' => 'resources',
                                'data' => $resourcesList,
                            ];
                        }

                        if (isset($choice->content->hidden)) {
                            foreach ($choice->content->hidden as $hidden) {
                                if ($hidden->type === 'exercises') {
                                    $choiceContent[] = [
                                        'type' => 'exercises',
                                        'data' => $hidden->content,
                                    ];
                                }
                            }
                        }

                        $newChoice = Choice::firstOrCreate([
                            'name' => $choice->name,
                            'content' => $choiceContent,
                            'goal_id' => $newGoal->id,
                        ]);

                        // data that needs choice_id
                        if (isset($choice->content->resources[0])) {
                            foreach ($choice->content->resources[0] as $resource) {
                                foreach ($resource->links as $link) {
                                    $newResourceLink = ResourceLink::firstOrCreate([
                                        'link' => $link->link,
                                    ], [
                                        'text' => $link->text,
                                        'type' => $link->type,
                                    ]);

                                    $newChoice->resourceLinks()->attach($newResourceLink);
                                }
                            }
                        }

                        if (isset($choice->content->images)) {
                            foreach ($choice->content->images as $image) {
                                //
                            }
                        }
                    }
                }
            }
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collections = [
            [
                'name' => 'FamilySearch',
                'website_url' => 'https://www.familysearch.org/',
                'projects' => [
                    'Family Tree',
                    'Memories',
                    'Descendants',
                    'Discover',
                    'Indexing',
                    'Help',
                    'Technology',
                    'DNA',
                    'Family Tree App',
                    'Memories App',
                    'Goldie May'
                ]
            ],
            [
                'name' => 'Ancestry',
                'website_url' => 'https://www.ancestry.com/',
                'projects' => [
                    'Get Started',
                    'Family Tree',
                    'Documents, Stories, Photos',
                    'Research',
                    'Help',
                    'Technology',
                    'DNA',
                    'Ancestry App'
                ]
            ],
            [
                'name' => 'MyHeritage',
                'website_url' => 'https://www.myheritage.com/',
                'projects' => [
                    'Account',
                    'Family Tree',
                    'Documents and Photos',
                    'Research',
                    'Help',
                    'Technology',
                    'DNA',
                    'MyHeritage App'
                ]
            ],
            [
                'name' => 'Findmypast',
                'website_url' => 'https://www.findmypast.com/',
                'projects' => [
                    'Account',
                    'Family Tree',
                    'Documents and Photos',
                    'Research',
                    'Help',
                    'Technology',
                    'DNA'
                ]
            ],
            [
                'name' => 'Computer Basics',
                'website_url' => null,
                'projects' => [
                    'PC Basics',
                    'MAC Basics',
                    'Gmail/Google Apps',
                    'PC Applications',
                    'MAC Applications',
                    'Social Media',
                    'Mobile Devices'
                ]
            ],
            [
                'name' => 'Ethnic',
                'website_url' => null,
                'projects' => [
                    'African American',
                    'Hispanic',
                    'Jewish',
                    'Native American'
                ]
            ],
            [
                'name' => 'North America',
                'website_url' => null,
                'projects' => [
                    'United States',
                    'Canada',
                    'Caribbean',
                    'Central America',
                    'Costa Rica',
                    'Dominican Republic',
                    'Jamiaca',
                    'Mexico'
                ]
            ],
            [
                'name' => 'British Isles',
                'website_url' => null,
                'projects' => [
                    'England',
                    'Ireland',
                    'Scotland',
                    'Wales'
                ]
            ],
            [
                'name' => 'Scandinavia',
                'website_url' => null,
                'projects' => [
                    'Denmark',
                    'Finland',
                    'Iceland',
                    'Norway',
                    'Sweden'
                ]
            ],
            [
                'name' => 'Central Europe',
                'website_url' => null,
                'projects' => [
                    'Austria',
                    'Croatia',
                    'Czech Republic',
                    'Germany',
                    'Poland',
                    'Slovakia',
                    'Slovenia',
                    'Switzerland'
                ]
            ],
            [
                'name' => 'Western Europe',
                'website_url' => null,
                'projects' => [
                    'Belgium',
                    'France',
                    'Greece',
                    'Italy',
                    'Netherlands',
                    'Portugal',
                    'Spain'
                ]
            ],
            [
                'name' => 'Eastern Europe',
                'website_url' => null,
                'projects' => [
                    'Hungary',
                    'Latvia',
                    'Lithuania',
                    'Romania',
                    'Russia',
                    'Ukraine',
                    'Miscellaneous'
                ]
            ],
            [
                'name' => 'Africa, Asia, and Pacific',
                'website_url' => null,
                'projects' => [
                    'Australia',
                    'China',
                    'India',
                    'Indonesia',
                    'Japan',
                    'New Zealand',
                    'Pacific Islands',
                    'Philippines',
                    'South Africa',
                    'South Korea',
                    'Africa Miscellaneous',
                    'Asia Miscellaneous'
                ]
            ],
            [
                'name' => 'South America',
                'website_url' => null,
                'projects' => [
                    'Argentina',
                    'Brazil',
                    'Chile',
                    'Colombia',
                    'Peru',
                    'South America Miscellaneous'
                ]
            ],
            [
                'name' => 'U.S. States',
                'website_url' => null,
                'projects' => [
                    'Washington D.C.',
                    'Puerto Rico',
                    'Alabama',
                    'Alaska',
                    'Arizona',
                    'Arkansas',
                    'California',
                    'Colorado',
                    'Connecticut',
                    'Delaware',
                    'Florida',
                    'Georgia',
                    'Hawaii',
                    'Idaho',
                    'Illinois',
                    'Indiana',
                    'Iowa',
                    'Kansas',
                    'Kentucky',
                    'Louisiana',
                    'Maine',
                    'Maryland',
                    'Massachusetts',
                    'Michigan',
                    'Minnesota',
                    'Mississippi',
                    'Missouri',
                    'Montana',
                    'Nebraska',
                    'Nevada',
                    'New Hampshire',
                    'New Jersey',
                    'New Mexico',
                    'New York',
                    'North Carolina',
                    'North Dakota',
                    'Ohio',
                    'Oklahoma',
                    'Oregon',
                    'Pennsylvania',
                    'Rhode Island',
                    'South Carolina',
                    'South Dakota',
                    'Tennessee',
                    'Texas',
                    'Utah',
                    'Vermont',
                    'Virginia',
                    'Washington',
                    'West Virginia',
                    'Wisconsin',
                    'Wyoming'
                ]
            ],
            [
                'name' => 'English Counties',
                'website_url' => null,
                'projects' => [
                    'Bedfordshire',
                    'Berkshire',
                    'Buckinghamshire',
                    'Cambridgeshire',
                    'Cheshire',
                    'Cornwall',
                    'Cumberland',
                    'Derbyshire',
                    'Devon',
                    'Dorset',
                    'Durham',
                    'Essex',
                    'Gloucestershire',
                    'Hampshire',
                    'Herefordshire',
                    'Kent',
                    'Lancashire',
                    'Leicestershire',
                    'Lincolnshire',
                    'London',
                    'Middlesex',
                    'Norfolk',
                    'Northamptonshire',
                    'Northumberland',
                    'Nottinghamshire',
                    'Shropshire',
                    'Somerset',
                    'Staffordshire',
                    'Suffolk',
                    'Surrey',
                    'Sussex',
                    'Warwickshire',
                    'Westmorland',
                    'Wiltshire',
                    'Worcestershire',
                    'Yorkshire'
                ]
            ],
            [
                'name' => 'Canadian Provinces',
                'website_url' => null,
                'projects' => [
                    'Alberta',
                    'British Columbia',
                    'Manitoba',
                    'New Brunswick',
                    'Newfoundland',
                    'Nova Scotia',
                    'Ontario',
                    'Prince Edward Island',
                    'Quebec',
                    'Saskatchewan',
                    'Territories'
                ]
            ],
            [
                'name' => 'Australian States',
                'website_url' => null,
                'projects' => [
                    'New South Wales',
                    'Queensland',
                    'South Australia',
                    'Tasmania',
                    'Victoria',
                    'Western Australia'
                ]
            ],
        ];

        collect($collections)->each(function ($collection) {
            $newCollection = Collection::firstOrCreate([
                'name' => $collection['name'],
                'website_url' => $collection['website_url'],
            ]);
            
            foreach ($collection['projects'] as $project) {
                $newCollection->projects()->save(new Project([
                    'name' => $project
                ]));
            }
        });
    }
}

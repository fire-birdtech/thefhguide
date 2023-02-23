<?php

namespace Database\Seeders;

use App\Models\Choice;
use App\Models\Collection;
use App\Models\Goal;
use App\Models\Project;
use App\Models\ResourceLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProjectCollectionsSeeder extends Seeder
{
    private $collections = [
        [
            'name' => 'FamilySearch',
            'website_url' => 'https://www.familysearch.org/',
            'projects' => [
                [
                    'name' => 'Family Tree',
                    'file' => 'familysearch/project1.json',
                ],
                [
                    'name' => 'Memories',
                    'file' => 'familysearch/project2.json',
                ],
                [
                    'name' => 'Descendants',
                    'file' => 'familysearch/project3.json',
                ],
                [
                    'name' => 'Discover',
                    'file' => 'familysearch/project4.json',
                ],
                [
                    'name' => 'Indexing',
                    'file' => 'familysearch/project5.json',
                ],
                [
                    'name' => 'Help',
                    'file' => 'familysearch/project6.json',
                ],
                [
                    'name' => 'Technology',
                    'file' => 'familysearch/project7.json',
                ],
                [
                    'name' => 'DNA',
                    'file' => 'familysearch/project8.json',
                ],
                [
                    'name' => 'Family Tree App',
                    'file' => 'familysearch/project9.json',
                ],
                [
                    'name' => 'Memories App',
                    'file' => 'familysearch/project10.json',
                ],
                [
                    'name' => 'Goldie May',
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
                    'file' => 'ancestry/project1.json',
                ],
                [
                    'name' => 'Family Tree',
                    'file' => 'ancestry/project2.json',
                ],
                [
                    'name' => 'Documents, Stories, Photos',
                    'file' => 'ancestry/project3.json',
                ],
                [
                    'name' => 'Research',
                    'file' => 'ancestry/project4.json',
                ],
                [
                    'name' => 'Help',
                    'file' => 'ancestry/project5.json',
                ],
                [
                    'name' => 'Technology',
                    'file' => 'ancestry/project6.json',
                ],
                [
                    'name' => 'DNA',
                    'file' => 'ancestry/project7.json',
                ],
                [
                    'name' => 'Ancestry App',
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
                    'file' => 'myheritage/project1.json',
                ],
                [
                    'name' => 'Family Tree',
                    'file' => 'myheritage/project2.json',
                ],
                [
                    'name' => 'Documents and Photos',
                    'file' => 'myheritage/project3.json',
                ],
                [
                    'name' => 'Research',
                    'file' => 'myheritage/project4.json',
                ],
                [
                    'name' => 'Help',
                    'file' => 'myheritage/project5.json',
                ],
                [
                    'name' => 'Technology',
                    'file' => 'myheritage/project6.json',
                ],
                [
                    'name' => 'DNA',
                    'file' => 'myheritage/project7.json',
                ],
                [
                    'name' => 'MyHeritage App',
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
                    'file' => 'findmypast/project1.json',
                ],
                [
                    'name' => 'Family Tree',
                    'file' => 'findmypast/project2.json',
                ],
                [
                    'name' => 'Documents and Photos',
                    'file' => 'findmypast/project3.json',
                ],
                [
                    'name' => 'Research',
                    'file' => 'findmypast/project4.json',
                ],
                [
                    'name' => 'Help',
                    'file' => 'findmypast/project5.json',
                ],
                [
                    'name' => 'Technology',
                    'file' => 'findmypast/project6.json',
                ],
                [
                    'name' => 'DNA',
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
                    'file' => 'ethnic/african-american.json',
                ],
                [
                    'name' => 'Asian',
                    'file' => 'ethnic/asian.json',
                ],
                [
                    'name' => 'Basque',
                    'file' => 'ethnic/basque.json',
                ],
                [
                    'name' => 'Hispanic',
                    'file' => 'ethnic/hispanic.json',
                ],
                [
                    'name' => 'Jewish',
                    'file' => 'ethnic/jewish.json',
                ],
                [
                    'name' => 'Native American',
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
                    'file' => 'north-america/canada.json',
                ],
                [
                    'name' => 'Caribbean',
                    'file' => 'north-america/caribbean.json',
                ],
                [
                    'name' => 'Central America',
                    'file' => 'north-america/central-america.json',
                ],
                [
                    'name' => 'Costa Rica',
                    'file' => 'north-america/costa-rica.json',
                ],
                [
                    'name' => 'Dominican Republic',
                    'file' => 'north-america/dominican-republic.json',
                ],
                [
                    'name' => 'Jamiaca',
                    'file' => 'north-america/jamaica.json',
                ],
                [
                    'name' => 'Mexico',
                    'file' => 'north-america/mexico.json',
                ],
                [
                    'name' => 'United States',
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
                    'file' => 'british-isles/channel-islands.json',
                ],
                [
                    'name' => 'England',
                    'file' => 'british-isles/england.json',
                ],
                [
                    'name' => 'Ireland',
                    'file' => 'british-isles/ireland.json',
                ],
                [
                    'name' => 'Isle of Man',
                    'file' => 'british-isles/isle-of-man.json',
                ],
                [
                    'name' => 'Northern Ireland',
                    'file' => 'british-isles/northern-ireland.json',
                ],
                [
                    'name' => 'Scotland',
                    'file' => 'british-isles/scotland.json',
                ],
                [
                    'name' => 'Wales',
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
                    'file' => 'scandinavia/denmark.json',
                ],
                [
                    'name' => 'Finland',
                    'file' => 'scandinavia/finland.json',
                ],
                [
                    'name' => 'Iceland',
                    'file' => 'scandinavia/iceland.json',
                ],
                [
                    'name' => 'Norway',
                    'file' => 'scandinavia/norway.json',
                ],
                [
                    'name' => 'Sweden',
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
                    'file' => 'central-europe/austria.json',
                ],
                [
                    'name' => 'Croatia',
                    'file' => 'central-europe/croatia.json',
                ],
                [
                    'name' => 'Czech Republic',
                    'file' => 'central-europe/czech-republic.json',
                ],
                [
                    'name' => 'Germany',
                    'file' => 'central-europe/germany.json',
                ],
                [
                    'name' => 'Poland',
                    'file' => 'central-europe/poland.json',
                ],
                [
                    'name' => 'Slovakia',
                    'file' => 'central-europe/slovakia.json',
                ],
                [
                    'name' => 'Slovenia',
                    'file' => 'central-europe/slovenia.json',
                ],
                [
                    'name' => 'Switzerland',
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
                    'file' => 'western-europe/belgium.json',
                ],
                [
                    'name' => 'France',
                    'file' => 'western-europe/france.json',
                ],
                [
                    'name' => 'Greece',
                    'file' => 'western-europe/greece.json',
                ],
                [
                    'name' => 'Italy',
                    'file' => 'western-europe/italy.json',
                ],
                [
                    'name' => 'Netherlands',
                    'file' => 'western-europe/netherlands.json',
                ],
                [
                    'name' => 'Portugal',
                    'file' => 'western-europe/portugal.json',
                ],
                [
                    'name' => 'Spain',
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
                    'file' => 'eastern-europe/hungary.json',
                ],
                [
                    'name' => 'Latvia',
                    'file' => 'eastern-europe/latvia.json',
                ],
                [
                    'name' => 'Lithuania',
                    'file' => 'eastern-europe/lithuania.json',
                ],
                [
                    'name' => 'Romania',
                    'file' => 'eastern-europe/romania.json',
                ],
                [
                    'name' => 'Russia',
                    'file' => 'eastern-europe/russia.json',
                ],
                [
                    'name' => 'Ukraine',
                    'file' => 'eastern-europe/ukraine.json',
                ],
                [
                    'name' => 'Europe Miscellaneous',
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
                    'file' => 'asia-pacific-africa/australia.json',
                ],
                [
                    'name' => 'China',
                    'file' => 'asia-pacific-africa/china.json',
                ],
                [
                    'name' => 'India',
                    'file' => 'asia-pacific-africa/india.json',
                ],
                [
                    'name' => 'Indonesia',
                    'file' => 'asia-pacific-africa/indonesia.json',
                ],
                [
                    'name' => 'Japan',
                    'file' => 'asia-pacific-africa/japan.json',
                ],
                [
                    'name' => 'New Zealand',
                    'file' => 'asia-pacific-africa/new-zealand.json',
                ],
                [
                    'name' => 'Pacific Islands',
                    'file' => 'asia-pacific-africa/pacific-islands.json',
                ],
                [
                    'name' => 'Philippines',
                    'file' => 'asia-pacific-africa/philippines.json',
                ],
                [
                    'name' => 'South Africa',
                    'file' => 'asia-pacific-africa/south-africa.json',
                ],
                [
                    'name' => 'South Korea',
                    'file' => 'asia-pacific-africa/south-korea.json',
                ],
                [
                    'name' => 'Africa Miscellaneous',
                    'file' => 'asia-pacific-africa/africa-miscellaneous.json',
                ],
                [
                    'name' => 'Asia Miscellaneous',
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
                    'file' => 'south-america/argentina.json',
                ],
                [
                    'name' => 'Brazil',
                    'file' => 'south-america/brazil.json',
                ],
                [
                    'name' => 'Chile',
                    'file' => 'south-america/chile.json',
                ],
                [
                    'name' => 'Colombia',
                    'file' => 'south-america/colombia.json',
                ],
                [
                    'name' => 'Peru',
                    'file' => 'south-america/peru.json',
                ],
                [
                    'name' => 'South America Miscellaneous',
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
                    'file' => 'united-states/washington-dc.json',
                ],
                [
                    'name' => 'Puerto Rico',
                    'file' => 'united-states/puerto-rico.json',
                ],
                [
                    'name' => 'Alabama',
                    'file' => 'united-states/alabama.json',
                ],
                [
                    'name' => 'Alaska',
                    'file' => 'united-states/alaska.json',
                ],
                [
                    'name' => 'Arizona',
                    'file' => 'united-states/arizona.json',
                ],
                [
                    'name' => 'Arkansas',
                    'file' => 'united-states/arkansas.json',
                ],
                [
                    'name' => 'California',
                    'file' => 'united-states/california.json',
                ],
                [
                    'name' => 'Colorado',
                    'file' => 'united-states/colorado.json',
                ],
                [
                    'name' => 'Connecticut',
                    'file' => 'united-states/connecticut.json',
                ],
                [
                    'name' => 'Delaware',
                    'file' => 'united-states/delaware.json',
                ],
                [
                    'name' => 'Florida',
                    'file' => 'united-states/florida.json',
                ],
                [
                    'name' => 'Georgia',
                    'file' => 'united-states/georgia.json',
                ],
                [
                    'name' => 'Hawaii',
                    'file' => 'united-states/hawaii.json',
                ],
                [
                    'name' => 'Idaho',
                    'file' => 'united-states/idaho.json',
                ],
                [
                    'name' => 'Illinois',
                    'file' => 'united-states/illinois.json',
                ],
                [
                    'name' => 'Indiana',
                    'file' => 'united-states/indiana.json',
                ],
                [
                    'name' => 'Iowa',
                    'file' => 'united-states/iowa.json',
                ],
                [
                    'name' => 'Kansas',
                    'file' => 'united-states/kansas.json',
                ],
                [
                    'name' => 'Kentucky',
                    'file' => 'united-states/kentucky.json',
                ],
                [
                    'name' => 'Louisiana',
                    'file' => 'united-states/louisiana.json',
                ],
                [
                    'name' => 'Maine',
                    'file' => 'united-states/maine.json',
                ],
                [
                    'name' => 'Maryland',
                    'file' => 'united-states/maryland.json',
                ],
                [
                    'name' => 'Massachusetts',
                    'file' => 'united-states/massachusetts.json',
                ],
                [
                    'name' => 'Michigan',
                    'file' => 'united-states/michigan.json',
                ],
                [
                    'name' => 'Minnesota',
                    'file' => 'united-states/minnesota.json',
                ],
                [
                    'name' => 'Mississippi',
                    'file' => 'united-states/mississippi.json',
                ],
                [
                    'name' => 'Missouri',
                    'file' => 'united-states/missouri.json',
                ],
                [
                    'name' => 'Montana',
                    'file' => 'united-states/montana.json',
                ],
                [
                    'name' => 'Nebraska',
                    'file' => 'united-states/nebraska.json',
                ],
                [
                    'name' => 'Nevada',
                    'file' => 'united-states/nevada.json',
                ],
                [
                    'name' => 'New Hampshire',
                    'file' => 'united-states/new-hampshire.json',
                ],
                [
                    'name' => 'New Jersey',
                    'file' => 'united-states/new-jersey.json',
                ],
                [
                    'name' => 'New Mexico',
                    'file' => 'united-states/new-mexico.json',
                ],
                [
                    'name' => 'New York',
                    'file' => 'united-states/new-york.json',
                ],
                [
                    'name' => 'North Carolina',
                    'file' => 'united-states/north-carolina.json',
                ],
                [
                    'name' => 'North Dakota',
                    'file' => 'united-states/north-dakota.json',
                ],
                [
                    'name' => 'Ohio',
                    'file' => 'united-states/ohio.json',
                ],
                [
                    'name' => 'Oklahoma',
                    'file' => 'united-states/oklahoma.json',
                ],
                [
                    'name' => 'Oregon',
                    'file' => 'united-states/oregon.json',
                ],
                [
                    'name' => 'Pennsylvania',
                    'file' => 'united-states/pennsylvania.json',
                ],
                [
                    'name' => 'Rhode Island',
                    'file' => 'united-states/rhode-island.json',
                ],
                [
                    'name' => 'South Carolina',
                    'file' => 'united-states/south-carolina.json',
                ],
                [
                    'name' => 'South Dakota',
                    'file' => 'united-states/south-dakota.json',
                ],
                [
                    'name' => 'Tennessee',
                    'file' => 'united-states/tennessee.json',
                ],
                [
                    'name' => 'Texas',
                    'file' => 'united-states/texas.json',
                ],
                [
                    'name' => 'Utah',
                    'file' => 'united-states/utah.json',
                ],
                [
                    'name' => 'Vermont',
                    'file' => 'united-states/vermont.json',
                ],
                [
                    'name' => 'Virginia',
                    'file' => 'united-states/virginia.json',
                ],
                [
                    'name' => 'Washington',
                    'file' => 'united-states/washington.json',
                ],
                [
                    'name' => 'West Virginia',
                    'file' => 'united-states/west-virginia.json',
                ],
                [
                    'name' => 'Wisconsin',
                    'file' => 'united-states/wisconsin.json',
                ],
                [
                    'name' => 'Wyoming',
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
                    'file' => 'england/bedfordshire.json',
                ],
                [
                    'name' => 'Berkshire',
                    'file' => 'england/berkshire.json',
                ],
                [
                    'name' => 'Buckinghamshire',
                    'file' => 'england/buckinghamshire.json',
                ],
                [
                    'name' => 'Cambridgeshire',
                    'file' => 'england/cambridgeshire.json',
                ],
                [
                    'name' => 'Cheshire',
                    'file' => 'england/cheshire.json',
                ],
                [
                    'name' => 'Cornwall',
                    'file' => 'england/cornwall.json',
                ],
                [
                    'name' => 'Cumberland',
                    'file' => 'england/cumberland.json',
                ],
                [
                    'name' => 'Derbyshire',
                    'file' => 'england/derbyshire.json',
                ],
                [
                    'name' => 'Devon',
                    'file' => 'england/devon.json',
                ],
                [
                    'name' => 'Dorset',
                    'file' => 'england/dorset.json',
                ],
                [
                    'name' => 'Durham',
                    'file' => 'england/durham.json',
                ],
                [
                    'name' => 'Essex',
                    'file' => 'england/essex.json',
                ],
                [
                    'name' => 'Gloucestershire',
                    'file' => 'england/gloucestershire.json',
                ],
                [
                    'name' => 'Hampshire',
                    'file' => 'england/hampshire.json',
                ],
                [
                    'name' => 'Herefordshire',
                    'file' => 'england/herefordshire.json',
                ],
                [
                    'name' => 'Hertfordshire',
                    'file' => 'england/hertfordshire.json',
                ],
                [
                    'name' => 'Kent',
                    'file' => 'england/kent.json',
                ],
                [
                    'name' => 'Lancashire',
                    'file' => 'england/lancashire.json',
                ],
                [
                    'name' => 'Leicestershire',
                    'file' => 'england/leicestershire.json',
                ],
                [
                    'name' => 'Lincolnshire',
                    'file' => 'england/lincolnshire.json',
                ],
                [
                    'name' => 'London',
                    'file' => 'england/london.json',
                ],
                [
                    'name' => 'Middlesex',
                    'file' => 'england/middlesex.json',
                ],
                [
                    'name' => 'Norfolk',
                    'file' => 'england/norfolk.json',
                ],
                [
                    'name' => 'Northamptonshire',
                    'file' => 'england/northamptonshire.json',
                ],
                [
                    'name' => 'Northumberland',
                    'file' => 'england/northumberland.json',
                ],
                [
                    'name' => 'Nottinghamshire',
                    'file' => 'england/nottinghamshire.json',
                ],
                [
                    'name' => 'Shropshire',
                    'file' => 'england/shropshire.json',
                ],
                [
                    'name' => 'Somerset',
                    'file' => 'england/somerset.json',
                ],
                [
                    'name' => 'Staffordshire',
                    'file' => 'england/staffordshire.json',
                ],
                [
                    'name' => 'Suffolk',
                    'file' => 'england/suffolk.json',
                ],
                [
                    'name' => 'Surrey',
                    'file' => 'england/surrey.json',
                ],
                [
                    'name' => 'Sussex',
                    'file' => 'england/sussex.json',
                ],
                [
                    'name' => 'Warwickshire',
                    'file' => 'england/warwickshire.json',
                ],
                [
                    'name' => 'Westmorland',
                    'file' => 'england/westmorland.json',
                ],
                [
                    'name' => 'Wiltshire',
                    'file' => 'england/wiltshire.json',
                ],
                [
                    'name' => 'Worcestershire',
                    'file' => 'england/worcestershire.json',
                ],
                [
                    'name' => 'Yorkshire',
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
                    'file' => 'canada/alberta.json',
                ],
                [
                    'name' => 'British Columbia',
                    'file' => 'canada/british-columbia.json',
                ],
                [
                    'name' => 'Manitoba',
                    'file' => 'canada/manitoba.json',
                ],
                [
                    'name' => 'New Brunswick',
                    'file' => 'canada/new-brunswick.json',
                ],
                [
                    'name' => 'Newfoundland',
                    'file' => 'canada/newfoundland.json',
                ],
                [
                    'name' => 'Nova Scotia',
                    'file' => 'canada/nova-scotia.json',
                ],
                [
                    'name' => 'Ontario',
                    'file' => 'canada/ontario.json',
                ],
                [
                    'name' => 'Prince Edward Island',
                    'file' => 'canada/prince-edward-island.json',
                ],
                [
                    'name' => 'Quebec',
                    'file' => 'canada/quebec.json',
                ],
                [
                    'name' => 'Saskatchewan',
                    'file' => 'canada/saskatchewan.json',
                ],
                [
                    'name' => 'Territories',
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
                    'file' => 'australia/new-south-wales.json',
                ],
                [
                    'name' => 'Queensland',
                    'file' => 'australia/queensland.json',
                ],
                [
                    'name' => 'South Australia',
                    'file' => 'australia/south-australia.json',
                ],
                [
                    'name' => 'Tasmania',
                    'file' => 'australia/tasmania.json',
                ],
                [
                    'name' => 'Victoria',
                    'file' => 'australia/victoria.json',
                ],
                [
                    'name' => 'Western Australia',
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
    public function run()
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

                var_dump('Reading '.$project['file']);

                // $newCollection->projects()->save($newProject);
                $file = File::get(__DIR__.'/../data/'.$project['file']);
                $goals = json_decode($file);

                foreach ($goals as $goal) {
                    $newGoal = Goal::firstOrCreate([
                        'name' => $goal->name,
                        'nav_name' => isset($goal->nav_name) ? $goal->nav_name : $goal->name,
                        'section_name' => $goal->section_name,
                        'summary' => $goal->summary,
                        'project_id' => $newProject->id,
                    ]);

                    foreach ($goal->choices as $choice) {
                        if (! isset($choice->name)) {
                            continue;
                        }
                        $choiceContent = [];

                        if (isset($choice->content->hidden)) {
                            foreach ($choice->content->hidden as $hidden) {
                                if ($hidden->type === 'summary') {
                                    array_push($choiceContent, [
                                        'type' => 'summary',
                                        'data' => $hidden->content,
                                    ]);
                                }
                            }
                        }

                        if (isset($choice->content->text)) {
                            array_push($choiceContent, [
                                'type' => 'text',
                                'data' => $choice->content->text,
                            ]);
                        }

                        if (isset($choice->content->resources[0])) {
                            $resourcesList = [];
                            foreach ($choice->content->resources[0] as $resource) {
                                if (count($resource->links) < 1) {
                                    continue;
                                }

                                array_push($resourcesList, [
                                    'description' => $resource->description,
                                    'links' => $resource->links,
                                ]);
                            }

                            array_push($choiceContent, [
                                'type' => 'resources',
                                'data' => $resourcesList,
                            ]);
                        }

                        if (isset($choice->content->hidden)) {
                            foreach ($choice->content->hidden as $hidden) {
                                if ($hidden->type === 'exercises') {
                                    array_push($choiceContent, [
                                        'type' => 'exercises',
                                        'data' => $hidden->content,
                                    ]);
                                }
                            }
                        }

                        // dd(json_encode($choiceContent));
                        $newChoice = Choice::firstOrCreate([
                            'name' => $choice->name,
                            'content' => json_encode($choiceContent),
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

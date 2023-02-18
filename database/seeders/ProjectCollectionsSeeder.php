<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Goal;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectCollectionsSeeder extends Seeder
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
                    [
                        'name' => 'Family Tree',
                        'goals' => [
                            [
                                'name' => 'Navigate',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'View Details About Direct-line Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'View the Children and Spouses of Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Locate Ancestors Through the Find and Recent Menus',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Alternate Views to See Your Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Change Information for Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add Ancestors You Know About to the Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => "Add Sources to an Ancestor's Records",
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn to Use Record Hints and Attach Sources',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add Notes About Ancestor Entries or Join Discussions About Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Merging Duplicate Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Product Customized Ancestry Charts',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Manage Your Account Settings',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use the FamilySearch Solutions Gallery to Explore Your Family Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Memories',
                        'goals' => [
                            [
                                'name' => 'Gather and Safeguard Your Own Important Personal Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Gather Photos and Documents of Ancestors From Others, and Organize Them',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Interview Living Relatives About Their Memories and Life Stories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Browse Memories to See Photos and Documents For Your Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Prepare Photos and Documents to be Uploaded to Memories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add and Tag Photos in Memories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add Documents to Memories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add Stories to Memories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Write a Life Sketch',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Gather Audio Files and Add Them to Memories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use the Gallery Feature in Memories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Apps from the Solutions Gallery to Preserve Your Family History Memories',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Descendants',
                        'goals' => [
                            [
                                'name' => 'Identify Lines to do Descendancy Research on',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Using Sourcing Tools in Descendancy View',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Using Puzzilla in Descendancy Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => "See Who You're Related to with Relative Finder",
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Discover',
                        'goals' => [
                            [
                                'name' => 'Get Organized for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn Genealogy Basics and Identify a Line to Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Form Solid Strategies to Research Your Selected Lines',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Record Searches to Find Ancestor Information',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Research Tools to Find Ancestor Information',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Develop Your Skills in Searching Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Solve Problems and Use Effective Research Methods',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Take a Family History Trip',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Places and the Solutions Gallery',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use the Where Am I From Feature to Explore Ancestral Lines',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Improve Your Ability to Read Difficult Handwriting',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Indexing',
                        'goals' => [
                            [
                                'name' => "Learn What Indexing Is and Why It's Essential for Research",
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started with Indexing',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Index and Manage Batches, and Set Goals',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Improve Your Basic Indexing Skills',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Collaborate With Others on Indexing Projects',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Help',
                        'goals' => [
                            [
                                'name' => 'Get Help With Your Own Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Involved With Genealogical Societies For Information and Support',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Collaborate With Others Doing Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Help Another FamilySearch User With Their Family Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Publish a Family History',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Voluntee With Family History',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use JAWS for the Visually Impaired',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Technology',
                        'goals' => [
                            [
                                'name' => 'Learn How to Use PC Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use MAC Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Google Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Social Media',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Social Media to Further Your Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Choose a Genealogy Software Program to Manage Your Personal Family History Data',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Create a Family Tree and Upload it to a Website',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'DNA',
                        'goals' => [
                            [
                                'name' => 'Learn About Basic Genetics and DNA Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Testing',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Select and Take a DNA Test',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Matching for Your Test Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About your Ethnicity and How to Find Family Relationships',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Research Tools',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Adoption and DNA',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help with DNA Questions',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Family Tree App',
                        'goals' => [
                            [
                                'name' => 'Download the App and Navigate the Tree in Pedigree View',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'View the Life Details for an Ancestor',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add and Attach Sources and Record Hints to Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Historical Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => "Explore Map My Ancestors to See Where Important Events Occurred in Ancestors' Lives",
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Other Tools Available in the Family Tree App',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Change Settings for the Family Tree App',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Memories App',
                        'goals' => [
                            [
                                'name' => 'Download the Memories App and Add Photos',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Create Stories and Add Them to Memories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'View, Add, and Manage Documents',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Listen to and Add Audio',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Create and Manage Albums',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Change Settings for the Memories App',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Goldie May',
                        'goals' => [
                            [
                                'name' => 'Install and Use the Goldie May Research Assistant',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Ancestry',
                'website_url' => 'https://www.ancestry.com/',
                'projects' => [
                    [
                        'name' => 'Get Started',
                        'goals' => [
                            [
                                'name' => 'Choose an Ancestry Account and Start Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Customize Profile and Site Settings',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Browse Your Homepage',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Customize Your Tree Settings and Access',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Family Tree',
                        'goals' => [
                            [
                                'name' => 'Navigate Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Edit Person Information',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add or Remove People',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Edit Relationships for People in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Hints for People in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add and View Sources for Ancestor Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Perform Other Tree Management Tasks',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Documents, Stories, Photos',
                        'goals' => [
                            [
                                'name' => 'Gather and Safeguard Your Own Important Personal Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Gather Photos and Documents of Ancestors From Others, and Organize Them',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Interview Living Relatives About Their Memories and Life Stories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Create and Edit Stories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Prepare Documents and Photos to be Uploaded',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Upload Photos',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Manage Media Gallery Items in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Research',
                        'goals' => [
                            [
                                'name' => 'Get Organized for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn Genealogy Basics and Identify a Line to Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Form Solid Strategies to Research Your Selected Lines',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Do Ancestry Searches to Find Ancestor Information',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search for Ancestry Record Collections',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Analyze Search Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Homepage Options to Aid Your Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Develop Your Skills in Searching Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Solve Problems and Use Effective Research Methods',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Take a Family History Trip',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to do Descendancy Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Improve Your Ability to Read Difficult Handwriting',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Help',
                        'goals' => [
                            [
                                'name' => 'Get Help With Your Own Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Ancestry Message Boards',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Member Connect and Other Collaboration Tools',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Involved With Genealogical Societies for Information and Support',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Collaborate With Others Doing Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Publish a Family History',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Participate in the Ancestry World Archives Project or Other Indexing Projects',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Technology',
                        'goals' => [
                            [
                                'name' => 'Learn How to Use PC Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use MAC Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Google Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Social Media',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Social Media to Further Your Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Technology from Ancestry.com',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'DNA',
                        'goals' => [
                            [
                                'name' => 'Learn About Basic Genetics and DNA Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Testing',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Take a DNA Test from Ancestry',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Matching With Your Test Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn More About DNA Matching',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn More About What You Can Do With DNA Test Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Research Tools',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Adoption and DNA',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With DNA Questions',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Update and Manage Settings for Your DNA Test Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ancestry App',
                        'goals' => [
                            [
                                'name' => 'Naviate and Manage Your Ancestry Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Edit Person Information in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add or Remove People From Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Hints for People in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'View and Add Sources for Ancestor Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'View Your Ancestral Places on Ancestry Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add Media and Use the Ancestry Gallery',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Manage Your Tree and Account Settings',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Matching With Your Test Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'MyHeritage',
                'website_url' => 'https://www.myheritage.com/',
                'projects' => [
                    [
                        'name' => 'Account',
                        'goals' => [
                            [
                                'name' => 'Choose a MyHeritage Account and Start Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Customize Your Account',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Edit Your Home Page',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Manage Your MyHeritage Inbox',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Other Tools and Options',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Download and Use the Family Tree Builder',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Family Tree',
                        'goals' => [
                            [
                                'name' => 'Navigate Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'View Information About People in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Edit Person Information',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add, Connect, and Remove People from Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'View People Lists and Run Relationship Reports',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => "Use PedigreeMap™ to View Important Locations in your Relatives' Lives",
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Print Charts and Books',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add and View Sources for Ancestor Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Check and Manage Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Record Matches in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Documents and Photos',
                        'goals' => [
                            [
                                'name' => 'Gather and Safeguard Your Own Important Personal Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Gather Photos and Documents of Ancestors From Others, and Organize Them',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Interview Living Relatives About Their Memories and Life Stories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Prepare Documents and Photos to be Uploaded',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add and Manage Photos',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Photo Albums for Your Site',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Research',
                        'goals' => [
                            [
                                'name' => 'Get Organized for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn Genealogy Basics and Identify a Line to Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Form Solid Strategies to Research Your Selected Lines',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use MyHeritage Research Options to Find Ancestor Information',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Develop Your Skills in Searching Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Solve Problems and Use Effective Research Methods',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Take a Family History Trip',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to do Descendancy Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Improve Your Ability to Read Difficult Handwriting',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Help',
                        'goals' => [
                            [
                                'name' => 'Get Help With Your Own Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Involved With Genealogical Societies for Information and Support',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Collaborate With Others Doing Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Publish a Family History',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Technology',
                        'goals' => [
                            [
                                'name' => 'Learn How to Use PC Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use MAC Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Google Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Social Media',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Social Media to Further Your Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Technology from MyHeritage',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'DNA',
                        'goals' => [
                            [
                                'name' => 'Learn About Basic Genetics and DNA Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Testing',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Take a DNA from MyHeritage and View Ethnicity Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Matching',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Research Tools',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Adoption and DNA',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With DNA Questions',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'MyHeritage App',
                        'goals' => [
                            [
                                'name' => 'Navigate Your MyHeritage Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Edit Person Information in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Discoveries and Matches in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add Documents and Photos to Your Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use the MyHeritage Research Feature to Find Ancestor Information',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Your MyHeritage DNA Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Adjust Your App Settings as Needed',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Findmypast',
                'website_url' => 'https://www.findmypast.com/',
                'projects' => [
                    [
                        'name' => 'Account',
                        'goals' => [
                            [
                                'name' => 'Choose a Findmypast Account and Start Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Customize Your Tree Settings',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Customer Your Account Settings',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Family Tree',
                        'goals' => [
                            [
                                'name' => 'Navigate Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Edit or Add Information for People in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add or Remove People in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Hints for People in Your Tree and Merge Records When Needed',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Documents and Photos',
                        'goals' => [
                            [
                                'name' => 'Gather and Safeguard Your Own Important Personal Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Gather Photos and Documents of Ancestors From Others, and Organize Them',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Interview Living Relatives About Their Memories and Life Stories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Prepare Documents and Photos to be Uploaded',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Add and Manage Media Items in Your Tree',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Research',
                        'goals' => [
                            [
                                'name' => 'Get Organized for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn Genealogy Basics and Identify a Line to Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Form Solid Strategies to Research Your Selected Lines',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use the Findmypast Search Menus to Find Ancestor Information',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Develop Your Skills in Searching Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Solve Problems and Use Effective Research Methods',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Take a Family History Trip',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to do Descendancy Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Improve Your Ability to Read Difficult Handwriting',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Help',
                        'goals' => [
                            [
                                'name' => 'Get Help With Your Own Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Involved With Genealogical Societies for Information and Support',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Collaborate With Others Doing Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Publish a Family History',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Technology',
                        'goals' => [
                            [
                                'name' => 'Learn How to Use PC Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use MAC Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Google Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Social Media',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Social Media to Further Your Family History Work',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Use Technology from Findmypast',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'DNA',
                        'goals' => [
                            [
                                'name' => 'Learn About Basic Genetics and DNA Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About DNA Testing',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Take a DNA Test from Living DNA and View Results',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Adoption and DNA',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With DNA Questions',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Manage DNA Accounts, Profiles, and Settings',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Computer Basics',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'PC Basics',
                        'goals' => [
                            [
                                'name' => 'Learn Basic PC Concepts',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Windows and Navigation',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get to Know the Internet',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Develop Basic Internet Skills',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => "Manage Your Computer's Data",
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help for Computer Problems and Issues',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'MAC Basics',
                        'goals' => [
                            [
                                'name' => 'Get Familiar With the Mac',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Familiar With macOS and Navigation',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started With macOS Applications',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Develop Basic Internet Skills',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => "Manage Your Computer's Data",
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help for Computer Problems and Issues',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Gmail/Google Apps',
                        'goals' => [
                            [
                                'name' => 'Setup a Gmail Account and Learn Email Basics',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Google Calendar',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn the Basics of Google Docs',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn How to Use Google Drive',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn the Basics of Google Sheets',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn the Basics of Google Slides',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'PC Applications',
                        'goals' => [
                            [
                                'name' => 'Get Started With Word Processing',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started With Spreadsheets',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started With Presentations',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started With Microsoft Outlook or Windows Live Mail',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'MAC Applications',
                        'goals' => [
                            [
                                'name' => 'Learn to Use Word Processing',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn to Use Spreadsheets',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn to Use Presentations',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started With Mac Mail',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Social Media',
                        'goals' => [
                            [
                                'name' => 'Setup a Facebook Account',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Setup a Twitter Account',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Setup an Instagram Account',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mobile Devices',
                        'goals' => [
                            [
                                'name' => 'Learn to Use Apple Mobile Devices',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn to Use Android Mobile Devices',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Ethnic',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'African-American',
                        'goals' => [
                            [
                                'name' => 'Get Start With African-American Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore African-American Record Sources',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Library and Other Resources',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Slavery Resources',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Break Through Research Barriers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Hispanic',
                        'goals' => [
                            [
                                'name' => 'Learn About Hispanic Resources for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn More About Hispanic Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Hispanic Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Jewish',
                        'goals' => [
                            [
                                'name' => 'Learn About Jewish Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Library, Archive, and Other Sources for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore the JewishGen Website',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Research Resources for the Jewish Holocaust',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records for Your Jewish Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Jewish Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Native American',
                        'goals' => [
                            [
                                'name' => 'Learn About Native American Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Special Topics in Native American Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records for Your Native American Ancestors',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Native American Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'North America',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'United States',
                        'goals' => [
                            [
                                'name' => 'Learn About U.S. Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Location and Geography',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About U.S. Research by Region and State',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Understand Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Birth Records in the U.S.',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Adoption Records and Alternatives to Birth Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Marriage Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Death Records and Obituaries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Cemetery Records and Tombstones',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get to Know the U.S. Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore U.S. Census Records by Decades',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Various Types of U.S. Immigration Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore U.S. Naturalization and Passenger Lists',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Other U.S. Immigration Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About U.S. Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore U.S. Military Records by Conflict',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore U.S. Church and Miscellaneous Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Property Records - Land, Probate, and Wills',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Court Records Online',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Newspapers Online',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Access U.S. Libraries and Archives',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your U.S. Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Canada',
                        'goals' => [
                            [
                                'name' => 'Learn About Research in Canada',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Canada',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Canadian Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Canadian Census',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Canadian Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Canadian Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Canadian Land and Property Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Canadian Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Canadian Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Canadian Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Canadian Record Collections, Including French-Canadian',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Canadian Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Canadian Genealogy Websites',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records From Canada',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Canadian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Caribbean',
                        'goals' => [
                            [
                                'name' => 'Get Started With Your Caribbean Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Caribbean Historical Atlases and Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records From The Caribbean',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Caribbean Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Central America',
                        'goals' => [
                            [
                                'name' => 'Learn About El Salvador Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Guatemala Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Panama Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search the Most Common Record Collections for Central America',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Costa Rica',
                        'goals' => [
                            [
                                'name' => 'Get Started With Costa Rican Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Costa Rica',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Costa Rica Civil Registration and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Costa Rica Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Costa Rica Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Costa Rica Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Costa Rica',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Costa Rican Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Dominican Republic',
                        'goals' => [
                            [
                                'name' => 'Get Started With Dominican Republic Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Dominican Republic',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Dominican Republic Civil Registration and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Dominican Republic Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Dominican Republic Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Dominican Republic',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Dominican Republic Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Jamiaca',
                        'goals' => [
                            [
                                'name' => 'Get Started With Jamaican Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Jamaica',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Jamaican Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Jamaican Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Jamaican Land and Property',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Jamaica Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Jamaica Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records From Jamaica',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get With Your Jamaica Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mexico',
                        'goals' => [
                            [
                                'name' => 'Get Started With Mexican Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Mexico',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Mexico Civil Registration Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Mexico Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Mexico Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Mexico Emigration and Immigrations',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Mexico Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Mexico Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Mexico Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Mexico',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Mexican Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'British Isles',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'England',
                        'goals' => [
                            [
                                'name' => 'Learn About Research in England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore British Vital Records for Birth, Marriage, and Death',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore British Civil Registration Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore British Probate and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Church and Cemetery Records in England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Emigration and Immigration in England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Archives and Libraries in England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Military Records in England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Map Resources for England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Newspaper Resources for England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records for England',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your English Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ireland',
                        'goals' => [
                            [
                                'name' => 'Learn About Research in Ireland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Ireland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Archives, Libraries, and Directories',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Civil Registration and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Land, Property, and Probate Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ireland Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records For Ireland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Irish Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Scotland',
                        'goals' => [
                            [
                                'name' => 'Learn About Scotland Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Geography, Culture, and History',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Property, Probate, Wills, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Scotland Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records From Scotland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Scottish Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Wales',
                        'goals' => [
                            [
                                'name' => 'Get Started With Welsh Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Geography, Culture, and History',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Land, Property, and Probate Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Wales Newpapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Wales',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Welsh Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Scandinavia',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Denmark',
                        'goals' => [
                            [
                                'name' => 'Learn About Denmark Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Denmark',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Danish Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Danish Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Arkivalieronline Site',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Danish Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Denmark Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Denmark Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Denmark Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Danish Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Denmark Land and Probate Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Denmark',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Danish Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Finland',
                        'goals' => [
                            [
                                'name' => 'Learn About Finland Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Finland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Finland Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Finland Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Finland Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Finland Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Finland Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Finland Newpapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Finland Land, Probate, and Other Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Finland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Finland Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Iceland',
                        'goals' => [
                            [
                                'name' => 'Learn About Iceland Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Iceland Geography, Culture, and History',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Iceland Census Records and the National Registry',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Iceland Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Iceland Emigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Iceland Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Iceland Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records From Iceland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Iceland Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Norway',
                        'goals' => [
                            [
                                'name' => 'Learn About Norway Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn about the Geography, Culture, and History of Norway',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norway Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norway Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norway Church and Cemetery Records, and Death Notices',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norway Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norway Farm Books',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norway Vital and Civil Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norway Probate Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norways Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Norway Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Norway',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Norwegian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Sweden',
                        'goals' => [
                            [
                                'name' => 'Learn About Sweden Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn about the Geography, Culture, and History of Sweden',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Sweden Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Swedish Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Sweden Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Swedish Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Sweden Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Sweden Probate and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Sweden Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Sweden Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Sweden',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Sweden Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Central Europe',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Austria',
                        'goals' => [
                            [
                                'name' => 'Learn About Austrian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Austria',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Austrian Libraries and Archives',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Austria Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Austria Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Austria Newspapers Online',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Austrian Genealogy Websites',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Austria',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Austrian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Croatia',
                        'goals' => [
                            [
                                'name' => 'Learn About Croatian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Croatia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Croatia Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Croatia Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Croatia Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Croatia Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Croatia Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search records from Croatia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Croatia Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Czech Republic',
                        'goals' => [
                            [
                                'name' => 'Learn About Research in the Czech Republic',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of the Czech Republic',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [

                                'name' => 'Learn About Czech Republic Archive and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Czech Republic Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Czech Republic Land and Property',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Czech Republic Obituaries and Cemteries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Czech Republic Church and Religious Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Czech Republic Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Czech Republic Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Czech Republic',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Czech Republic Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Germany',
                        'goals' => [
                            [
                                'name' => 'Get Started With German Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Germany',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About German Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn to Use German Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About German Civil Registration and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About German Emigration and Immigrations',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Germany Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About German Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About German Newspapers in Your Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Germany',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Germany Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Poland',
                        'goals' => [
                            [
                                'name' => 'Learn About Poland Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, History of Poland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn about Poland Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Poland Census and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn to use Poland Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Poland Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Poland Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Polish Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Poland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Poland Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Slovakia',
                        'goals' => [
                            [
                                'name' => 'Learn About Slovakian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, History of Slovakia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovakia Census Records and Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovakia Church Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovakia Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovakia Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovakia Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Slovakia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Slovakia Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Slovenia',
                        'goals' => [
                            [
                                'name' => 'Learn About Slovenian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Slovenia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovenia Census Records and Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovenia Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovenia Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovenia Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovenia Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Slovenia Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Website for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Slovenia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Slovenia Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Switzerland',
                        'goals' => [
                            [
                                'name' => 'Learn the Basics of Swiss Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Switzerland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Switzerland Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Switzerland Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Switzerland Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Switzerland Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Switzerland Newspapers Online',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Switzerland',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Switzerland Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Western Europe',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Belgium',
                        'goals' => [
                            [
                                'name' => 'Learn About Belgian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Belgium',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Belgium Civil Registers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Belgium Immigrations',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Belgian Cemeteries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Belgium Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Belgium Newspapers Online',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Belgium',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Belgian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'France',
                        'goals' => [
                            [
                                'name' => 'Learn About France Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of France',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About France Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About France Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About France Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About France Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About France Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About France Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About French Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from France',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your France Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Greece',
                        'goals' => [
                            [
                                'name' => 'Learn About Greece Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Greece',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Greek Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Church Records in Greece',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Greece Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Greece Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Greece Newspapers Online',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Greece',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Greece Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Italy',
                        'goals' => [
                            [
                                'name' => 'Expand Your Research in Italy',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Italy',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Italy Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Italy Civil Registration and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Italy Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Italy Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Italy Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Italy Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Italian Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Italy',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Italy Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Netherlands',
                        'goals' => [
                            [
                                'name' => 'Get Started With Netherlands Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Netherlands',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Dutch Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Netherlands Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Netherlands Civil Registration and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Netherlands Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Netherlands Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Netherlands Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Netherlands Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Dutch Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Netherlands',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Netherlands Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Portugal',
                        'goals' => [
                            [
                                'name' => 'Get Started With Portugal Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Portugal',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Portugal Church and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Portugal Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Portugal Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Portuguese Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Portugal',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Portugal Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Spain',
                        'goals' => [
                            [
                                'name' => 'Learn About Spain Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Spain',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Spain Census',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn to Use Spain Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Spain Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Spain Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Spain Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Spanish Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Spain',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Spain Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Eastern Europe',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Hungary',
                        'goals' => [
                            [
                                'name' => 'Learn About Hungarian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Hungary',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Hungary Church and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Hungary Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Hungary Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Hungary Church and Religious Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Hungarian Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Hungary Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Hungary Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Hungary',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Hungary Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Latvia',
                        'goals' => [
                            [
                                'name' => 'Learn About Latvian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Latvia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Latvia Church and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Latvia Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Latvia Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Latvia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Latvia Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Lithuania',
                        'goals' => [
                            [
                                'name' => 'Learn About Lithuanian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Lithuania',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Lithuanian Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Lithuania Census and Church Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Lithuania Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Lithuania Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Lithuania Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Lithuania',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Lithuania Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Romania',
                        'goals' => [
                            [
                                'name' => 'Learn About Romanian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Romania',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Romania Census and Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Romania Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Romania Church and Religious Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Romania Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Romania Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Romania',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Romania Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Russia',
                        'goals' => [
                            [
                                'name' => 'Learn About Russia Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Russia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Russia Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Russia Census and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Russia Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Russia Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Russia Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Russia Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Russia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Russia Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ukraine',
                        'goals' => [
                            [
                                'name' => 'Learn About Ukraine Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Ukraine',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ukraine Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ukraine Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ukraine Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ukraine Maps and Towns',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Ukraine Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Ukraine',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Ukraine Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Miscellaneous',
                        'goals' => [
                            [
                                'name' => 'Learn About Belarus Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Serbia Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Estonia Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Moldova Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from East Europe',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Africa, Asia, and Pacific',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Australia',
                        'goals' => [
                            [
                                'name' => 'Learn About Australia Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Australia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Australian Civil Registration and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Australian Immigration and Convict Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Australian Cemetery and Obituary Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Australian Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Australia Probate Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Australian Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Australian Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Australian Genealogy Websites',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Australia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Australian Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'China',
                        'goals' => [
                            [
                                'name' => 'Get Started With China Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of China',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About China Land and Property',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About China Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About China Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About China Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from China',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your China Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'India',
                        'goals' => [
                            [
                                'name' => 'Learn About India Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of India',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About India Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About India Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About India Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from India',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your India Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Indonesia',
                        'goals' => [
                            [
                                'name' => 'Learn About Indonesia Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Indonesia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Indonesia Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Indonesia Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Indonesia Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Indonesia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Indonesia Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Japan',
                        'goals' => [
                            [
                                'name' => 'Learn About Japan Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Japan',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Japan Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Japan Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Japan Buddhist Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Japan Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Japan Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Japan',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Japan Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'New Zealand',
                        'goals' => [
                            [
                                'name' => 'Learn About New Zealand Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of New Zealand',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About New Zealand Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About New Zealand Civil Registration and Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About New Zealand Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About New Zealand Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About New Zealand Probate, Land, and Property Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About New Zealand Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About New Zealand Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from New Zealand',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your New Zealand Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Pacific Islands',
                        'goals' => [
                            [
                                'name' => 'Learn About Tongan Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Samoan Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Fiji Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Philippines',
                        'goals' => [
                            [
                                'name' => 'Get Started With Philippines Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of the Philippines',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Philippines Census and Civil Registration Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Philippines Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Philippines Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Philippines Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Philippines',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Philippines Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'South Africa',
                        'goals' => [
                            [
                                'name' => 'Get Started With South Africa Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of the South Africa',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Africa Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Africa Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Africa Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Africa Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Africa Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Africa Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from South Africa',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your South Africa Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'South Korea',
                        'goals' => [
                            [
                                'name' => 'Get Started With South Korea Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of the South Korea',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Korea Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Korea Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Korea Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Korea Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Korea Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About South Korea Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from South Korea',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your South Korea Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Africa Miscellaneous',
                        'goals' => [
                            [
                                'name' => 'Get Started With Democratic Republic of the Congo Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started With Ghana Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started With Ivory Coast Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Started With Nigeria Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'South America',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Argentina',
                        'goals' => [
                            [
                                'name' => 'Learn About Argentina Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Argentina',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Argentina Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Civil Registration and the Argentina Census',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Argentina Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Argentina Church, Religious, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Argentina Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Argentina Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Argentina',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Argentina Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Brazil',
                        'goals' => [
                            [
                                'name' => 'Learn About Research in Brazil',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Brazil',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Brazil Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Brazil Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Brazil Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Brazil Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Brazil Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Brazil Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Brazil',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Brazil Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Chile',
                        'goals' => [
                            [
                                'name' => 'Learn About Research in Chile',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Chile',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Chile Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Chile Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Chile Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Chile Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Chile Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Chile',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Chile Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Colombia',
                        'goals' => [
                            [
                                'name' => 'Learn About Colombia Research, Archives, and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Colombia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Colombia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Colombia Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Peru',
                        'goals' => [
                            [
                                'name' => 'Learn About Colombia Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About the Geography, Culture, and History of Colombia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Civil Registration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Maps',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Colombia Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from Colombia',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Colombia Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'South America Miscellaneous',
                        'goals' => [
                            [
                                'name' => 'Learn About Ecuador Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Uruguay Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Venezuela Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records from South America',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'U.S. States',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Washington, D.C.',
                        'goals' => [
                            [
                                'name' => 'Get Started With Your Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Washington, D.C. Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Washington, D.C. Vital Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Washington, D.C. Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Washington, D.C. Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Washington, D.C. Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Washington, D.C. Land, Probate, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Washington, D.C. Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Washington, D.C. Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Record Collections',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Washington, D.C. Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Puerto Rico',
                        'goals' => [
                            [
                                'name' => 'Get Started With Your Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Puerto Rico Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Puerto Rico Civil Registration, Vital Records, and Census',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Puerto Rico Church, Court, and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Puerto Rico Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Learn About Puerto Rico Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Explore Additional Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help With Your Puerto Rico Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Alabama',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Alaska',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Arizona',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Arkansas',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'California',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Colorado',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Connecticut',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Delaware',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Florida',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Georgia',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Hawaii',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Idaho',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Illinois',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Indiana',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Iowa',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kansas',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kentucky',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Louisiana',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Maine',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Maryland',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Massachusetts',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Michigan',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Minnesota',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Mississippi',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Missouri',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Montana',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Nebraska',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Nevada',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'New Hampshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'New Jersey',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'New Mexico',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'New York',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'North Carolina',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'North Dakota',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ohio',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Oklahoma',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Oregon',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Pennsylvania',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Rhode Island',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'South Carolina',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'South Dakota',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Tennessee',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Texas',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Utah',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Vermont',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Virginia',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Washington',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'West Virginia',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Wisconsin',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Wyoming',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Military Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'English Counties',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Bedfordshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Berkshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Buckinghamshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Cambridgeshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Cheshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Cornwall',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Cumberland',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Derbyshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Devon',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Dorset',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Durham',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Essex',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Gloucestershire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Hampshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Herefordshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Kent',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Lancashire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Leicestershire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Lincolnshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'London',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Middlesex',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Norfolk',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Northamptonshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Northumberland',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Nottinghamshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Shropshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Somerset',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Staffordshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Suffolk',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Surrey',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Sussex',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Warwickshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Westmorland',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Wiltshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Worcestershire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Yorkshire',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Canadian Provinces',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'Alberta',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'British Columbia',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Manitoba',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'New Brunswick',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Newfoundland',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Nova Scotia',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Ontario',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Prince Edward Island',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Quebec',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Saskatchewan',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Territories',
                        'goals' => [
                            [
                                'name' => 'Learn About Research and Records for Canadian Territories',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Australian States',
                'website_url' => null,
                'projects' => [
                    [
                        'name' => 'New South Wales',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Queensland',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'South Australia',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Tasmania',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Victoria',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Western Australia',
                        'goals' => [
                            [
                                'name' => 'Research and Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Archives and Libraries',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Vital and Census Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Church and Cemetery Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Emigration and Immigration',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Probate, Land, and Court Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Maps and Gazetteers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Newspapers',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Websites for Research',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Search Records',
                                'summary' => '<p>The Summary</p>',
                            ],
                            [
                                'name' => 'Get Help',
                                'summary' => '<p>The Summary</p>',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        collect($collections)->each(function ($collection) {
            $newCollection = Collection::firstOrCreate([
                'name' => $collection['name'],
                'website_url' => $collection['website_url'],
            ]);

            foreach ($collection['projects'] as $project) {
                $newProject = Project::firstOrCreate([
                    'name' => $project['name'],
                    'collection_id' => $newCollection->id,
                ]);

                // $newCollection->projects()->save($newProject);

                foreach ($project['goals'] as $goal) {
                    $newGoal = Goal::create([
                        'name' => $goal['name'],
                        'summary' => $goal['summary'],
                        'project_id' => $newProject->id,
                    ]);

                    // $newProject->goals()->save($newGoal);
                }
            }
        });
    }
}

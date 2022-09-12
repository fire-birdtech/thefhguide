<?php

namespace Database\Seeders;

use App\Models\Collection;
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
                'name' => 'Intro',
                'website_url' => null
            ],
            [
                'name' => 'FamilySearch',
                'website_url' => 'https://www.familysearch.org/'
            ],
            [
                'name' => 'Ancestry',
                'website_url' => 'https://www.ancestry.com/'
            ],
            [
                'name' => 'MyHeritage',
                'website_url' => 'https://www.myheritage.com/'
            ],
            [
                'name' => 'Findmypast',
                'website_url' => 'https://www.findmypast.com/'
            ],
            [
                'name' => 'Trainers',
                'website_url' => null
            ],
            [
                'name' => 'Activities',
                'website_url' => null
            ],
            [
                'name' => 'Youth',
                'website_url' => null
            ],
            [
                'name' => 'Media',
                'website_url' => null
            ],
            [
                'name' => 'Faiths',
                'website_url' => null
            ],
            [
                'name' => 'Countries',
                'website_url' => null
            ],
            [
                'name' => 'Vault',
                'website_url' => null
            ],
            [
                'name' => 'Misc',
                'website_url' => null
            ],
        ];

        collect($collections)->each(function ($collection) {
            Collection::firstOrCreate([
                'name' => $collection['name'],
                'website_url' => $collection['website_url'],
            ]);
        });
    }
}

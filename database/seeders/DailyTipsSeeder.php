<?php

namespace Database\Seeders;

use App\Models\DailyTip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DailyTipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = File::get(__DIR__.'/../data/dailyTips.json');
        $tips = json_decode($file);

        foreach ($tips as $tip) {
            DailyTip::withoutTimestamps(function () use ($tip) {
                DailyTip::query()->firstOrCreate([
                    'title' => $tip->title,
                    'body' => $tip->body,
                    'created_at' => $tip->date,
                    'updated_at' => $tip->date,
                ]);
            });
        }
    }
}

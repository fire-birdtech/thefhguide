<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UpdatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the roles and permissions seeder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Artisan::call('db:seed --class=RolesAndPermissionsSeeder');

        return Command::SUCCESS;
    }
}

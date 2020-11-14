<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;
use DB;

class CmsMigration extends Command
{
    protected $signature = 'cms:migration';

    protected $description = 'Run cms migration file, and remove it to can use php artisan migration again and again, and only update your database based on your model columns.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Artisan::call('migrate');

        // Remove create_cms_tables record from migrations table.
        DB::table('migrations')->where('migration', 'like', '%create_cms_tables%')->delete();
    }
}

<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Imports\PostsImport;
use App\Models\Post;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Get data from excel';

    public function handle()
    {
        ini_set('memory_limit', '-1');
        Excel::import(new PostsImport(), public_path('excel/posts.xlsx'));
        dd('finished');
    }
}

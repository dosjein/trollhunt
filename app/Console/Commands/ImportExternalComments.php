<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use League\Csv\Reader;
use Carbon\Carbon;

class ImportExternalComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:csv {file?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import CSV of external comments';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Import Comments as external CSV file');

        $file = storage_path('file.csv');

        if ($this->argument('file')){
            $file = $this->argument('file');
        }

        $this->info('Importing '.$file);

        $csv = Reader::createFromPath($file);

        $nbInsert = $csv->fetchAll(function ($row)
        {
            DB::table('external_comments')->insert(
                array(
                    'comment_external_id'  => $row[0],
                    'object_id'  => $row[1],
                    'author'  => $row[2],
                    'comment'  => $row[3],
                    'ip'  => $row[4],
                    'create_date'  => Carbon::parse($row[5]),
                    'registered'  => $row[6],
                    'rate'  => $row[7],
                    'reply_id'  => $row[8],
                    'status'  => $row[9],
                    'replay_nickname'  => $row[10],
                    'login_user_id'  => $row[11],
                    'country_code'  => $row[12]
                )
            );
        });

        return 'true';

    }
}

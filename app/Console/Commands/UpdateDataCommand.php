<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //  DB::table('giohang')->where("MaGioHang",25)->delete();
    }
}
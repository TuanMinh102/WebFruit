<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $ngayHienTai = new DateTime();
        $ngayHienTai= $ngayHienTai->format('Y-m-d');
        DB::table('discount')->where('MaGiamGia',1)->delete();
    }
}
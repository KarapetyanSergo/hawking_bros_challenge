<?php

namespace App\Console\Commands;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CleanProductsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command cleans products older than one week';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            Log::channel('products')->info('products:clean command start');

            $weekAgo = Carbon::now()->subWeek();

            Product::where('created_at', '<=', $weekAgo)
            ->whereDoesntHave('items')
            ->delete();

            Log::channel('products')->info('products:clean command done');
        } catch (\Exception $e) {
            Log::channel('products')->error('products:clean command fail: '.$e->getMessage());
        }
    }
}

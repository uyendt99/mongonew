<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\OrdersImport;

class OrderImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Order Excel';

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
     * @return int
     */
    public function handle()
    {
        $this->output->title('Starting import');
        (new OrdersImport)->withOutput($this->output)->import('order.xlsx');
        $this->output->success('Import successful');
    }
}

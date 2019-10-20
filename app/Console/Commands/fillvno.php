<?php

namespace App\Console\Commands;
use App\Http\Controllers\ForecastMNApp\Module\HomeController;
use Illuminate\Console\Command;

class fillvno extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:vno';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
    public function handle(HomeController $pull)
    {
        $pull->fillVno();

    }
}

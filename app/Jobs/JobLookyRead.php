<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Http\Controllers\SshController;


class JobLookyRead implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ip;
    protected $init;
    protected $end;
    protected $idx;
    //protected $tipo;



    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ip, $init, $end, $idx)
    {
        $this->ip = $ip;
        $this->init = $init;
        $this->end = $end;
        $this->idx = $idx;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SshController $controller)
    {
        //$controller->lookyRead($this->ip, $this->init, $this->end, $this->idx, $this->tipo);
    }
}

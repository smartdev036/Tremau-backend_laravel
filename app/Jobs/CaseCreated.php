<?php

use App\MyCase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CaseCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $caseData;

    public function __construct(array $caseData)
    {
        $this->caseData = $caseData;
    }

    public function handle()
    {
        MyCase::create($this->caseData);
    }
}


?>
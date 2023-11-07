<?php

use App\Case;
use App\Jobs\CaseCreated;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'reporterName' => 'required|string',
            'reporterAge' => 'required|integer',
            'reportedUrl' => 'required|string',
            'reporterEmail' => 'required|email',
        ]);

        CaseCreated::dispatch($request->all())->onQueue('new_cases');
        
        return response()->json(['message' => 'Case creation queued.'], 202);
    }
}

?>
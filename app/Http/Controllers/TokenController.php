<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// In a suitable controller, e.g., app/Http/Controllers/TokenController.php

use App\Services\EtherscanService;

class TokenController extends Controller
{
    protected $etherscanService;

    public function __construct(EtherscanService $etherscanService)
    {
        $this->etherscanService = $etherscanService;
    }

    public function index(Request $request)
    {
        $transactions = [];

        if ($request->has('contract_address')) {
            $transactions = $this->etherscanService->getTokenTransactions($request->contract_address);
        }

        return view('token-transactions', compact('transactions'));
    }
}

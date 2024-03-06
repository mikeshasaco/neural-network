<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EtherscanService;

class SmartContractController extends Controller
{
    protected $etherscanService;

    public function __construct(EtherscanService $etherscanService)
    {
        $this->etherscanService = $etherscanService;
    }

    public function index()
    {
        return view('smart-contract-search');
    }

    public function search(Request $request)
    {
        $transactions = $this->etherscanService->getContractTransactions($request->contract_address);

        return view('smart-contract-search', compact('transactions'));
    }

    // In a suitable controller, e.g., app/Http/Controllers/SmartContractController.php

public function getTokenBalance(Request $request)
{
    $balance = $this->etherscanService->getTokenBalance($request->contract_address, $request->user_address);

    // You may want to add error handling and validation here

    return view('token-balance', compact('balance'));
}


}

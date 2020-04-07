<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;



class BalanceController extends Controller
{
    public  function index()
    {
        $balance = auth()->user()->balance;
        $amount = $balance ? $balance->amount : 0; 

        return view('admin.balance.index', compact('amount'));

    }

    public function deposit()
    {
        return view('admin.balance.deposit');
    }

    public function depositStore(MoneyValidationFormRequest $request)
    {
        //$balance->deposit($request->value);
        $balance = (auth()->user()->balance()->firstOrCreate([]));
        dd($balance->deposit($request->value));

        if($response['success'])
        return redirect()
                  ->route('admin.balance')
                  ->width('success', $response['message']);



    return redirect()
                ->back()
                ->width('error', $response['message']);
    }

    public function widthdrawn()
    {
        return view('admin.balance.widthdrawn');
    }


}

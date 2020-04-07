<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Http\Requests\MoneyValidationFormRequest;
use Response;
use App\User;




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
                  ->with('success', $response['message']);



    return redirect()
                ->back()
                ->with('error', $response['message']);
    }


    public function withdrawn()
    {
        return view('admin.balance.withdrawn');
    }


    public function withdrawnStore(MoneyValidationFormRequest $request)
    {
                
        $balance = auth()->user()->balance()->firstOrCreate([]);
        $response = $balance->withdrawn($request->value);

        if($response['success'])
        return redirect()
                  ->route('admin.balance')
                  ->with('success', $response['message']);



    return redirect()
                ->back()
                ->with('error', $response['message']);
    }

    public function transfer()
    {
        return view('admin.balance.transfer');
    }

    public function confirmTransfer(Request $request, User $user)
    {
        if(!$sender = $user->getSender($request->sender));
           return redirect()
                      ->back()
                      ->with('error', 'Usuario informado não encontrado');

        if($sender->id === auth()->user()->id)
            return redirect()
                      ->back()
                      ->with('error', 'Não pode mandar para voçê mesmo');

        return view('admin.balance.transfer-confirm', compact('sender'));
        

    }

    public function transferStore(Request $request)
    {
        dd($request->all());
    }
    


}

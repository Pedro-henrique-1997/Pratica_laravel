<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Response;


class Balance extends Model
{
    public function deposit(float $value) : Array
    {
        DB::beginTransaction();

    	$totalBefore = $this->amount ? $this->amount: 0;
    	$this->amount += number_format($value, 2, '.', '');
    	$deposit = $this->save();

    	$historic = auth()->user()->historic()->create([
    		    'type' => 'I',
    		     'amount' => $value,
    		     'total_before' => $totalBefore,
    		     'total_after' => $this->amount,  		     
    		     'date' => date('Ymd')

    	]);
    

    if($deposit && $historic){

    	DB::commit();

    	return [  

    		'sucess' => true,
    		'message' => 'Sucesso ao recarregar'
    	];

    }else{

    	DB::rollback();

    return[
    	'sucess' => false,
    	'message' => 'Falha ao recarregar'
    ];

    }

}

   public function withdrawn(float $value) : array
   {

      if($this->amount < $value)
        return [
            'success' => false,
            'message' => 'Saldo insuficiente',
        ];

    DB::beginTransaction();

        $totalBefore = $this->amount ? $this->amount: 0;
        $this->amount -= number_format($value, 2, '.', '');
        $withdrawn = $this->save();

        $historic = auth()->user()->historic()->create([
                'type' => 'O',
                 'amount' => $value,
                 'total_before' => $totalBefore,
                 'total_after' => $this->amount,             
                 'date' => date('Ymd')

        ]);
    

    if($withdrawn && $historic){

        DB::commit();

        return [  

            'success' => true,
            'message' => 'Sucesso ao retirar'
        ];

    }else{

        DB::rollback();

    return[
        'success' => false,
        'message' => 'Falha ao retirar'
    ];

    }




   }
}

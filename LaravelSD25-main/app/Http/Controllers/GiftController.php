<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
   public function addGift(){
          $users = DB::table('users')->select('id', 'name')->get();
          return view('gifts.add_gift', compact('users'));
   }

  public function allGifts(){
         $gifts = $this->getAllGifts();
         return view('gifts.all_gifts', compact('gifts'));
  }

 public function viewGift($id){
           $gifts=DB::table('gifts')
             ->where('gifts.id', $id)
             ->join('users', 'users.id', '=', 'gifts.user_id')
             ->select("gifts.*","users.name as username")
             ->first();
     return view('gifts.view_gift', compact('gifts'));
     }

public function deleteGift($id){
        //se tiver gifts associadas, apaga
        DB::table('gifts')
        ->where('id', $id)
        ->delete();
        return back();
}
    //função que recebe os dados do form
    public function storeGifts(Request $request){
        //dd($request->all());
        //validar se os dados recebidos estão em conformidade com a BAse de dados
        $request->validate([
            'nome' => 'required|string|max:50',
            'valor_previsto'=> 'required|numeric',
            'user_id' =>'required|exists:users,id',
            'valor_gasto' => 'nullable|numeric'

        ],
        [
            'nome.required' => 'O nome da prenda é obrigatório.',
            'nome.max' => 'O nome só pode ter no máximo 50 caracteres.',
            'valor_previsto.required' => 'O valor previsto é obrigatório.',
            'valor_previsto.numeric' => 'O valor previsto tem de ser numérico.',
            'user_id.required' => 'Tem de escolher a pessoa.',
            'valor_gasto.numeric' => 'O valor gasto tem de ser numérico.',
        ]
        );

        //inserir user na base de dados
         DB::table('gifts')->insert([
            'nome' => $request->nome,
            'valor_previsto' => $request-> valor_previsto,
            'user_id' => $request->user_id,
            'valor_gasto' =>$request->valor_gasto
        ]);

        return redirect()->route('gifts.all')->with('message', 'Gift adicionado com sucesso!');
    }


  //função que faz a query à base de dados
  protected function getAllGifts(){
          $gifts = DB::table('gifts')
          ->join('users', 'users.id', '=', 'gifts.user_id')
          ->select("gifts.*","users.name as username")
          ->get();
          return $gifts;
      }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(){
        $users = $this->getAllUsers();

        return view('users.add_user', compact('users'));
    }

    public function listUsers(){
        $usersThatWillComeFromDB = ['Manuela', 'Vítor', 'Alexandre', 'Bruno'];
    
        // if eu tiver um campo de search

       $search = request()->query('search') ? request()->query('search') : null;
       $usersFromDB = DB::table('users');
       
       if($search){
         $usersFromDB->where('name', 'LIKE', "%$search%")
         ->orWhere('email','LIKE',"%$search%");
        }

       $usersFromDB =$usersFromDB-> get();
       //where search == campo pesquisado pelo user


        return view('users.all_users', compact('usersThatWillComeFromDB', 'usersFromDB'));
    }

    public function viewUser($id){
        //carregar uma nova view
        //com os dados do user onde estamos a clicar
        $user = User::where('id', $id)->first();

        return view('users.view_user', compact('user'));

    }

    public function deleteUser($id){

        //se tiver tasks associadas, apaga
        Db::table('tasks')
        ->where('user_id', $id)
        ->delete();


        DB::table('users')
        ->where('id', $id)
        ->delete();


        return back();

    }

    public function updateUser(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
 
        DB::table('users')
        ->where('id', $request->id)
        ->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'nif' =>$request->nif,
            'updated_at'=> now()
        ]);
 
        return redirect()->route('users.all')->with('message', 'User actualizado com sucesso!');
    }
    

    //função que recebe os dados do form
    public function storeUser(Request $request){
        //dd($request->all());
        //validar se os dados recebidos estão em conformidade com a BAse de dados
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' =>'min:8|required'
        ]);

        //inserir user na base de dados
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.all')->with('message', 'User adicionado com sucesso!');
    }

    private function getAllUsers(){

        //no futuro carregamos dados da base de dados (query À BD)
        $users = ['Francisco', 'Luís','Rafaela', 'Maria'];
        return $users;
    }



    private function insertUserIntoDB(){

        DB::table('users')->updateOrinsert(
            ['email' =>'teste1@gmail.com'],
            [
            'name' =>'Sara',
            'updated_at'=>now(),
            'password' => '1234444'
        ]);
    }

    private function deleteUserFromDB(){
        Db::table('users')
        ->where('id',4)
        ->delete();

    }

}

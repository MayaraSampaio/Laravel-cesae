<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function allTasks(){
        $tasks = $this->getAllTasks();
        return view('tasks.all_tasks', compact('tasks'));
    }

    public function viewTask($id){
          $task=  Db::table('tasks')
            ->where('tasks.id', $id)
            ->join('users', 'users.id', '=', 'tasks.user_id')
            ->select("tasks.*","users.name as username")
            ->first();

          $users= DB::table('users')
          ->get(); 

    return view('tasks.view_task', compact('task','users'));

    }

    public function deleteGifts($id){
        //se tiver tasks associadas, apaga
        Db::table('gifts')
        ->where('id', $id)
        ->delete();
        return back();

    }

     public function addTask(){
       $users = User::get();

        return view('tasks.add_task', compact('users'));
    }

       //função que recebe os dados do form
    public function storeTask(Request $request){
        //dd($request->all());
        //validar se os dados recebidos estão em conformidade com a BAse de dados
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'user_id' =>'required|exists:users,id'
        ]);

        //inserir user na base de dados
        Task::insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso!');
    }

    public function updateTasks(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
 
        DB::table('tasks')
        ->where('id', $request->id)
        ->update([
            'name' =>$request->name,
            'description' =>$request->description,            
            'due_at'=> $request->date
        ]);
 
        return redirect()->route('tasks.all')->with('message', 'User actualizado com sucesso!');
    }


    //função que faz a query à base de dados
    protected function getAllTasks(){
        $search = request()->query('search') ? request()->query('search') : null;

        $tasks = DB::table('tasks')->join('users', 'users.id', '=', 'tasks.user_id')
        ->select("tasks.*","users.name as username");
        
        if($search){
          $tasks = $tasks->where('tasks.name', 'LIKE', "%$search%")
         ->orWhere('description','LIKE',"%$search%");
        }


        

        $tasks = $tasks->get();;


        return $tasks;

    }
}

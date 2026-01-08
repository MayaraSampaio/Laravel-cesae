<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function home(){
        //consulta à base de dados pelo nome do login
        $myName = 'Mayara';
        $age = 28;
        $students = ['Rafael', 'Luísa', 'Luís'];

        $userData = [
            'name' => 'Mayara',
            'age'=> 28
        ];


        $cesaeInfo = $this->getCesaeInfo();

        return view('homepage',compact(
        'myName',
        'age','students', 'userData', 'cesaeInfo'));
    }

    private function getCesaeInfo(){
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Ciríaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.pt'
        ];

        return  $cesaeInfo;
    }
}

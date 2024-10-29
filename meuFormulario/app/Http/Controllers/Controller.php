<?php

namespace App\Http\Controllers;//Nesse caminho, nesta pasta, é onde todos os controllers estão.

use Illuminate\Http\Request;//importa a classe Request, usada p/ lidar com requisições http.

/*abstract class Controller
{
    //
}*/

class HomeController extends Controller //Define um controller chamado homecontroller - Extends indica que ele herda a funcionalidade da classe Controller
{
    public function home()//Aqui coloca-se a lógica q será executada, e *será chamada quando a rota /home for acessada*.
    {
        $mensagem = "Olá, vai dar certo, creia e faça sua parte!";
        return view('home', ['mensagem' => $mensagem]);//A função view procura um arquivo de view em resources/views/home.blade.php
    }
}

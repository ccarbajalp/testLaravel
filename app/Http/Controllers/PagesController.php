<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{
    public function __construct()
    {
        //$this->middleware('example',['only' =>['home']]);
        $this->middleware('example',['only' =>['homes']]);
    }
    //
    /*protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }*/

    public function home(){
        return view('home');
    }

    public function saludo($nombre = "Invitado"){
    $html = "<h2>Contenido html</h2>";
    $script = "<script>alert('Problema XSS - Cross Site Scripting!!!')</script>";

    $consolas = [
        "PLAY",
        "xBOX ONE",
        "wii u"
    ];

    return view("saludo", compact('nombre', 'html', 'script', 'consolas'));
    }

    /*public function mensaje(CreateMessageRequest $request){


        $data = $request->all();
        //return response()->json(['data' => $data], 202);
        //return redirect()->route('contactos')->with('info','Tu mensaje ha sido enviado correctamente :)');
        return back()->with('info','Tu mensaje ha sido enviado correctamente :)');



        //return $this->request->all();
        //return $request->all();
    }*/
}

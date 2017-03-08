<?php

namespace doctos\Http\Controllers;

use Illuminate\Http\Request;

use doctos\Http\Requests;
use doctos\Usuario;

class LogController extends Controller
{
    //
    public function store(Request $request)
    {
        $txtUs = $request->get('txtUs');
        $txtCl = $request->get('txtCl');

        $usuario = Usuario::where('usuario','=',$txtUs)->where('password','=',$txtCl)->first();
        if(!is_null($usuario)){
            echo "Adentro";
            $request->session()->put('usuario', $usuario);
            return redirect('/');
        }
        else {
            $error = "El Usuario No Existe";
            return view('login', compact('error'));
        }
    }

    public function logout()
    {
        request()->session()->forget('usuario');
        return redirect('login');
    }
}

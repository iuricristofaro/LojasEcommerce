<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getLogin()
    {
    	$data = [
    		'email' => 'iuri@iuricristofaro.com.br',
    		'password' => 123456
    	];

    	// if(Auth::attempt($data)){
    	// 	return "logou";
    	// }

    	// if(Auth::check()){
    	// 	return "Logando";
    	// }

    	dd(Auth::user()->email);

    	return "Falhou";
    }

    public function getLogout()
    {
    	Auth::logout();

    	if(Auth::check()){
    		return "Logando";
    	}

    	return "Não está logado";
    }
}

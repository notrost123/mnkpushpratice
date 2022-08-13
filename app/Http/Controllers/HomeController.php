<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Routine; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $objRoutines = Routine::all(); 
      
        $strRetRoutines = ""; 
        for($i = 0; $i < count($objRoutines); $i++) {
            $strRetRoutines .= "<li><a href = \\".$objRoutines[$i]->callurl.">".$objRoutines[$i]->description."</a></li>"; 
        }


        return view('home', ['htmlRoutines' => $strRetRoutines]);
    }
}

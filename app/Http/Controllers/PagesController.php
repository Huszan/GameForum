<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To Game Forum';
        //return view(('pages.index'), compact('title'));
        return view('pages.index')->with('title',$title);
    }

    public function about(){
        $title = 'About';
        return view('pages.about')->with('title',$title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Uno','Dos','Tres']
        );
        return view('pages.services')->with($data); 
    }

    public function info(){
        return view('pages.phpinfo');
    }
}

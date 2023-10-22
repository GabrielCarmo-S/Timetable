<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends TimetableDefaultController
{
    private $title;
    private $titleContent;

    public function construct()
    {
        $this->title = "Instituto Mondelli de Odontologia";
        $this->titleContent = "Home";
    }

    public function home(Request $request)
    {
        return view('home', ['title' => $this->title, 'titleContent' => $this->titleContent]);
    }
}

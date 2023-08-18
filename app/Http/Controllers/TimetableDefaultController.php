<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class TimetableDefaultController extends Controller
{
    protected $response;
    protected $user;

    public function __construct(Request $request)
    {
        $this->response = new ResponseController();

        $this->construct();
    }
}

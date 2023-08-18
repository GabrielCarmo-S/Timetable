<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use stdClass;

class ResponseController extends Controller
{
    public function send($status, $data, $message, $errors = null)
    {
        $response = new stdClass();

        $response->status = $status;
        $response->data = $data;
        $response->message = $message;
        $response->errors = $errors;

        return $response;
    }
}

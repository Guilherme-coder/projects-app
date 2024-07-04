<?php

namespace App\Http\Controllers;

use App\Traits\HttpResponses;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    use HttpResponses;
    public function index(){
        return $this->response('exemple', 200);
    }
}

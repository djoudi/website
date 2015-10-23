<?php

namespace App\Http\Controllers\Site;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function mention(Request $request) {
        $user = User::all();
        return $user;
    }

    public function timePost(Request $request) {
        return $request->get('post');
    }
}

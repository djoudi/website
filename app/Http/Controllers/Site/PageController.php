<?php

namespace App\Http\Controllers\Site;

use App\Meetup;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home() {
        $meetups = Meetup::all()->chunk(4);
        return view('site.pages.home', compact('meetups'));
    }

    public function about() {

    }

    public function contact() {

    }

    public function faq() {

    }

    public function contribute() {

    }
}

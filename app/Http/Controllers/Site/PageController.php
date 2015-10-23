<?php

namespace App\Http\Controllers\Site;

use App\Awesome;
use App\Meetup;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home() {
        $meetups = Meetup::approved()->orderBy('created_at', 'desc')->take(4)->get();
        $awesomes = Awesome::approved()->orderBy('created_at', 'desc')->take(4)->get();
        return view('site.pages.home', compact('meetups', 'awesomes'));
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

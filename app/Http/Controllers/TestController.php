<?php

namespace App\Http\Controllers;

use App\Awesome;
use App\Meetup;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function newMeetup() {
        $meetup = new Meetup([
            'title' => 'Test und so',
            'image' => 'Test und so',
            'thumbnail' => 'http://placehold.it/500x300',
            'content' => 'Test und so',
            'city' => 'Test und so',
            'street' => 'Test und so',
            'housenumber' => 'Test und so',
            'zip' => 'Test und so',
            'approved' => '1'
        ]);
        auth()->user()->meetups()->save($meetup);
    }

    public function newList() {
        $list = new Awesome([
            'title' => 'Test und so',
            'image' => 'Test und so',
            'thumbnail' => 'http://placehold.it/500x300',
            'content' => 'Test und so',
            'url' => 'https://raw.githubusercontent.com/GrahamCampbell/Laravel-Markdown/master/README.md',
            'approved' => '1',
        ]);
        auth()->user()->lists()->save($list);
    }
}

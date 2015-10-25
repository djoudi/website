<?php

namespace App\Http\Controllers\Meetup;

use App\Meetup;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class MeetupController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $meetup = Meetup::findBySlug($slug);
        return view('meetups.view', compact('meetup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $meetup = Meetup::findBySlug($slug);
        if (Gate::denies('update', $meetup)) {
            alert()->error('You you don´ have access to this property.', 'Whoops! =(');
            return redirect()->intended('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $meetup = Meetup::findBySlug($slug);
        if (Gate::denies('update', $meetup)) {
            alert()->error('You you don´ have access to this property.', 'Whoops! =(');
            return redirect()->intended('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $meetup = Meetup::findBySlug($slug);
        if (Gate::denies('update', $meetup)) {
            alert()->error('You you don´ have access to this property.', 'Whoops! =(');
            return redirect()->intended('/');
        }

        $meetup->delete();
        alert()->success('Item successfully deleted.', 'Wahoo!');
        return redirect()->intended('/');
    }
}

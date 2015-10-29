<?php

namespace App\Http\Controllers\Awesome;

use App\Awesome;
use App\Http\Requests\ListRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

class AwesomeController extends Controller
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
        return view('lists.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListRequest $request)
    {
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.str_slug($request->get('title')).'.'.$file->getClientOriginalExtension();
            $request->file('image')->move('uploads/awesome', $filename);

            $thumbname = time().'_'.str_slug($request->get('title')).'_thumb.'.$file->getClientOriginalExtension();
            $thumbnail = Image::make('uploads/awesome/'.$filename)->fit(500, 300)->save('uploads/awesome/'.$thumbname);

            $list = new Awesome([
                'title' => $request->get('title'),
                'image' => $filename,
                'thumbnail' => 'uploads/awesome/'.$thumbname,
                'content' => $request->get('content'),
                'topic' => $request->get('topic'),
                'author' => $request->get('author'),
                'url' => $request->get('url'),
            ]);

            auth()->user()->lists()->save($list);
            alert()->success('List successfully created.', 'Wahoo!');
            return redirect()->intended('lists/list/'.$list->getSlug());
        } else {
            $list = new Awesome([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'topic' => $request->get('topic'),
                'author' => $request->get('author'),
                'url' => $request->get('url'),
            ]);

            auth()->user()->lists()->save($list);
            alert()->success('List successfully created.', 'Wahoo!');
            return redirect()->intended('lists/list/'.$list->getSlug());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $list = Awesome::findBySlug($slug);
        $file = file_get_contents($list->url);

        if (Cache::has('list_'.$list->id)) {
            $cached = Cache::get('list_'.$list->id);
            return view('lists.view', $cached);
        } else {
            $data = [
                'list'     => $list,
                'file'   => $file,
            ];

            $expiresAt = Carbon::now()->addMinutes(20);
            Cache::put('list_'.$list->id, $data, $expiresAt);
            return view('lists.view', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $list = Awesome::findBySlug($slug);
        if (Gate::denies('update', $list)) {
            alert()->error('You you don´ have access to this entry.', 'Whoops! =(');
            return redirect()->intended('/');
        }
        return view('lists.edit', compact('list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $list = Awesome::findOrFail($id);
        if (Gate::denies('update', $list)) {
            alert()->error('You you don´ have access to this entry.', 'Whoops! =(');
            return redirect()->intended('/');
        }

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.str_slug($request->get('title')).'.'.$file->getClientOriginalExtension();
            $request->file('image')->move('uploads/awesome', $filename);

            $thumbname = time().'_'.str_slug($request->get('title')).'_thumb.'.$file->getClientOriginalExtension();
            $thumbnail = Image::make('uploads/awesome/'.$filename)->fit(500, 300)->save('uploads/awesome/'.$thumbname);

            $list->update([
                'title' => $request->get('title'),
                'image' => $filename,
                'thumbnail' => 'uploads/awesome/'.$thumbname,
                'content' => $request->get('content'),
                'topic' => $request->get('topic'),
                'author' => $request->get('author'),
                'url' => $request->get('url'),
            ]);

            auth()->user()->lists()->save($list);
            alert()->success('List successfully created.', 'Wahoo!');
            return redirect()->intended('lists/list/'.$list->getSlug());
        } else {
            $list->update([
                'title' => $request->get('title'),
                'content' => $request->get('content'),
                'topic' => $request->get('topic'),
                'author' => $request->get('author'),
                'url' => $request->get('url'),
            ]);

            auth()->user()->lists()->save($list);
            alert()->success('List successfully updated.', 'Wahoo!');
            return redirect()->intended('lists/list/'.$list->getSlug());
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
        $list = Awesome::findBySlug($slug);
        if (Gate::denies('update', $list)) {
            alert()->error('You you don´ have access to this entry.', 'Whoops! =(');
            return redirect()->intended('/');
        }

        $list->delete();
        alert()->success('Item successfully deleted.', 'Wahoo!');
        return redirect()->intended('/');
    }

}

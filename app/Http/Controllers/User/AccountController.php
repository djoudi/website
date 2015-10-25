<?php

namespace App\Http\Controllers\User;

use App\User;
use Exception;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AccountController extends Controller
{
    public function getUpdate() {
        $user = auth()->user();
        return view('user.update', compact('user'));
    }

    public function postUpdate(Request $request, $id) {
        if($request->user()) {
            $user = User::findOrFail($id);

            if($user->id != $request->user()->id) {
                alert()->error('You can not update a profile you don´t own.', 'Whoops! =/');
            }

            if($request->hasFile('image')) {
                $oldfile = $user->avatar;
                try {
                    Storage::delete($oldfile);
                } catch (Exception $e) {

                }

                $file = $request->file('image');
                $filename = time().'_'.$request->user()->username.'.'.$file->getClientOriginalExtension();
                $request->file('image')->move('uploads/users', $filename);
                $user->update([
                    'username' => $request->get('username'),
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'avatar' => 'uploads/users/'.$filename
                ]);
            } else {
                $user->update([
                    'username' => str_slug($request->get('username'), '_'),
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                ]);
            }

            alert()->success('Changes successfully saved.', 'Wahoo!');

            return redirect()->intended('account/update');
        }
    }
}

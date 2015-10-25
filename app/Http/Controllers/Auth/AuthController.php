<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param Request $request
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $request = new Request();

        if($request->has('github_id')) {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => str_slug($data['username'], '_'),
                'github_id' => $data['github_id'],
                'avatar' => $data['avatar'],
                'password' => bcrypt($data['password']),
            ]);
        } elseif ($request->has('twitter_id')) {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => str_slug($data['username'], '_'),
                'twitter_id' => $data['twitter_id'],
                'avatar' => $data['avatar'],
                'password' => bcrypt($data['password']),
            ]);
        } else {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => str_slug($data['username'], '_'),
                'password' => bcrypt($data['password']),
            ]);
        }
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
            session()->put('comp_name', $user->name);
            session()->put('comp_username', str_slug($user->nickname, '_'));
            session()->put('comp_avatar', $user->avatar);
            session()->put('comp_github_id', $user->id);
        } catch (Exception $e) {
            return redirect('auth/complete');
        }

        $authUser = $this->findOrCreateGithubUser($user);

        if(!$user->email) {
            session()->put('comp_name', $user->name);
            session()->put('comp_username', str_slug($user->nickname, '_'));
            session()->put('comp_avatar', $user->avatar);
            session()->put('comp_github_id', $user->id);
            return redirect('auth/complete');
        }

        Auth::login($authUser, true);

        return Redirect::to('home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateGithubUser($githubUser)
    {
        if ($authUser = User::where('github_id', $githubUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $githubUser->name,
            'username' => str_slug($githubUser->nickname, '_'),
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar
        ]);
    }

    /**
     * Redirect the user to the Twitter authentication page.
     *
     * @return Response
     */
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Twitter.
     *
     * @return Response
     */
    public function handleTwitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            session()->put('comp_name', $user->name);
            session()->put('comp_username', str_slug($user->nickname, '_'));
            session()->put('comp_avatar', $user->avatar);
            session()->put('comp_twitter_id', $user->id);
        } catch (Exception $e) {
            return redirect('auth/complete');
        }

        $authUser = $this->findOrCreateTwitterUser($user);

        Auth::login($authUser, true);

        return Redirect::to('home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateTwitterUser($twitterUser)
    {
        if ($authUser = User::where('twitter_id', $twitterUser->id)->first()) {
            return $authUser;
        }

        session()->put('comp_name', $twitterUser->name);
        session()->put('comp_username', str_slug($twitterUser->nickname, '_'));
        session()->put('comp_avatar', $twitterUser->avatar);
        session()->put('comp_twitter_id', $twitterUser->id);

        return redirect('auth/complete');
    }

    public function getComplete() {
        return view('auth.complete');
    }

}

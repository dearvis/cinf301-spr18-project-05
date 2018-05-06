<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Image;

class UserController extends Controller
{

    public function getAccessDenied()
    {
        return view('error');
    }

    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'username' => 'required|max:75|min:8',
            'password' => 'required|max:75|min:8',
        ]);
        $email = $request['email'];
        $username = $request['username'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function postSignIn(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }


            public function getUserImage($request)
        {
            //Instance 1 did not work so made another way to try and retrieve image
            if($request->hashFile('img'))
            {
                $avatar = $request->file('img');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300,300)->save( Storage::disk('local')->put($filename, File::get($request)));
                $avatar = new avatar();
                $avatar->avatar_img = $filename;
                $avatar->save();
            }
            $file = Storage::disk('local')->get($filename);
            return new Response($file,200);

        }

    public function postSaveAccount(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|max:75'
        ]);
        $user = new user();
        $user->username = $request['username'];
        $user->update();
        $file = $request->file('img');
        $filename = $request['username'] . '-' . $user->id . '.jpg';
        if($file)
            {
               Storage::disk('local')->put($filename, File::get($file));
            }
            return redirect()->route('account');
    }
}

/**
 * Created by PhpStorm.
 * User: shadow
 * Date: 5/1/2018
 * Time: 1:19 AM
 */
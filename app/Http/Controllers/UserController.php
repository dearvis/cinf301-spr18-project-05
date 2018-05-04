<?php
namespace App\Http\Controllers;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }

    public function postSaveAccount(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|max:75'
        ]);
        $user = Auth::user();
        $old_name = $user->username;
        $user->username = $request['username'];
        $user->update();
        $file = $request->file('image');
        $filename = $request['filename'] . '-' . $user->id . '.jpg';
        $old_filename = $old_name . '-' . $user->id . '.jpg';
        $update = false;
        if($file)
            {
               Storage::disk(local)->put($filename, File::get($file));
            }
            if ($update && $old_filename !== $filename)
            {
                Storage::delete($old_filename);
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
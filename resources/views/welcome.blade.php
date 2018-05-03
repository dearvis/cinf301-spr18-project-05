
@extends('layouts.master')

@section('title')
        Welcome
@endsection

@section('content')
    @if(count($errors) > 0)
    <div class="row">
           <div class="col-md-3 col-md-offset-3">
             <ul>
                 @foreach($errors->all() as $error)
                     <li>{{$error}}</li>
                     @endforeach
             </ul>
           </div>

    @endif
               <div class="panel panel-login">
                   <div class="panel-heading">
                       <div class="row">
            <h3>Register</h3>
            <form action="{{ route('signup') }}" method="post">
                 <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">E-Mail</label>
                     <input class="form-control" type="text" name="email" id="email" placeholder="email address..."
                            value="{{ Request::old('email') }}">
                 </div>
                <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                         <label for="username">Username</label>
                         <input class="form-control" type="text" name="username" id="username" placeholder="username..."
                                value="{{ Request::old('username') }}">
                     </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="password...">
                </div>
                <label for="confirm-password">Confirm-password</label>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                          <input type="password" name="confirm-password" id="confirm-password" tabindex="2"
                             class="form-control" placeholder="Confirm Password">
                     </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="Register" id="Register" tabindex="4"
                               class="form-control btn btn-login" value="Register">
                    </div>
                </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
             </form>

    </div>
 </div>

 <div class="row">
    <div class="col-md-6 col-md-offset-3">

    </div>

        <h3>Log in</h3>

        <form action="{{ route('signin') }}" method="post">
            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                  <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" value="{{ Request::old('username') }}">
                </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <a href="#" tabindex="5"
                                   class="forgot-password">Forgot Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-sm-6 col-sm-offset-3">
                <input  type="submit" name="Login" id="Login"
                        tabindex="4" class="form-control btn btn-register"
                        value="Login">
               <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>
        </form>
    </div>
 </div>
    </div>




@endsection

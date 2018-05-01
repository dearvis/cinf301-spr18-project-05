
@extends('layouts.master')

@section('title')
        Welcome
@endsection

@section('content')
       <div class="row">
        <div> class="col-md-6">
             <form action="#" method="post">
                 <div class="form-group">
                     <h3>Register</h3>
                    <label for="email">E-Mail</label>
                     <input class="form-control" type="text" name="email" id="email">
                 </div>
                     <div class="form-group">
                         <label for="username">Username</label>
                         <input class="form-control" type="text" name="username" id="username">
                     </div>
                         <div class="form-group">
                             <label for="password">Password</label>
                             <input class="form-control" type="password" name="password" id="password">
                         </div>
                     <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </div>
    </div>



    <div class="row">
        <div> class="col-md-6">
            <form action="#" method="post">
                <div class="form-group">
                    <h3>Log in</h3>
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <div class="form-group">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

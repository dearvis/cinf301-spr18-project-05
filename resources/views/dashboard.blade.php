@extends('layouts.master')

@section('title')
    Homepage
@endsection

@section('content')
   <section class="row new-post">
       <div class="col-md-6 col-md-offset-3">
           <header><h3>Hey, Whats on your mind?</h3></header>
           <form action="">
               <div class="form-group">
                   <textarea class="form-control" name="new-post" id="new-post" rows="5" placeholder="Your Post"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Send Post</button>
           </form>
       </div>
   </section>
 @endsection
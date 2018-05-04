@extends('layouts.master')

@section('title')
    Homepage
@endsection

@section('content')
    @include('includes.message-validation')
   <section class="row new-post">
       <div class="col-md-6 col-md-offset-3">
           <header><h3>Hey, whats on your mind?</h3></header>
           <form action= "{{ route('post.create') }}" method="post">
               <div class="form-group">
                   <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Send Post</button>
               <input type="hidden" value="{{ Session::token() }}" name="_token">
           </form>
       </div>
   </section>
        <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header> <h3>What other people say...</h3></header>
           @foreach($post as $post)
                <article class="post">
                    <p> {{ $post->body }}</p>
                    <div class="info">
                        Posted by {{ $post->user->username }} on {{ $post->user->created_at }}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a> |
                        @if(Auth::user() == $post->user)
                            |
                        <a href=" {{ route('post.delete',['post_id' => $post->id]) }} ">Delete</a> |
                    @endif
                    </div>
                </article>
               @endforeach
            <article class="post">
                <p> I personally believe that Bubblesort is hands down the best sorting algorithm ever!!!</p>
                <div class="info">
                    Posted by Jerry on 3 May 2018
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Delete</a> |
                </div>
            </article>
        </div>
    </section>
 @endsection

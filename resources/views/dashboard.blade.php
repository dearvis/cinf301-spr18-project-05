@extends('layouts.master')

@section('title')
    Homepage
@endsection

@section('content')
    @include('includes.message-validation')
   <section class="row new-post">
       <div class="col-md-6 col-md-offset-3">
           <header><h3>Hey, Join the conversation below?</h3></header>
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

        </div>
    </section>
 @endsection

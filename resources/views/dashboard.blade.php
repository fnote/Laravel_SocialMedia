@extends('layouts.master')

@section('content')
    @include('includes.message-block')
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>what do you have to say</h3></header>
                <form action="{{route('post.create')}}" method="post">
                    <div class="form-group">

                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="your posts here"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create post</button>
                    <input type="hidden" name="_token" value="{{Session::token()}}">

                </form>

        </div>
    </section>


    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>what other people say</h3></header>
            @foreach($posts as $post)
                <article class="post">

                    <p>{{$post->body}}</p>
                    <div class="info">
                        posted by {{$post->user->first_name}}
                    </div>
                    <div class="interaction">
                            <a href="#">Like |</a>
                            <a href="#">Dislike |</a>


                        @if(Auth::user()==$post->user)
                            <a href="#">Edit</a>
                            <a href="{{route('post.delete',['post_id'=>$post->id])}}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach

           {{--<form action="{{route('post.create')}}" method="post">--}}
                {{--<div class="form-group">--}}

                    {{--<textarea class="form-control" name="body" id="new-post" rows="5" placeholder="your posts here"></textarea>--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-primary">Create post</button>--}}
                {{--<input type="hidden" name="_token" value="{{Session::token()}}">--}}

            {{--</form>--}}

        </div>
    </section>
    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
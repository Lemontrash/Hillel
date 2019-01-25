@extends('basicLayout')

@section('content')
    <h1>THE POST NUMBER {{$post->id}}</h1>
    <hr>
    <div class="card mb-6">
        <img class="card-img-top" src="{{$post->pic}}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{$post->content}}</p>
            @if(Auth::guard('web')->check())
                <a href="{{URL::to('post/'.$post->id.'/like')}}">♥ {{$post->likes->count()}}</a>
            @endif
        </div>
        @if(Auth::guard('web')->check())


        <hr>
        <h1>COMMENT SECTION</h1>
        <hr>

        @foreach($comments as $comment)
            <div class="card-body">
                <h2 class="card-title">{{$comment->user->login}}</h2>
                <p class="card-text">{{$comment->body}}</p>
                <p class="card-text">At: {{$comment->created_at}}</p>
                @if(Auth::guard('web')->check())
                    <a href="{{URL::to('comment/'.$comment->id.'/like')}}">♥ {{$comment->likes->count()}}</a>
                @endif
            </div>
            <hr>
        @endforeach
        <form method="get" action="{{URL::to('post/'.$post->id).'/createComment'}}" class="login">
            @csrf
            <br><br>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Add comment') }}</label>
                <p>
                    <textarea placeholder="..." name="body" id="body"></textarea>
                </p>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add') }}
                    </button>
                </div>
            </div>
        </form>
        @endif

@endsection

@section('footer')
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>
@endsection

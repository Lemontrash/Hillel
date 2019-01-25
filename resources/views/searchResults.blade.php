

@extends('basicLayout')

@section('content')
    <div class="container">

        <div class="row">
            <br>
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Посты по запросу<br>
                </h1>

                @foreach($posts as $post)
                    <div class="card mb-4">
                        <img class="card-img-top" src="{{$post->pic}}" alt="Card image cap">
                        <div class="card-body">
                            <h2 class="card-title">{{$post->title}}</h2>
                            <p class="card-text">{{$post->content}}</p>
                            <a href="{{ URL::to('post/'.$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{$post->created_at}}, by
                            <a href="#">{{$post->user->login}}(поменгять потом с логина на юзернейм)</a><br>
                            @if(Auth::guard('web')->check())
                                <a href="{{URL::to('post/'.$post->id.'/like')}}">♥ {{$post->likes->count()}}</a>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" value="{{$counter++}}">
                @endforeach
                <!-- Blog Post -->
                @if($counter == 0)
                    <h1>Ничего не нашлось :(</h1>
                @endif

            </div>

        </div>
        <!-- /.row -->
    </div>
@endsection

@section('footer')
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>
@endsection

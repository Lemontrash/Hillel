

@extends('basicLayout')

@section('content')
    <div class="container">

        <div class="row">
            <br>
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Твои посты <br>
                </h1>
                @if($posts == null)
                    <h1>Тут ничего нет!</h1>
                    @else
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
                        <input type="hidden" value="{{$counter[] = $post->likes->count()}}{{$titlefounder[] = $post->title}}">
                    @endforeach
                @endif

                <!-- Blog Post -->
                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

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

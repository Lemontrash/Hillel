

@extends('basicLayout')

@section('content')
    <div class="container">

        <div class="row">
            <br>
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">H E L P <br>
                    <form method="post" action="{{route('search')}}">
                        @csrf
                    <div class="active-cyan-4 mb-4">
                        <input class="form-control" type="text" placeholder="Введите заголовок искомого поста" aria-label="Search" name="search" id="search" >
                        <button type="submit" class="btn btn-primary" >
                            🔍&rarr;
                        </button>

                    </div>
                    </form>
                    @if($userRole == 'admin')
                        <a href="{{route('admin')}}" class="btn btn-primary">Админка &rarr;</a>
                    @endif
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
                    <input type="hidden" value="{{$counter[] = $post->likes->count()}}{{$titlefounder[] = $post->title}}">
                @endforeach
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

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Side Widget -->
                @if(Auth::guard('web')->check())
                    <div class="card my-4">
                        <h5 class="card-header">Мини ЛК</h5>
                        <div class="card-body">
                            Hello, <a href="{{URL::to('user/'.$user)}}">{{\Auth::user()->login}}!</a> <br>
                            Your total reputation is {{$reputation}}
                            <br>
                            <a href="{{route('userCreatePost')}}" class="btn btn-primary">New Post! &rarr;</a>
                            <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                    @else
                    <div class="card my-4">
                        <h5 class="card-header">Мини ЛК</h5>
                        <div class="card-body">
                            Log in to see info
                        </div>
                    </div>
                @endif

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Новость дня</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Post title</p>
                                <ul class="list-unstyled mb-0">

                                    <li>
                                        <a href="#">{{$titlefounder[array_search(max($counter), $counter)]}}</a>
                                    </li>

                                </ul>

                            </div>
                            <div class="col-lg-6">
                                <p>Post rating</p>
                                <ul class="list-unstyled mb-0">

                                    <li>
                                        <a href="#">{{max($counter)}}</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
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

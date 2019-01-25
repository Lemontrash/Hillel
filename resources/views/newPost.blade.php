

@extends('basicLayout')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-1">
            </div>
            <div class="col-md-9" style="text-align: center">
                <h1 class="my-4"><br>
                    Create a new post! <br>
                    нужно допилить размеры по пикчам
                </h1>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <form method="post" action="{{route('userCreatePostToDb')}}" class="login">
                            @csrf
                            <br><br>
                            <div class="form-group row">
                                <label for="Thumbnail link" class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail link') }}</label>
                                <div class="col-md-6">
                                    <input id="pic" type="text" class="form-control" name="pic" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Title" class="col-md-4 col-form-label text-md-right">Title</label>
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Content" class="col-md-4 col-form-label text-md-right">Content</label>
                                <div class="col-md-6">
                                    <textarea placeholder="..." cols="74" rows="10"  class="form-control" name="content" id="content"></textarea>
                                </div>
                            </div>
                                <div class="form-group row" >
                                    <div class="col-md-6" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary"  >
                                            {{ __('Create new post!') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                </div>

            </div>
            <div class="col-md-1">
            </div>

            <!-- Sidebar Widgets Column -->


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

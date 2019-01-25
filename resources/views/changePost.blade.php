

@extends('basicLayout')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('admin')}}" class="btn btn-primary">back</a>
        </div>
        <div class="row">
            <form method="post" action="{{route('changePostToDb')}}" class="login">
                @csrf
                <select name="id" id="id">
                    @foreach($posts as $post)
                        <option value="{{$post->id}}">{{$post->id}}</option>
                    @endforeach
                </select>
                <br><br>
                <div class="form-group row">
                    <label for="Thumbnail link" class="col-md-4 col-form-label text-md-right">{{ __('Thumbnail link') }}</label>
                    <div class="col-md-6">
                        <input id="pic" type="text" class="form-control" name="pic" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Title" class="col-md-4 col-form-label text-md-right">Title</label>
                    <div class="col-md-6">
                        <input id="title" type="text" class="form-control" name="title" >
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
        <
@endsection

@section('footer')
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>
@endsection

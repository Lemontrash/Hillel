

@extends('basicLayout')

@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('admin')}}" class="btn btn-primary">back</a>
        </div>
        <div class="row">
            <div class="row">
                <form method="post" action="{{route('deletePostToDb')}}" class="login">
                    @csrf
                    <select name="id" id="id">
                        @foreach($posts as $post)
                            <option value="{{$post->id}}">{{$post->id}}</option>
                        @endforeach
                    </select>
                    <div class="form-group row" >
                        <div class="col-md-6" style="text-align: center;">
                            <button type="submit" class="btn btn-primary"  >
                                {{ __('Delete!') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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

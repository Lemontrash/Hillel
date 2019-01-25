

@extends('basicLayout')

@section('content')
    <div class="container">
        <div class="row">

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Новость дня</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p></p>
                                <a href="{{route('changePost')}}" class="btn btn-primary">Изменить пост</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <h5 class="card-header">Новость дня</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p></p>
                                <a href="{{route('deletePost')}}" class="btn btn-primary">Удалить пост</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <h5 class="card-header">Новость дня</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p></p>
                                <a href="{{route('changeComment')}}" class="btn btn-primary">Изменить комментарий</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card my-4">
                    <h5 class="card-header">Новость дня</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <p></p>
                                <a href="{{route('deleteComment')}}" class="btn btn-primary">Удалить комментарий</a>
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

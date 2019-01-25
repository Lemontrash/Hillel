

@extends('basicLayout')

@section('content')
    <div class="container">

        <div class="row">
            <br>
            <!-- Blog Entries Column -->
            <div class="col-md-1">
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-12">
                <!-- Side Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Привет!</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <p>Hello,</p>
                                    {{\Auth::user()->login}}!<br>
                                    Your total repotation is {{$reputation}}
                                </div>
                                <div class="col-lg-6" style="text-align: center;">
                                    <p></p>
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{route('userCreatePost')}}" class="btn btn-primary">New Post! &rarr;</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6" style="text-align: center;">
                                    <p></p>
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{route('changePersonalInformation')}}" class="btn btn-primary">Change Bio</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6" style="text-align: center;">
                                    <p></p>
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{ route('showChangePost') }}" class="btn btn-primary">Изменить пост</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6" style="text-align: center;">
                                    <p></p>

                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{ route('showDeletePost') }}" class="btn btn-primary">Удалить пост</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6" style="text-align: center;">
                                    <p></p>
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{ route('showDeleteComment') }}" class="btn btn-primary">Удалить комментарий</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6" style="text-align: center;">
                                    <p></p>
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{ route('showChangeComment') }}" class="btn btn-primary">Изменить комментарий</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6" style="text-align: center;">
                                <p></p>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('allPosts') }}" class="btn btn-primary">Мои посты</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6" style="text-align: center;">
                                <p></p>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        </div>
                    </div>




                <div class="col-md-1">
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

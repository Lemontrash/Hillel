@extends('basicLayout')



@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('SignUp')}}" class="login">
        @csrf
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="name@example.com">
        </p>
        <p>
            <label for="login">Логин :</label>
            <input type="text" name="login" id="login" placeholder="Для входа на сайт">
        </p>
        <p>
            <label for="username">Юзернейм :</label>
            <input type="text" name="username" id="username" placeholder="Будет отображаться на сайте"> (опционально)
        </p>
        <p>
            <label for="password-1">Пароль:</label>
            <input type="password" name="password-1" id="password-1" placeholder="******">
        </p>
        <p>
            <label for="password-2">Пароль еще раз:</label>
            <input type="password" name="password-2" id="password-2" placeholder="******">
        </p>

        <p class="login-submit">
            <button type="submit" class="login-button">Войти</button>
        </p>

        КАПЧА
    </form>
@endsection

@section('footer')
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
        </div>
        <!-- /.container -->
    </footer>
@endsection

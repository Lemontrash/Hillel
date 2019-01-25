@extends('basicLayout')



@section('content')

    <form method="post" action="" class="login">
        <p>
            <label for="login">Логин:</label>
            <input type="text" name="login" id="login" placeholder="name@example.com">
        </p>

        <p>
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password" placeholder="4815162342">
        </p>

        <p class="login-submit">
            <button type="submit" class="login-button">Войти</button>
        </p>

        <p class="forgot-password"><a href="index.html">Забыл пароль?</a></p>

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

@extends('basicLayout')



@section('content')
    <div class="card">
        <div class="card-header">{{ __('Contact US') }}</div>
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
                <form method="post" action="{{route('message')}}" class="login">
                    @csrf
                    <br><br>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" placeholder="name@example.com" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" placeholder="John" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>
                        <p>
                            <textarea placeholder="..." cols="64"  class="form-control" name="message" id="message"></textarea>
                        </p>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6" style="text-align: center;">
                            <button type="submit" class="btn btn-primary" >
                                {{ __('Enter') }}
                            </button>
                        </div>

                    </div>

                    <div class="g-recaptcha" data-sitekey="6Ld81YsUAAAAAGVUt2lneft2Yuz7K47cbDFRz4v2"></div>
                </form>
        </div>
    </div>
@endsection


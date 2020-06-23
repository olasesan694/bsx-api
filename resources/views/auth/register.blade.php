@extends('layouts.app')

@section('content')

    <section id="top-half">
        
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        {{-- <div class="card-header">{{ __('Register') }}</div> --}}
                        <div class="card-header">Register to see or accept invitations.</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="domain" class="col-md-4 col-form-label text-md-right"> Company account? </label>

                                    <div class="col-md-6">
                                        <input type="checkbox" id="forcompanycheckbox" onclick="showCompanyEmail()">
                                    </div>
                                </div>
                                <div id="forcompany" style="display:none" class="form-group row">
                                    <label for="domain" class="col-md-4 col-form-label text-md-right"> Website url </label>

                                    <div class="col-md-6">
                                        <input id="domain" type="text" class="form-control @error('domain') is-invalid @enderror" name="domain" value="{{ old('domain') }}" placeholder="https://www.example.com" required autocomplete="domain">

                                        @error('domain')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Only Digits. 10 Digits." required autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn-register">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function showCompanyEmail() {
                var checkBox = document.getElementById("forcompanycheckbox");
                var incdomain = document.getElementById("forcompany");
                if (checkBox.checked == true){
                    incdomain.style.display = "block";
                } else {
                    incdomain.style.display = "none";
                }
            }
        </script>
    </section>

    <section id="bottom-half">
        <div class="container">
            <div class="content">

            </div>
        </div>
        <div class="footer">
            <p>&COPY; Brisebox 2020</p>
        </div>
    </section>
@endsection

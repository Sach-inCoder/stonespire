<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    @if(setting_asset('favicon'))

    <link
        rel="icon"
        type="image/png"
        href="{{ setting_asset('favicon') }}">

    @endif
    <title>Admin Login</title>
    <style>
        :root{
            --primary:#ffb400;
            --black:#212529;
        }
        body{
            display: flex;
            min-height: 100dvh;
            justify-content: center;
            align-items: center;
            background: var(--black);
        }
        .login_logo{
            max-width: 300px;
        }
    </style>
</head>

<body>
    <div class="container h-100">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center mb-3">
                    @if(setting_asset('logo'))

                    <img
                        src="{{ setting_asset('logo') }}"
                        class="login_logo"
                        alt="{{ setting('website_name', 'Stonespire Graphics') }}">

                    @else

                    <img
                        src="{{ asset('assets/images/logo-new.png') }}"
                        class="login_logo"
                        alt="Stonespire Graphics">

                    @endif
                </div>
                <div class="card">
                    <div class="card-header">
                        Admin Login
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="">
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger mb-1">{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif
                        <form method="POST" action="{{ route('admin.login.submit') }}">
                            @csrf
                            <div class="mb-3">
                                <label>Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label>
                                    <input
                                        type="checkbox"
                                        name="remember"
                                        value="1">
                                    Remember me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
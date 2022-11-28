<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Male Fashion - Sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/logoWebsite.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
        integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous">
    </script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'>
    <link rel="stylesheet" href="css/login_style.css">
    <link rel="stylesheet" href="css/button_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <div id="login-form">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-7">
                    <form action="{{ url('customerChangePassword') }}" method="post">
                        @csrf
                        <h3 class="login-header" style="text-align: center; font-size:40px">Changing password</h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('fail') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="oldPassword">Old password:</label>
                            <input id="oldPassword" type="Password" class="form-control" placeholder="Password" name="oldPassword">
                        </div>
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="newPass">New password:</label>
                            <input id="newPass" type="password" class="form-control" placeholder="New password"
                                name="password">
                        </div>
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="confPass">Confirm password:</label>
                            <input id="confPass" type="password" class="form-control" placeholder="Confirm password"
                                name="confirmPassword">
                        </div>
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <button class="btn btn-primary btn-lg btn-block submit custom-btn btn-3"><span>Change</span></button>
                    </form>
                    <div class="row">
                        <div class="col text-center">
                            {{-- <a href="#" class="forgot-pass">Forgot password?</a> --}}
                            <a href="{{ url('/') }}" class="home" style="text-decoration: none">
                                <button class="custom-btn btn-1">To home
                                    page</button>
                                </a>
                        </div>
                    </div>

                </div>
                {{-- <div class="col-lg-5">
				<button class="btn btn-block social-login facebook">
					<span class="social-icons">
						<i class="fab fa-facebook-square fa-lg">
						</i>
					</span>
					<span class="align-middle">Login with Facebook</span>
				</button>
				<button class="btn btn-block social-login google">
					<span class="social-icons">
						<i class="fab fa-google fa-lg">
						</i>
					</span>
					<span class="align-middle">Login with Google</span>
				</button>
			</div> --}}
            </div>
        </div>
    </div>
    <!-- partial -->

</body>

</html>

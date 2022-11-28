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
    <link rel="stylesheet" href={{ asset('css/login_style.css') }}>
    <link rel="stylesheet" href={{ asset('css/button_style.css') }}>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <div id="login-form">
            <div class="row" style="justify-content: center;">
                <div class="col-lg-7">
                    <form action="{{ url('saveCustomer') }}" method="post">
                        @csrf
                        <?php if (Session::has('data')) {
                            $data = Session::get('data');
                            $_SESSION['social'] = 'You seem to have a new account, please add in your details first!';
                        } ?>
                        <h3 class="login-header" style="text-align: center; font-size:40px">Create a new account</h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (!empty($social))
                            <div class="alert alert-primary" role="alert">
                                {{ $social }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input id="username" type="text" class="form-control" placeholder="Username"
                                name="userName" value="{{old('userName')}}">
                        </div>
                        @error('userName')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input id="password" type="password" class="form-control" placeholder="Password"
                                name="password">
                        </div>
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="confPass">Confirm password:</label>
                            <input id="confPass" type="password" class="form-control" placeholder="Confirm Password"
                                name="confirmPassword">
                        </div>
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input id="name" type="text" class="form-control" placeholder="Name" name="name"
                                value="{{old('name') }}">
                        </div>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" type="email" class="form-control" placeholder="Demo@gmail.com"
                                name="email" value="{{old('email') }}">
                        </div>
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="phone">Phone number:</label>
                            <input id="phone" type="text" class="form-control" placeholder="0123456789"
                                name="phone" value="{{ old('phone') }}">
                        </div>
                        @error('phone')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input id="address"type="text" class="form-control" placeholder="Address"
                                name="address" value="{{ old('address') }}">
                        </div>
                        @error('address')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <p>Gender :
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="male">Female</label>
                            <input type="radio" id="other" name="gender" value="other">
                            <label for="male">Other</label>
                        </p>
                        @error('gender')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="dob">Date of birth:</label>
                            <input id="dob" type="date" class="form-control" placeholder="Birth Day"
                                name="DoB" value="{{ old('DoB') }}">
                        </div>
                        @error('DoB')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <button class="btn btn-primary btn-lg btn-block submit custom-btn btn-3"><span>Sign
                                up</span></button>
                    </form>
                    <div class="row">
                        <div class="col text-center ">
                            <a href="{{ url('customerLogin') }}" class="home">
                                <button class="custom-btn btn-1" style="text-decoration: none">Login now</button>
                            </a>
                            {{-- <a class="register" href="#">Register now</a> --}}
                        </div>
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

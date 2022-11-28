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
                    <form action="{{ url('updateProfile') }}" method="post">
                        @csrf
                        <h3 class="login-header" style="text-align: center; font-size:40px">Update account information
                        </h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input id="name" type="text" class="form-control" placeholder="Name" name="name"
                                value="{{ $data->Customer_Name }}" <?php echo session()->get('loggedWith') === 'google' ? "readonly" : '' ?>>
                        </div>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="phone">Phone number:</label>
                            <input id="phone" type="text" class="form-control" placeholder="0123456789"
                                name="phone" value="{{ $data->Phone }}">
                        </div>
                        @error('phone')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input id="address"type="text" class="form-control" placeholder="Address"
                                name="address" value="{{ $data->Address }}">
                        </div>
                        @error('address')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <p>Gender :
                            <input type="radio" id="male" name="gender" value="male" <?php echo $data->Gender == 'male' ? 'checked' : ''; ?>>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female" <?php echo $data->Gender == 'female' ? 'checked' : ''; ?>>
                            <label for="male">Female</label>
                            <input type="radio" id="other" name="gender" value="other" <?php echo $data->Gender == 'other' ? 'checked' : ''; ?>>
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
                                name="DoB" value="{{ $data->Date_of_Birth }}">
                        </div>
                        @error('DoB')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (session()->get('loggedWith') === 'google' && Hash::check("EmptyPasswordForGoogleAccount", $data->Customer_Password))
                            <input id="password" type="hidden" class="form-control" name="password" value="EmptyPasswordForGoogleAccount">
                        @else
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input id="password" type="password" class="form-control"
                                    placeholder="Password to confirm changes" name="password">
                            </div>
                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif

                        <button
                            class="btn btn-primary btn-lg btn-block submit custom-btn btn-3"><span>Update</span></button>
                    </form>
                    <div class="row">
                        <div class="col text-center">
                            {{-- <a href="#" class="forgot-pass">Forgot password?</a> --}}
                            <a href="{{ url('/') }}" class="home" style="text-decoration: none">
                                <button class="custom-btn btn-1">To home page</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- partial -->

</body>

</html>

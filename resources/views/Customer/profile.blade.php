@include('Header')

<head>
    <title>Contact</title>
</head>

{{-- Đống icon nha
<i class="far fa-user-circle"></i> Username
<i class="fas fa-address-card"></i> Name
<i class="fas fa-envelope"></i> Email
<i class="fas fa-phone"></i> Phone
<i class="fas fa-home"></i> Address
<i class="fas fa-user"></i> Gender
<i class="fas fa-birthday-cake"></i> Birthday --}}

@if (Session::has('customerLoginID'))
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            @if ($data->Gender == 'male')
                                <img src="../img/ProfilePics/Placeholder_PFP_Male.jpg" class="rounded-circle img-fluid"
                                    style="width: 273px;">
                            @elseif ($data->Gender == 'female')
                                <img src="../img/ProfilePics/Placeholder_PFP_Female.jpg" class="rounded-circle img-fluid"
                                    style="width: 273px;">
                            @else
                                <img src="../img/ProfilePics/Placeholder_PFP_Other.png" class="rounded-circle img-fluid"
                                    style="width: 273px;">
                            @endif
                            <h2 class="my-3">{{ $data->Customer_Name }}</h2>
                            <h3 class="text-muted mb-1">{{ $data->Customer_Username }}</h3>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <a class="btn btn-primary" href="{{ url('editProfile') }}">Update information</a>
                            @if (session()->get('loggedWith' !== 'google'))
                                <a class="btn btn-primary" href="{{ url('customerEditPassword') }}">Change password</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body" style="font-size:20px;">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><i class="fas fa-address-card"></i> | Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $data->Customer_Name }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><i class="fas fa-envelope"></i> | Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $data->Email }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><i class="fas fa-phone"></i> | Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $data->Phone }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><i class="fas fa-home"></i> | Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $data->Address }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><i class="fas fa-user"></i> | Gender</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $data->Gender }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><i class="fas fa-birthday-cake"></i> | Birthday</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ date('d/m/Y', strtotime($data->Date_of_Birth)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
@else
    <p>Looks like you have not logged in yet! To see your own profile you need to
        <a href="{{ url('customerLogin') }}" style="color: #23B35A">Login here</a> or
        <a href="{{ url('customerRegister') }}"style="color: #23B35A">Sign up here</a>.
    </p>
@endif



{{-- <!-- Start Contact -->
<div class="container py-5">
</div>
<!-- End Contact --> --}}


@include('Footer')

<!-- Start Script -->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/templatemo.js"></script>
<script src="js/custom.js"></script>
<!-- End Script -->
</body>

</html>

@include('Header')

<head>
    <title>Male Fashion</title>
</head>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="img/banner_img_01.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success">Male fashion</h1>
                            <h3 class="h2">Cras eu enim imperdiet, tristique quam.</h3>
                            <p>
                                Donec nec eros ante. Morbi vitae libero eget ex egestas pharetra id id lectus.
                                Pellentesque tempor convallis pharetra. Nullam in scelerisque arcu, quis bibendum
                                leo. Nunc laoreet quis nibh vel luctus. Fusce ac est ac.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="img/banner_img_02.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Proident occaecat</h1>
                            <h3 class="h2">Aliquip ex ea commodo consequat</h3>
                            <p>
                                You are permitted to use this Zay CSS template for your commercial websites.
                                You are <strong>not permitted</strong> to re-distribute the template ZIP file in any
                                kind of template collection websites.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="img/banner_img_03.jpg" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Repr in voluptate</h1>
                            <h3 class="h2">Ullamco laboris nisi ut </h3>
                            <p>
                                We bring you 100% free CSS templates for your websites.
                                If you wish to support TemplateMo, please make a small contribution via PayPal or
                                tell your friends about our website. Thank you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
        role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories-->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Featured Categories</h1>
            <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <div class="row" style="justify-content: center">
        @foreach ($categoriesF as $cat)
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="{{ url('category/' . $cat->Category_ID) }}"><img
                        style="
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        width: 70%;"
                        src="img/categories/{{ $cat->Category_Image }}" class="rounded-circle img-fluid border"
                        style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;">
                </a>
                <h5 class="text-center mt-3 mb-3">{{ $cat->Category_Name }}</h5>
                <p class="text-center"><a class="btn btn-success" href="{{ url('category/' . $cat->Category_ID) }}"
                        style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;">Go Shop</a></p>
            </div>
        @endforeach
    </div>
</section>
<!-- End featured Categories-->

@include('Footer')

<!-- Start Script -->
<script src="js/JSHomePage/jquery-1.11.0.min.js"></script>
<script src="js/JSHomePage/jquery-migrate-1.2.1.min.js"></script>
<script src="js/JSHomePage/bootstrap.bundle.min.js"></script>
<script src="js/JSHomePage/templatemo.js"></script>
<script src="js/JSHomePage/custom.js"></script>
<!-- End Script -->
</body>

</html>

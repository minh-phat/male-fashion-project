<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Edit Product</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logoWebsite.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('vendor/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/css/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/css/apex-charts.css') }}" />

    <!-- Kit code for icons -->
    <script src="https://kit.fontawesome.com/1c6258baf1.js" crossorigin="anonymous"></script>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('vendor/js/config.js') }}"></script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('vendor/js/jquery.js') }}"></script>
    <script src="{{ asset('vendor/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/js/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('vendor/js/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('vendor/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('vendor/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="" class="app-brand-link"> <!--! Input link here -->
              <span class="app-brand-text menu-text fw-bolder ms-2"><img src="{{ asset('img/android-icon-36x36.png') }}"></span>
              <span class="app-brand-text menu-text fw-bolder ms-2">MF Manager</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="app-brand-1 demo-1">
            @if (Session()->has('LoginID'))
                <div class="welcome"
                    style="magin-top: 12px; background-color: white; color:rgb(35, 179, 90); display:inline-block">
                    <p style="margin-right: 1px"><i class="fas fa-user-tie"></i> | <?php echo session()->get('Name'); ?></p>
                    {{-- username --}}
                </div>
                <a style="margin-left: 10px;" class="nav-icon position-relative text-decoration-none"
                    href="{{ url('adminLogOut') }}">
                    <i class="fas fa-sign-out-alt fa-lg"></i>
                </a>
            @else
                <a class="nav-icon position-relative text-decoration-none" href="{{ url('loginAdmin') }}">
                    <i class="fa fa-fw fa-user text-dark mr-3"></i>
                </a>
            @endif
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
                <a href="{{ url('dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-solid fa-house"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>

            <!-- Accounts -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Accounts</span>
            </li>
            {{-- Admins --}}
            <li class="menu-item">
                <a href="{{ url('listAdmin') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-solid fa-user"></i>
                    <div data-i18n="Admins">Admins</div>
                </a>
            </li>
            {{-- Customers --}}
            <li class="menu-item">
                <a href="{{ url('listCustomer') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-solid fa-people-group"></i>
                    <div data-i18n="Customers">Customers</div>
                </a>
            </li>

            <!-- Products -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Products</span>
            </li>
            <!-- Categories -->
            <li class="menu-item">
                <a href="{{ url('listCategory') }}" class="menu-link">
                    <i class="menu-icon tf-icons fa-solid fa-arrow-down-short-wide"></i>
                    <div data-i18n="Categories">Categories</div>
                </a>
            </li>
            <!-- Products -->
            <li class="menu-item active">
              <a href="{{ url('listProduct') }}" class="menu-link">
                <i class="menu-icon tf-icons fa-solid fa-shirt"></i>
                <div data-i18n="Products">Products</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->
    <div class="layout-page">
        <div class="container" style="margin-top: 20px;">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit product</h2>
                    <hr style="width: 500px;">
                    {{-- Notification --}}
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form action="{{ url('updateProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->Product_ID }}">

                        {{-- Enter product name --}}
                        <div class="md-3">
                            <label for="name" class="form-label">Product Name</label>
                            <textarea type="number" name="name" class="form-control" style="width: 500px; height:75px">{{ $data->Product_Name }}</textarea>
                        </div>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Choose product category --}}
                        <div class="md-3">
                            <label for="category" class="form-label">Category</label>
                            <select name="category" class="form-control form-select" value="{{ $data->Category_ID }}"
                                style="width: 200px">
                                @foreach ($category as $row)
                                    <option value="{{ $row->Category_ID }}">{{ $row->Category_Name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Enter product price --}}
                        <div class="md-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Product price"
                                value="{{ $data->Price }}" style="width: 150px">
                        </div>
                        @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Enter product details --}}
                        <div class="md-3">
                            <label for="details" class="form-label">Details</label>
                            <textarea type="number" name="details" class="form-control" placeholder="Enter product details"
                                style="width: 500px; height:150px">{{ $data->Details }}</textarea>
                        </div>
                        @error('details')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="md-3">

                            <?php
                            $imgArr = explode('@@@', $data->Images);    //split data images up for display
                            ?>
                            <label for="current">Current images:</label>
                            <div id="current" style="width:fit-content; " class="form-control">
                                @foreach ($imgArr as $img)
                                    <img src={{ '../img/products/' . $img }} width="210" height="210"
                                        style="border-radius: 10px;border: 1px solid #ced4da;">
                                @endforeach
                            </div>
                            <label for="preview">New images: </label>
                            <div id="preview" style="width:240px;height:228px;margin-bottom:5px" class="form-control"></div>  {{-- preview area --}}                    
                            <input type="file" name="images[]" class="form-control" multiple style="width: 350px"   {{--File inputs--}}
                            id="file-input">
                            {{-- Script to preview multiple uploaded images --}}

                            <script>
                                function previewImages() {
                                    var preview = document.querySelector('#preview');
                                    preview.innerHTML = ''; //clear previous previews
                                    preview.style =
                                        "width:fit-content;margin-bottom:5px"; //change the preview <div> style to fit the new childs (images in this case)
                                    if (this.files) {
                                        [].forEach.call(this.files, readAndPreview);
                                    }

                                    function readAndPreview(file) {
                                        // Make sure `file.name` matches our extensions criteria
                                        if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                                            return alert(file.name + " is not an image");
                                        }
                                        var reader = new FileReader();
                                        reader.addEventListener("load", function() {
                                            var image = new Image();
                                            image.height = 210;
                                            image.width = 210;
                                            image.title = file.name;
                                            image.style = "border-radius: 10px;border: 1px solid #ced4da" //image attributes
                                            image.src = this.result;
                                            preview.appendChild(image);
                                        });
                                        reader.readAsDataURL(file);
                                    }
                                }
                                document.querySelector('#file-input').addEventListener("change", previewImages);
                            </script>

                            {{-- End script --}}

                        </div>
                        @error('images')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        {{-- Choose sizes --}}
                        <div class="md-3">
                            {{-- Show size checkboxes --}}
                            <label>Sizes</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="CheckboxS" value="S" name="size[]">
                                <label class="form-check-label" for="CheckboxS">S</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="CheckboxM" value="M" name="size[]">
                                <label class="form-check-label" for="CheckboxM">M</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="CheckboxL" value="L" name="size[]">
                                <label class="form-check-label" for="CheckboxL">L</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="CheckboxXL" value="XL"
                                    name="size[]">
                                <label class="form-check-label" for="CheckboxXL">XL</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="CheckboxXXL" value="XXL"
                                    name="size[]">
                                <label class="form-check-label" for="CheckboxXXL">XXL</label>
                            </div>
                            {{-- Check checkboxes according to $data from database --}}
                            <?php
                            $SizesAll = explode(' ', $data->Size);
                            foreach ($SizesAll as $size) {
                                if ($size == 'S') {
                                    echo '<script type="text/javascript">document.getElementById("CheckboxS").checked=true;</script>';
                                }
                                if ($size == 'M') {
                                    echo '<script type="text/javascript">document.getElementById("CheckboxM").checked=true;</script>';
                                }
                                if ($size == 'L') {
                                    echo '<script type="text/javascript">document.getElementById("CheckboxL").checked=true;</script>';
                                }
                                if ($size == 'XL') {
                                    echo '<script type="text/javascript">document.getElementById("CheckboxXL").checked=true;</script>';
                                }
                                if ($size == 'XXL') {
                                    echo '<script type="text/javascript">document.getElementById("CheckboxXXL").checked=true;</script>';
                                }
                            }
                            ?>
                        </div>

                        <div class="md-3">
                            <label for="available" class="form-label">Available</label>
                            <input type="number" name="available" class="form-control" placeholder="Enter available"
                                value="{{ $data->Available }}" style="width: 160px">
                        </div>
                        @error('available')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url('listProduct')}}" class="btn btn-danger">Back</a>
                        <br><br><br><br><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>



</html>

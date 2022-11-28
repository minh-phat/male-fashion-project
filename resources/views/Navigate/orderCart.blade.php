@include('Header')

<head>
    <title>Cart</title>
</head>

<!-- Open Content -->
<section class="bg-light" style="background-color: #eee;">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Order Cart</h3>
                </div>

                {{-- <form action="{{ url('purchase')}}" method="POST" enctype="multipart/form-data"> --}}
                @if (!empty(session('OrderIDArray')))   
                    @foreach ($OrderDetailsIDDistinct as $OrderDetailsIDDistinctRow)
                        <div class="card rounded-3 mb-4">
                            <?php $total = 0; $i = 0; ?>
                            @foreach (session('OrderIDArray') as $row)
                                @if($OrderDetailsIDDistinctRow->Order_ID === $row['OrderID'])                                  

                                    <div class="card-body p-4" style="padding: 10px 10px 0px 10px !important;">                   
                            
                                        <div class="row d-flex justify-content-between align-items-center">
                                                
                                            {{-- @if (!empty(session('OrderIDArray'))) --}}
                                            
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="img/products/<?php
                                                
                                                $ImagesFirst = explode('@@@', $row['img']);
                                                
                                                $item = reset($ImagesFirst);
                                                echo $item; ?>" class="img-fluid rounded-3"
                                                    alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <p class="lead fw-normal mb-2">{{ $row['name'] }}</p>
                                                <p>
                                                    <span class="text-muted">Size: </span>
                                                    {{ $row['size'] }}
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <p>Ammount: {{ $row['quantity'] }}</p>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h5 class="mb-0">${{ $row['price'] }}</h5>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1  ">
                                                <a href="removeItem/{{ $i }}" class="text-danger"
                                                    onclick="return confirm('Confirm delete?')">
                                                    <i class="fas fa-trash fa-lg"></i>
                                                </a>
                                            </div>
                                        </div>                                       
                                        <hr>
                                        <?php $total += $row['price'] * $row['quantity'];
                                        $i++; ?>
                                    
                                        {{-- @else
                                            <p>Looks like your cart is empty! You can get some items <a href="{{ 'shop' }}"
                                                    style="color: #23B35A">Here</a></p>
                                        @endif --}} 
                                            {{-- @else --}}
                                                {{-- <p>Looks like your cart is empty! You can get some items <a href="{{ 'shop' }}"
                                                        style="color: #23B35A">Here</a></p>
                                            @endif --}}
                                                                                                                  
                                    </div>  
                                @endif                          
                            @endforeach

                            <div class="" style ="display:flex; float:left; padding-bottom:10px; ">                            
                                    <button type="button" class="btn btn-outline-success" style="margin-right: 100px; margin-left:10px; width:100px;">Buy again</button>                       
                                    <h5 class="" style="width: 150px; ">Total: ${{ $total }}</h5> 
                                                   
                                
                            </div>
                        </div>                      
                    @endforeach
                                                            
                @else   
                <p>Looks like your cart is empty! You can get some items <a href="{{ 'shop' }}"
                    style="color: #23B35A">Here</a></p>
                @endif
                
                {{-- </form> --}}
            </div>
        </div>
</section>

@include('Footer')
</body>

</html>

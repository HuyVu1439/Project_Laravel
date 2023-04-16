<!DOCTYPE html>
<html lang="en" ng-app="myapp" ng-controller="mycontroller">

<head>
    <meta charset="utf-8">
    <title>Min Fashion</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
    <!-- Libraries Stylesheet -->
    <link href="/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/frontend/css/style.css" rel="stylesheet">
</head>

<body>
<style>
    #abuttonv a {
            background-color: #fff;
            border: 1px solid #ddd;
            box-sizing: border-box;
            color: FFC800;
            cursor: pointer;
            display: inline-block;
            font-family: din-round,sans-serif;
            font-size: 15px;
            font-weight: 700;
            padding: 10px 12px;
            text-align: center;
            width: 100%;
        }
    #abuttonv ul {
        margin-left: 45%;
    } 
</style>
    <!-- Topbar Start -->
    <?php
        include_once('includes/topbar.blade.php')
    ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
        include_once('includes/navbar.blade.php')
    ?>
    <?php
        include_once('includes/slide.blade.php')
    ?>
    
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Chất lượng tuyệt đỉnh</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Đổi-hoàn trong vòng 5 ngày</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm nổi bật</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1" ng-repeat = "sp in sanpham | filter:q | orderBy :'-id'| limitTo :4 :5">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="/upload/sanpham/@{{sp.image}}" alt="" style="height:330px ;">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">@{{sp.name}}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>@{{sp.gia_km | currency :'' :0}}@{{sp.don_vi_tinh}}</h6><h6 class="text-muted ml-2"><del>@{{sp.unit_price | currency :'' :0}}@{{sp.don_vi_tinh}}</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="/frontend/detail/?id=@{{sp.id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0" ng-click="addToCart(sp)"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Categories Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Loại sản phẩm hot</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 20px;">
                    <a href="/frontend/shoploai/id?=9" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="/frontend/img/catehot/vaydai.jpg" style="height:200px;width:100%" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0 text-center">VÁY DÀI</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 20px;">

                    <a href="/frontend/shoploai/id?=17" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="/frontend/img/catehot/vayngan.jpg" style="height:200px;width:100%" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0 text-center">VÁY NGẮN</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 20px;">

                    <a href="/frontend/shoploai/id?=20" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="/frontend/img/catehot/dobonam.jpg" style="height:200px;width:100%" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0 text-center">ĐỒ BỘ NAM</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">

                    <a href="/frontend/shoploai/id?=18" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="/frontend/img/catehot/vaytrevai.jpg" style="height:200px;width:100%" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0 text-center">VÁY TRỄ VAI</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản phẩm</span></h2>
        </div>        
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1" dir-paginate = "sp in sanpham | itemsPerPage: pageSize" current-page="currentPage">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="/upload/sanpham/@{{sp.image}}" alt="" style="height:330px ;">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <a href="/frontend/detail/?id=@{{sp.id}}"><h6 class="text-truncate mb-3">@{{sp.name}}</h6></a>
                            
                        <div class="d-flex justify-content-center">
                            <h6>@{{sp.gia_km | currency :'' :0}}@{{sp.don_vi_tinh}}</h6><h6 class="text-muted ml-2"><del>@{{sp.unit_price | currency :'' :0}}@{{sp.don_vi_tinh}}</del></h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="/frontend/detail/?id=@{{sp.id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="" class="btn btn-sm text-dark p-0" ng-click="addToCart(sp)"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
                
            </div>
        </div>
        <dir-pagination-controls max-size='5' id="abuttonv" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>   
    </div>
    <!-- Products End -->

    <!-- Footer Start -->
    <?php
        include_once('includes/footer.blade.php')
    ?>
<!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/frontend/lib/easing/easing.min.js"></script>
    <script src="/frontend/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/frontend/mail/jqBootstrapValidation.min.js"></script>
    <script src="/frontend/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/frontend/js/main.js"></script>  
    <script src="/js/angular.min.js"></script> 
    <script src="/js/sanphamHome.js"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

</body>

</html>
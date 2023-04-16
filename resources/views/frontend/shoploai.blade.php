<!DOCTYPE html>
<html lang="en" ng-app="myapp" ng-controller="mycontroller">

<head>
    <meta charset="utf-8">
    <title>Min Fashion-Sản phẩm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="/img/favicon.ico" rel="icon">

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
    <!-- Topbar Start -->
    <?php
        include_once('includes/topbar.blade.php')
    ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">DANH MỤC</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <?php
                    include_once('includes/category.blade.php')
                ?>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link">Trang chủ</a>
                            <a href="/frontend/shop" class="nav-item nav-link active">Sản phẩm</a>
                            <a href="/frontend/contact" class="nav-item nav-link">Liên hệ</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Shop Start -->
    <div class="hero-wrap hero-bread" style="background-image: url('/img/bia.png');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ</a></span> <span>@{{loaisanpham.tenloai}}</span></p>
            <h1 class="mb-0 bread">@{{loaisanpham.tenloai}}</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Categories Section Begin -->
    <section class="categories" style="margin-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3" ng-repeat="llsp in listlsp">
                        <h6><a href="/shop/id?=@{{llsp.id}}" class="at">@{{llsp.tenloai}}</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">

    			<div class="col-md-6 col-lg-3" ng-if="loaisanpham.id==sp.id_loai_sp" ng-repeat="sp in sanpham">
    				<div class="product">
                        <div class="card product-item border-0">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="/upload/sanpham/@{{sp.image}}" style="height:330px ;" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">@{{sp.name}}</h6>
                                <div class="d-flex justify-content-center">
                                    <h6>@{{sp.gia_km | currency :'' :0}}@{{sp.don_vi_tinh}}</h6><h6 class="text-muted ml-2"><del>@{{sp.unit_price | currency :'' :0}}@{{sp.don_vi_tinh}}</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="/frontend/detail/?id=@{{sp.id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0" ng-click="addToCart(sanpham)"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
</div>
    <!-- Shop End -->


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
    <script src="/js/shoploai.js"></script>
</body>

</html>
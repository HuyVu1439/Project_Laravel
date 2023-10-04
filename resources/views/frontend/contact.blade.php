<!DOCTYPE html>
<html lang="en" ng-app="myapp" ng-controller="mycontroller">

    <head>
        <meta charset="utf-8">
        <title>Min Fashion-Liên hệ</title>
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
                                <a href="/frontend/shop" class="nav-item nav-link">Sản phẩm</a>
                                <a href="/frontend/contact" class="nav-item nav-link active">Liên hệ</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        
        <!-- Navbar End -->

        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 150px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Liên hệ</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="/">Trang chủ</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Liên hệ</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Liên hệ với chúng tôi</span></h2>
            </div>
            <div class="row px-xl-5">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>                      
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Họ tên" ng-model="lienhe.name_kh"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Email" ng-model="lienhe.email_kh"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="vấn đề" ng-model="lienhe.vande"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="6" id="message" placeholder="nội dung cần liên hệ" ng-model="lienhe.noidung"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton" ng-click ="saveData()">Gửi thư</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">
                    <h5 class="font-weight-semi-bold mb-3">ĐẲNG CẤP THỜI TRANG</h5>
                    <p>Ở Min Fashion, chúng tôi luôn muốn mang lại cho khách hàng những sản phẩm thời thượng nhất, đẳng cấp nhất cùng với đó là giá thành phù hợp nhất.</p>
                    <div class="d-flex flex-column mb-3">
                        <h5 class="font-weight-semi-bold mb-3">Địa chỉ:</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>TP HCM, Việt Nam</p>
                        <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>huyvu1439@gmail.com</p>
                        <p class="mb-2"><i class="fa fa-phone-alt text-primary mr-3"></i>0328875121</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

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
        <!-- <script src="/frontend/mail/jqBootstrapValidation.min.js"></script>
        <script src="/frontend/mail/contact.js"></script> -->

        <!-- Template Javascript -->
        <script src="/frontend/js/main.js"></script>
        <!-- <script src="/js/frontend/lienhe.js"></script> -->
        <script src="/js/angular.min.js"></script>
        <script src="/js/contactHome.js"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en" ng-app="myapp" ng-controller="mycontroller">
  <head>
    <title>gio hang</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/frontend/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/css/animate.css">
    
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css">

    <link rel="stylesheet" href="/frontend/css/aos.css">

    <link rel="stylesheet" href="/frontend/css/ionicons.min.css">

    <link rel="stylesheet" href="/frontend/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/frontend/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/frontend/css/flaticon.css">
    <link rel="stylesheet" href="/frontend/css/icomoon.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
  </head>
  <body class="goto-here">
  <div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 0356964919</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">nhnaoker1@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 Business days delivery &amp; Free Returns</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/">Đồ chơi siêu nhân</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="/shop">Shop</a>
              	<a class="dropdown-item" href="/gao">Gao</a>
                <a class="dropdown-item" href="/cuongphong">Cuồng phong</a>
              </div>
            </li>
	          <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="/cart" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
			  <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

	<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
							  	<th>Ảnh</th>
						        <th>Tên sản phẩm</th>
						        <th>Giá</th>
						        <th>Số lượng</th>
						        <th>Tổng</th>
								<th>&nbsp;</th>
						        <th>&nbsp;</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center" ng-repeat="c in cart">

							  	<td class="image-prod"><div class="img" style="background-image:url(/upload/sanpham/@{{c.image}});"></div></td>					        
						        
						        <td class="product-name">
						        	<h3>@{{c.name}}</h3>
						        </td>

						        <td class="price">@{{c.gia_km | currency :'' :0}}@{{c.don_vi_tinh}}</td>
						        
						        <td>  
                                 <div class="input-group col-md-6 d-flex mb-3 col-lg-12">
           
                                            <div ng-click="Giam(c)" class="btn btn-sm" style="border: 1px solid rgba(0, 0, 0, 0.1); border-radius:0; height:40px; width:40px; text-align: center; padding: 9px;"><i class="fas fa-minus"></i></div>               
                                            <input type="text" value="@{{c.quantity}}" style="width: 50px; text-align: center; font-size: 15px; font-weight: 400; height: 40px;">
                                            <div ng-click="Tang(c)" class="btn btn-sm" style="border: 1px solid rgba(0, 0, 0, 0.1); border-radius:0; height:40px; width:40px; text-align: center; padding: 9px;"><i class="fas fa-plus"></i></div>
                                </div>
                        <!-- </div> -->
                            </td>
						        
						        <td class="total">@{{c.quantity * c.gia_km | currency :'' :0}}@{{c.don_vi_tinh}}</td>

								
								<td class="product-remove"><a href="" ><span class="ion-ios-close" ng-click="Xoa(c)"></span></a></td>
						      </tr><!-- END TR-->
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Tổng số giỏ hàng</h3>
    					<p class="d-flex">
    						<span>Tổng phụ</span>
    						<span>0</span>
    					</p>
    					<p class="d-flex">
    						<span>Vận chuyển</span>
    						<span>free ship</span>
    					</p>
    					<p class="d-flex">
    						<span>Miễn giảm</span>
    						<span>0</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Tổng giỏ hàng</span>
    						<span>@{{total}}</span>
    					</p>
    				</div>
    				<p><a href="/checkout" class="btn btn-primary py-3 px-4" >Thanh toán</a></p>
					<p><a href="" class="btn btn-primary py-3 px-4"  ng-click="XoaCart()">Xóa giỏ hàng</a></p>
			</div>
		</section>

	<footer class="ftco-footer ftco-section">
      <div class="container">
      	<div class="row">
      		<div class="mouse">
						<a href="#" class="mouse-icon">
							<div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
						</a>
					</div>
      	</div>
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Đồ chơi siêu nhân</h2>
              <p>Website bán hàng đồ chơi siêu nhân gao uy tín chất lượng nhất Việt Nam</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Tạp chí</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Thông tin vận chuyển</a></li>
	                <li><a href="#" class="py-2 d-block">Trả hàng &amp; Trao đổi</a></li>
	                <li><a href="#" class="py-2 d-block">Điều kiện &amp; Các điều kiện</a></li>
	                <li><a href="#" class="py-2 d-block">Chính sách bảo mật</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">Câu hỏi thường gặp</a></li>
	                <li><a href="#" class="py-2 d-block">Liên Hệ</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Có một câu hỏi?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Đội 5 , Vĩnh Khúc Văn Giang Hưng Yên , Việt Nam</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+0356964919</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">nhunaoker1@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Thanh Toàn</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="/frontend/js/jquery.min.js"></script>
  <script src="/frontend/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/frontend/js/popper.min.js"></script>
  <script src="/frontend/js/bootstrap.min.js"></script>
  <script src="/frontend/js/jquery.easing.1.3.js"></script>
  <script src="/frontend/js/jquery.waypoints.min.js"></script>
  <script src="/frontend/js/jquery.stellar.min.js"></script>
  <script src="/frontend/js/owl.carousel.min.js"></script>
  <script src="/frontend/js/jquery.magnific-popup.min.js"></script>
  <script src="/frontend/js/aos.js"></script>
  <script src="/frontend/js/jquery.animateNumber.min.js"></script>
  <script src="/frontend/js/bootstrap-datepicker.js"></script>
  <script src="/frontend/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="/frontend/js/google-map.js"></script>
  <script src="/frontend/js/main.js"></script>
  <script src="/js/angular.min.js"></script>
  <script src="/js/cart.js"></script>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>
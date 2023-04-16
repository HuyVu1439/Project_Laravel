var app = angular.module('myapp',[]);
                app.controller('mycontroller',function($scope,$http)
                {
                    $http({
                        Method: "GET",
                        url: "http://127.0.0.1:8000/api/sanphamhome/"
                    }).success(function(response) {
                        console.log(response);
                        $scope.sanpham = response;
                    });
                    $http({
                        Method: "GET",
                        url: "http://127.0.0.1:8000/api/loaisps/"
                    }).success(function(response) {
                        console.log(response);
                        $scope.loaisanpham = response;
                    });
                    $scope.LoadCart = function () {
                        $scope.cart = JSON.parse(localStorage.getItem('cart'));
                    }
                    $scope.LoadCart();

                    $scope.Tang = function (sp) {
                        var index = $scope.cart.indexOf(sp);
                        if (index >= 0) {
                            $scope.cart[index].quantity += 1;
                        }
                        localStorage.setItem('cart', JSON.stringify($scope.cart));
                    }
                
                    $scope.Giam = function (sp) {
                        var index = $scope.cart.indexOf(sp);
                        if (index >= 0 && $scope.cart[index].quantity >= 2) {
                            $scope.cart[index].quantity -= 1;
                        }
                        localStorage.setItem('cart', JSON.stringify($scope.cart));
                    }
                
                    $scope.Xoa = function (sp) {
                        var index = $scope.cart.indexOf(sp);
                        $scope.cart.splice(index, 1);
                        localStorage.setItem('cart', JSON.stringify($scope.cart));
                        alert("Đã xóa sản phẩm thành công");
                    }
                    $scope.total = 0;
                    function reCaculatioTotalPrice() {
                        let total = 0;
                        $scope.cart.forEach(e => {
                            total += e.unit_price * e.quantity
                        });
                        $scope.total = total;
                    }
                    reCaculatioTotalPrice()
});
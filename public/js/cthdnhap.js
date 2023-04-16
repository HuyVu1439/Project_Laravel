var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
                app.controller('mycontroller',function($scope,$http)
                {
                $scope.q="";
                var api = 'http://127.0.0.1:8000/api/chitiethdnhaps/';
                var api2 = 'http://127.0.0.1:8000/api/hdnhaps/';
                var api3 = 'http://127.0.0.1:8000/api/sanphams/';
                var loadData = function(){
                    $http({
                        method:'GET',
                        url:api
                    }).then(function(res){
                        $scope.chitiethdnhap = res.data;
                        console.log(res.data);
                    });
                    $http({
                        method:'GET',
                        url:api2
                    }).then(function(res){
                        $scope.hdnhap = res.data;
                        console.log(res.data);
                    });
                    $http({
                        method:'GET',
                        url:api3
                    }).then(function(res){
                        $scope.sanpham = res.data;
                        console.log(res.data);
                    });
                }
                loadData();

                $scope.currentPage = 1;
                $scope.pageChangeHandler = function(num) {
                        $scope.currentPage = num;
                    };
                $scope.pageSize = 10;
                
                $scope.showModal = function(id) {
                    $scope.id = id;
                    if (id == 0) {
                        $scope.modaltitle = "Thêm chi tiết hóa đơn nhập mới";
                        if ($scope.cthdn) {
                            delete $scope.cthdn;
                        }
                    } else {
                        $scope.modaltitle = "Sửa thông tin chi tiết  hóa đơn nhập";
                        $http({
                            method: "GET",
                            url: api + id
                        }).then(function(res) {
                            $scope.cthdn = res.data;
                        });
                    }
                    $('#modelId').modal('show');
                }

                $scope.saveData = function() {
                    var m = $scope.id == 0 ? "POST" : "PUT";
                    var url = $scope.id == 0 ? api : api + $scope.id;
                    $http({
                        method: m,
                        url: url,
                        data: $scope.cthdn,
                        'content-Type': 'application/json'

                    }).then(function(res) {
                        $scope.cthdn == res.data;
                    });
                    $('#modelId').modal('hide');
                    window.location.reload();
                }


                $scope.deleteClick = function(id) {
                    var hoi = confirm('Bạn có muốn xóa chi tiết hóa đơn nhập này không?');
                    if (hoi) {
                        $http({
                            method: "DELETE",
                            url: api + id
                        }).then(function(res) {
                            $scope.message = res.data;
                            $scope.reloadData();
                        });
                    }
                    window.location.reload();
                }

});
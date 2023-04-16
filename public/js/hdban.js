var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
                app.controller('mycontroller',function($scope,$http)
                {
                $scope.q="";
                var api = 'http://127.0.0.1:8000/api/hdbans/';
                var api2 = 'http://127.0.0.1:8000/api/khachhangs/';
                var loadData = function(){
                    $http({
                        method:'GET',
                        url:api
                    }).then(function(res){
                        $scope.hdban = res.data;
                        console.log(res.data);
                    });
                    $http({
                        method:'GET',
                        url:api2
                    }).then(function(res){
                        $scope.khachhang = res.data;
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
                        $scope.modaltitle = "Thêm hóa đơn bán mới";
                        if ($scope.hdb) {
                            delete $scope.hdb;
                        }
                    } else {
                        $scope.modaltitle = "Sửa thông tin hóa đơn bán";
                        $http({
                            method: "GET",
                            url: api + id
                        }).then(function(res) {
                            $scope.hdb = res.data;
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
                        data: $scope.hdb,
                        'content-Type': 'application/json'

                    }).then(function(res) {
                        $scope.hdb == res.data;
                    });
                    $('#modelId').modal('hide');
                    window.location.reload();
                }


                $scope.deleteClick = function(id) {
                    var hoi = confirm('Bạn có muốn xóa hóa đơn bán này không?');
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
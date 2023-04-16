var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
                app.controller('mycontroller',function($scope,$http)
                {
                $scope.q="";
                var api = 'http://127.0.0.1:8000/api/hdnhaps/';
                var api2 = 'http://127.0.0.1:8000/api/nhacungcaps/';
                var api3 = 'http://127.0.0.1:8000/api/nhanviens/';
                var loadData = function(){
                    $http({
                        method:'GET',
                        url:api
                    }).then(function(res){
                        $scope.hdnhap = res.data;
                        console.log(res.data);
                    });
                    $http({
                        method:'GET',
                        url:api2
                    }).then(function(res){
                        $scope.nhacungcap = res.data;
                        console.log(res.data);
                    });
                    $http({
                        method:'GET',
                        url:api3
                    }).then(function(res){
                        $scope.nhanvien = res.data;
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
                        $scope.modaltitle = "Thêm hóa đơn nhập mới";
                        if ($scope.hdn) {
                            delete $scope.hdn;
                        }
                    } else {
                        $scope.modaltitle = "Sửa thông tin hóa đơn nhập";
                        $http({
                            method: "GET",
                            url: api + id
                        }).then(function(res) {
                            $scope.hdn = res.data;
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
                        data: $scope.hdn,
                        'content-Type': 'application/json'

                    }).then(function(res) {
                        $scope.hdn == res.data;
                    });
                    $('#modelId').modal('hide');
                    window.location.reload();
                }


                $scope.deleteClick = function(id) {
                    var hoi = confirm('Bạn có muốn xóa hóa đơn nhập này không?');
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
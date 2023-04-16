var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http, $filter) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/nhanviens"
        }).success(function(response) {
            $scope.nhanviens = response;
            console.log(response);
        });
    }
    $scope.loaddata();
    $scope.modalHide = function(){
        $('#modelId').modal('hide');
    }
    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Them moi nhan vien";
            
            if ($scope.nhanvien) {
                delete $scope.nhanvien;
            }
           
        } else {
            $scope.modalTitle = "Sua nhan vien";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/nhanviens/" + id
            }).success(function(response) {
                $scope.nhanvien = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/nhanviens/":"http://127.0.0.1:8000/api/nhanviens/"+$scope.id;
        alert($scope.nhanvien.ten_nhanvien);
        $http({
            method: mt,
            url: url1,
            data: $scope.nhanvien,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Ban co muon xoa nhan vien nay khong?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/nhanviens/" + id,
                data: $scope.nhanvien,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 5;
});


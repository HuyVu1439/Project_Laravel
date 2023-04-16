var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/tintucs"
        }).success(function(response) {
            $scope.tintucs = response;
            console.log(response);
        });
    }
    $scope.loaddata();
    $scope.modalHide = function(){
        $('#modelId').modal('hide');
    }
    $scope.editClick = function(id_new) {
        $scope.id_new = id_new;
        if (id_new == 0) {
            $scope.modalTitle = "Them moi tin tuc";
            
            if ($scope.tintuc) {
                delete $scope.tintuc;
            }
           
        } else {
            $scope.modalTitle = "Sua tin tuc";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/tintucs/" + id_new
            }).success(function(response) {
                $scope.tintuc = response;
            });
        }
        $('#modelId').modal('show');
        
    }
    $scope.updateData = function() {
        var mt = $scope.id_new==0?"POST":"PUT";
        var url1 = $scope.id_new==0?"http://127.0.0.1:8000/api/tintucs/":"http://127.0.0.1:8000/api/tintucs/"+$scope.id_new;
        $http({
            method: mt,
            url: url1,
            data: $scope.tintuc,
           'Content-Type': 'application/json'
        }).then(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id_new) {
        var hoi = confirm('Ban co muon xoa tin tuc nay khong?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/tintucs/" + id_new,
                data: $scope.tintuc,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }
    const fileUpload = document.querySelector("#file-upload");
                fileUpload.addEventListener("change", (e) => {
                const files = e.target.files;
                document.getElementById('image').innerHTML = `<img src="/upload/sanpham/`+ files[0].name +`" alt="Ảnh" style="width:100%;height:100%">`;
                for(const file of files) {
                     const {name, type, size, lastModified } = file;
                     // Làm gì đó với các thông tin trên
                    $scope.tintuc.image = file.name;
                document.getElementById('image').innerHTML = `<img src="/upload/sanpham/`+ file.name +`" alt="Ảnh" style="width:100%;height:100%">`;
                 };
                 });
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 5;
});

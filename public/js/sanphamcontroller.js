var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {
    $scope.q="";
    $scope.detail_id = sessionStorage.getItem('seletedDetail') ?? undefined;
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/sanphams"
        }).success(function(response) {
            $scope.sanphams = response;
            console.log(response);
        });
    }
    $scope.loaddata1=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/loaisps"
        }).success(function(response) {
            $scope.loaisps = response;
            console.log(response);
        });
    }
    $scope.loaddata2=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/nhacungcaps"
        }).success(function(response) {
            $scope.nhacungcap = response;
            console.log(response);
        });
    }
    $scope.loaddata();
    $scope.loaddata1();
    $scope.loaddata2();
    $scope.modalHide = function(){
        $('#modelId').modal('hide');
    }

    $scope.editClick = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Thêm mới sản phẩm";
            
            if ($scope.sanpham) {
                delete $scope.sanpham;
            }
           
        } else {
            $scope.modalTitle = "Sửa sản phẩm";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/sanphams/" + id
            }).success(function(response) {
                $scope.sanpham = response;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.updateData = function() {
        var mt = $scope.id==0?"POST":"PUT";
        var url1 = $scope.id==0?"http://127.0.0.1:8000/api/sanphams/":"http://127.0.0.1:8000/api/sanphams/"+$scope.id;
        alert($scope.sanpham.tenloai);
        $http({
            method: mt,
            url: url1,
            data: $scope.sanpham,
           'Content-Type': 'application/json'
        }).success(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
        location.reload();
    }
    
    $scope.deleteClick = function(id) {
        var hoi = confirm('Bạn có muốn xóa sản phẩm này không?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/sanphams/" + id,
                data: $scope.sanpham,
            }).then(function(res) {
                $scope.message = res.data;
                $scope.loaddata();
            });
        }
    }


    $scope.saveData = function() {
        var m = $scope.id == 0 ? "POST" : "PUT";
        var url = $scope.id == 0 ? "http://127.0.0.1:8000/api/sanphams/" : "http://127.0.0.1:8000/api/sanphams/" + $scope.id;
        $http({
            method: m,
            url: url,
            data: $scope.sanpham,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.sanpham == res.data;
        }, err => console.log(err));
        $('#modelId').modal('hide');
         $scope.loaddata();
        //  location.reload();
    }

    
    $scope.currentPage = 1;
    $scope.pageChangeHandler = function(num) {
            $scope.currentPage = num;
        };
    $scope.pageSize = 10;

    const fileUpload = document.querySelector("#file-upload");
    fileUpload.addEventListener("change", (e) => {
    const files = e.target.files;
    document.getElementById('image').innerHTML = `<img src="/upload/sanpham/`+ files[0].name +`" alt="Ảnh" style="width:100%;height:100%">`;
    for(const file of files) {
         const {name, type, size, lastModified } = file;
         // Làm gì đó với các thông tin trên
        $scope.sanpham.image = file.name;
    document.getElementById('image').innerHTML = `<img src="/upload/sanpham/`+ file.name +`" alt="Ảnh" style="width:100%;height:100%">`;
     };
     });

});
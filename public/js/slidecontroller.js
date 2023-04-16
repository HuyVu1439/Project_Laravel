var app = angular.module('myapp', ['angularUtils.directives.dirPagination']);
app.controller('mycontroller', function($scope, $http) {
    $scope.q="";
    $scope.loaddata=function(){
        $http({
            Method: "GET",
            url: "http://127.0.0.1:8000/api/slides"
        }).success(function(response) {
            $scope.slides = response;
            console.log(response);
        });
    }
    $scope.loaddata();
    $scope.modalHide = function(){
        $('#modelId').modal('hide');
    }
    $scope.editClick = function(id_slide) {
        $scope.id_slide = id_slide;
        if (id_slide == 0) {
            $scope.modalTitle = "Them moi slide";
            
            if ($scope.slide) {
                delete $scope.slide;
            }
           
        } else {
            $scope.modalTitle = "Sua slide";
            $http({
                Method: "GET",
                url: "http://127.0.0.1:8000/api/slides/" + id_slide
            }).success(function(response) {
                $scope.slide = response;
            });
        }
        $('#modelId').modal('show');
    }

    $scope.saveData = function() {
        var m = $scope.id_slide == 0 ? "POST" : "PUT";
        var url = $scope.id_slide == 0 ? "http://127.0.0.1:8000/api/slides/" : "http://127.0.0.1:8000/api/slides/" + $scope.id_slide;
        $http({
            method: m,
            url: url,
            data: $scope.slide,
            'content-Type': 'application/json'
        }).then(function(res) {
            $scope.slide == res.data;
        }, err => console.log(err));
        $('#modelId').modal('hide');
         $scope.loaddata();
         location.reload();
    }

    $scope.updateData = function() {
        var mt = $scope.id_slide==0?"POST":"PUT";
        var url1 = $scope.id_slide==0?"http://127.0.0.1:8000/api/slides/":"http://127.0.0.1:8000/api/slides/"+$scope.id_slide;
        $http({
            method: mt,
            url: url1,
            data: $scope.slide,
           'Content-Type': 'application/json'
        }).then(function(response) {
            console.log(response);
            $('#modelId').modal('hide');
            $scope.loaddata();
        });
    }
    
    $scope.deleteClick = function(id_slide) {
        var hoi = confirm('Ban co muon xoa slide nay khong?');
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://127.0.0.1:8000/api/slides/" + id_slide,
                data: $scope.slide,
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
    const fileUpload = document.querySelector("#file-upload");
    fileUpload.addEventListener("change", (e) => {
    const files = e.target.files;
    document.getElementById('image').innerHTML = `<img src="/upload/images/slide/`+ files[0].name +`" alt="Ảnh" style="width:100%;height:100%">`;
    for(const file of files) {
         const {name, type, size, lastModified } = file;
         // Làm gì đó với các thông tin trên
        $scope.sanpham.image = file.name;
    document.getElementById('image').innerHTML = `<img src="/upload/images/slide/`+ file.name +`" alt="Ảnh" style="width:100%;height:100%">`;
     };
     });
});
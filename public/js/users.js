var app = angular.module('myapp',['angularUtils.directives.dirPagination']);
                app.controller('mycontroller',function($scope,$http)
                {
                $scope.q="";
                var api = 'http://127.0.0.1:8000/api/userss/';
                var loadData = function(){
                    $http({
                        method:'GET',
                        url:api
                    }).then(function(res){
                        $scope.users = res.data;
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
                        $scope.modaltitle = "Thêm users mới";
                        if ($scope.u) {
                            delete $scope.u;
                        }
                    } else {
                        $scope.modaltitle = "Sửa thông tin users";
                        $http({
                            method: "GET",
                            url: api + id
                        }).then(function(res) {
                            $scope.u = res.data;
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
                        data: $scope.u,
                        'content-Type': 'application/json'

                    }).then(function(res) {
                        $scope.u == res.data;
                    });
                    $('#modelId').modal('hide');
                    window.location.reload();
                }


                $scope.deleteClick = function(id) {
                    var hoi = confirm('Bạn có muốn xóa users này không?');
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
                
                const fileUpload = document.querySelector("#file-upload");
                fileUpload.addEventListener("change", (e) => {
                const files = e.target.files;
                document.getElementById('image').innerHTML = `<img src="/img/users/`+ files[0].name +`" alt="Ảnh" style="width:100%;height:100%">`;
                for(const file of files) {
                     const {name, type, size, lastModified } = file;
                     // Làm gì đó với các thông tin trên
                    $scope.u.image = file.name;
                document.getElementById('image').innerHTML = `<img src="/img/users/`+ file.name +`" alt="Ảnh" style="width:100%;height:100%">`;
                 };
                 });
                
                


                 $(document).ready(function() {
                    $("#show_hide_password a").on('click', function(event) {
                        event.preventDefault();
                        if($('#show_hide_password input').attr("type") == "text"){
                            $('#show_hide_password input').attr('type', 'password');
                            $('#show_hide_password i').addClass( "fa-eye-slash" );
                            $('#show_hide_password i').removeClass( "fa-eye" );
                        }else if($('#show_hide_password input').attr("type") == "password"){
                            $('#show_hide_password input').attr('type', 'text');
                            $('#show_hide_password i').removeClass( "fa-eye-slash" );
                            $('#show_hide_password i').addClass( "fa-eye" );
                        }
                    });
                });
});
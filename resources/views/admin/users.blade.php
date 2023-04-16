@extends('_admin_layout')
@section('content')
<p style="padding: 5px; font-size:30px;"> <i class="fa fa-table" style="margin:0 10px;"></i>  Quản lý users</p>
<div style="display:flex; justify-content: space-between;">
    <p><button class="btn btn-success" ng-click="showModal(0)" style="width: 120px;"> Thêm</button></p>
    <div class="form-group has-search" style="display:flex; align-items:center;">
    <i class="fa fa-search" style="margin-right:10px;"></i>
        <input type="text" class="form-control" placeholder="Search" style="width:250px; border-radius: .25rem" ng-model='q'>
    </div>
        
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>TT</th>
                        <th>Họ tên</th>
                        <th>Tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ảnh</th>
                        <th>Delet</th>
                        <th>Remember_token</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate = "u in users |filter: q| itemsPerPage: pageSize" current-page="currentPage">
                        <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                        <td>@{{ u.full_name }}</td>
                        <td>@{{ u.users_name }}</td>
                        <td>@{{ u.password }}</td>
                        <td>@{{ u.email}}</td>
                        <td>@{{ u.phone}}</td>
                        <td>@{{ u.address}}</td>
                        <td><img src="/img/users/@{{u.image}}" style='width:100px;height:100px' alt=""></td>
                        <td>@{{ u.Delet}}</td>
                        <td>@{{ u.remember_token}}</td>

                        <td><button class="btn btn-info" ng-click="showModal(u.id)"><i class="fas fa-edit"></i></button></td>
                        <td><button class="btn btn-danger" ng-click="deleteClick(u.id)"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                </tbody>
            </table>
            <dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
        </div>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 600px;">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modaltitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Họ tên</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="u.full_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Tài khoản</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="u.users_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Mật khẩu</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="u.password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="name" ng-model="u.email">
                            </div>
                        </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Số điện thoại</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="u.phone">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Địa chỉ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="u.address">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Ảnh:</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control " id="file-upload" ng-model="u.image">
                            </div>
                            </br>
                            <div style="width:100px;height:100px" id="image" class="col-sm-3">
                                <img src="/img/ussers/@{{sp.image}}" alt="Ảnh" style="width:100%;height:100%" ng-model="u.image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Delet</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="u.Delet">
                            </div>
                        </div>  
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Remember_token</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="u.remember_token">
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" ng-click="saveData()">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
    </script>
    <script src="/js/users.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

@stop
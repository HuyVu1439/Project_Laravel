@extends('_admin_layout')
@section('content')
<p style="padding: 5px; font-size:30px;"> <i class="fa fa-table" style="margin:0 10px;"></i>  Quản lý hóa đơn nhập</p>
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
                        <th>Nhà cung cấp</th>
                        <th>Nhân viên</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate = "hdn in hdnhap |filter: q| itemsPerPage: pageSize" current-page="currentPage">
                        <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                        <td ng-if="hdn.id_ncc==ncc.id" ng-repeat="ncc in nhacungcap">@{{ ncc.ten_ncc }}</td>
                        <td ng-if="hdn.id_nhanvien==nv.id" ng-repeat="nv in nhanvien">@{{ nv.ten_nhanvien }}</td>
                        <td>@{{ hdn.date_order }}</td>
                        <td>@{{ hdn.tong_tien }}</td>
                        <td>@{{ hdn.thanh_toan }}</td>
                        <td>@{{ hdn.note}}</td>

                        <td><button class="btn btn-info" ng-click="showModal(hdn.id)"><i class="fas fa-edit"></i></button></td>
                        <td><button class="btn btn-danger" ng-click="deleteClick(hdn.id)"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                </tbody>
            </table>
            <dir-pagination-controls max-size='5' on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
        </div>
    </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Nhà cung cấp</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="hdn.id_ncc">
                                    <option ng-repeat="ncc in nhacungcap"  value="@{{ncc.id}}">@{{ncc.ten_ncc}}</option>
                                </select>
                            </div>                             
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Nhân viên</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="hdn.id_nhanvien">
                                    <option ng-repeat="nv in nhanvien"  value="@{{nv.id}}">@{{nv.ten_nhanvien}}</option>
                                </select>
                            </div>                             
                        </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Ngày đặt</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="name" ng-model="hdn.date_order">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Tổng tiền</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="hdn.tong_tien">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Thanh toán</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="hdn.thanh_toan">
                            </div>
                          </div>                     
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Ghi chú</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="hdn.note">
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
    <script src="/js/hdnhap.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

@stop
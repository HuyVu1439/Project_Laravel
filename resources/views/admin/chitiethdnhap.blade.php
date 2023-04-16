@extends('_admin_layout')
@section('content')
<p style="padding: 5px; font-size:30px;"> <i class="fa fa-table" style="margin:0 10px;"></i>  Quản lý chi tiết hóa đơn nhập</p>
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
                        <th>Id bill nhập</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn vị</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate = "cthdn in chitiethdnhap |filter: q| itemsPerPage: pageSize" current-page="currentPage">
                        <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                        <td>@{{ cthdn.id_bill_nhap }}</td>
                        <td ng-if="cthdn.id_sp==sp.id" ng-repeat="sp in sanpham">@{{ sp.name }}</td>                 
                        <td>@{{ cthdn.sl }}</td>
                        <td>@{{ cthdn.don_vi }}</td>

                        <td><button class="btn btn-info" ng-click="showModal(cthdn.id)"><i class="fas fa-edit"></i></button></td>
                        <td><button class="btn btn-danger" ng-click="deleteClick(cthdn.id)"><i class="fas fa-trash-alt"></i></button></td>
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
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Hóa đơn nhập</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="cthdn.id_bill_nhap">
                                    <option ng-repeat="hdn in hdnhap"  value="@{{hdn.id}}">@{{hdn.id}}</option>
                                </select>
                            </div>                             
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Sản phẩm</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="cthdn.id_sp">
                                    <option ng-repeat="sp in sanpham"  value="@{{sp.id}}">@{{sp.name}}</option>
                                </select>
                            </div>                             
                        </div>                        
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Số lượng</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="cthdn.sl">
                            </div>
                          </div>   
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Đơn vị</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="cthdn.don_vi">
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
    <script src="/js/cthdnhap.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

@stop
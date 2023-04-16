@extends('_admin_layout')
@section('content')
<p style="padding: 5px; font-size:30px;"> <i class="fa fa-table" style="margin:0 10px;"></i>  Quản lý hóa đơn bán</p>
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
                        <th>Khách hàng</th>
                        <th>Ngày đặt hàng</th>
                        <th>Tổng tiền</th>
                        <th>Payment</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr dir-paginate = "hdb in hdban |filter: q| itemsPerPage: pageSize" current-page="currentPage">
                        <td>@{{$index+1+(currentPage-1)*pageSize}}</td>
                        <td ng-if="hdb.id_kh==kh.id" ng-repeat="kh in khachhang">@{{ kh.ten_kh }}</td>
                        <td>@{{ hdb.date_order }}</td>
                        <td>@{{ hdb.tong_tien }}</td>
                        <td>@{{ hdb.payment }}</td>
                        <td>@{{ hdb.status}}</td>
                        <td>@{{ hdb.note}}</td>

                        <td><button class="btn btn-info" ng-click="showModal(hdb.id)"><i class="fas fa-edit"></i></button></td>
                        <td><button class="btn btn-danger" ng-click="deleteClick(hdb.id)"><i class="fas fa-trash-alt"></i></button></td>
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
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Khách hàng</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="hdb.id_kh">
                                    <option ng-repeat="kh in khachhang"  value="@{{kh.id}}">@{{kh.ten_kh}}</option>
                                </select>
                            </div>                             
                        </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Ngày đặt</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="name" ng-model="hdb.date_order">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Tổng tiền</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="hdb.tong_tien">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Payment</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="hdb.payment">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Trạng thái</label>
                            <div class="col-sm-9">
                                <select class="form-control" ng-model="hdb.status">
                                    <option value="Đã đặt hàng">Đã đặt hàng</option>
                                    <option value="Đã hủy">Đã hủy</option>
                                </select>
                            </div>                             
                          </div>
                          <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Ghi chú</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" ng-model="hdb.note">
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
    <script src="/js/hdban.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

@stop
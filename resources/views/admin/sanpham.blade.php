@extends('_admin_layout')
@section('content')

<body class="container-fluid px-4"  ng-app="myapp" ng-controller="mycontroller">
<style>
    #abuttonv a {
            background-color: #fff;
            border: 1px solid #ddd;
            box-sizing: border-box;
            color: FFC800;
            cursor: pointer;
            display: inline-block;
            font-family: din-round,sans-serif;
            font-size: 15px;
            font-weight: 700;
            padding: 10px 12px;
            text-align: center;
            width: 100%;
        }
    #abuttonv ul {
        margin-left: 35%;
    } 
</style>
<h1 class="text-center">Quản lí sản phẩm</h1>
<p>
<div class="col-sm-12 col-md-6">
                <div class="dataTables_length" id="example_length">
                    <label>Show
                        <select ng-model="pageSize" id="pageSize"
                            class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="6">6</option>
                            <option value="9">9</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                        </select>
                    </label>
                </div>
            </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" ng-click="editClick(0)">Thêm sản phẩm</button>
    </p>
    <p>Tìm kiếm: <input type="text" ng-model='q'></p>
        <table class="table table-bordered table-stripper">
            <tr>
                <th>TT</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>               
                <th>Nhà cung cấp</th>               
                <th>Mô tả </th>               
                <th>Giá tiền</th>               
                <th>Giá khuyến mại</th>               
                <th>Số lượng</th> 
                <th>Ảnh mẫu</th>               
                <th>Đơn vị tính</th>
                <th>Sửa</th>
                <th>Xoá</th>

            </tr>
            <tr dir-paginate = "nv in sanphams | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{nv.name}}</td>        
            <td ng-if="nv.id_loai_sp==lsp.id" ng-repeat="lsp in loaisps">@{{ lsp.tenloai }}</td>
            <td ng-if="nv.id_ncc==ncc.id" ng-repeat="ncc in nhacungcap">@{{ ncc.ten_ncc }}</td>
            <td>@{{nv.mota_sp}}</td>
            <td>@{{nv.unit_price | currency :'' :0}}@{{nv.don_vi_tinh}}</td>
            <td>@{{nv.gia_km | currency :'' :0}}@{{nv.don_vi_tinh}}</td>
            <td>@{{nv.so_luong}}</td>
            <td><img src="/upload/sanpham/@{{nv.image}}" style='width:150px;height:250px' alt=""></td>
            <td>@{{nv.don_vi_tinh}}</td>
            <td><button class="btn btn-info" ng-click="editClick(nv.id)">Sửa</button></td>
            <td><button class="btn btn-danger" ng-click= "deleteClick(nv.id)">Xoá</button></td>
        </tr>
        </table>
        <dir-pagination-controls max-size='10' id="abuttonv" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>


        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">@{{modaltitle}}</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group"><label for="">Tên sản phẩm</label>
                                <div><input type="text" ng-model="sanpham.name" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Loại sản phẩm</label>
                                <div>
                                    <select class="form-control" ng-model="sanpham.id_loai_sp">
                                        <option ng-repeat="lsp in loaisps"  value="@{{lsp.id}}">@{{lsp.tenloai}}</option>
                                    </select>
                                </div>                             
                          </div>
                            
                          <div class="form-group">
                            <label for="exampleFormControlSelect1">Nhà cung cấp</label>
                            <div>
                                <select class="form-control" ng-model="sanpham.id_ncc">
                                    <option ng-repeat="ncc in nhacungcap"  value="@{{ncc.id}}">@{{ncc.ten_ncc}}</option>
                                </select>
                            </div>                             
                          </div>
                            
                            <div class="form-group">
                                <label for="">Giá tiền</label>
                                <div><input type="text" ng-model="sanpham.unit_price" class="form-control"></div>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Giá kuyến mãi</label>
                                <div><input type="text" ng-model="sanpham.gia_km" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả sản phẩm</label>
                                <div>
                                    <textarea type="text" ng-model="sanpham.mota_sp" class="form-control" cols="30" rows="10"></textarea></div>
                            </div>

                            <div class="form-group">
                                <label for="">Số lượng</label>
                                <div><input type="text" ng-model="sanpham.so_luong" class="form-control"></div>
                            </div>

                            <div class="form-group">
                                <label for="name">Ảnh mẫu</label>
                                <div>
                                    <input type="file" class="form-control" id="file-upload" ng-model="sanpham.image">
                                </div>
                                </br>
                                <div style="width:300px;height:300px" id="image">
                                    <img class="text-center" src="/upload/sanpham/@{{sanpham.image}}" alt="Ảnh" style="width:100%;height:100%" ng-model="lsp.image">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Đợn vị tính: </label>
                                <div><input type="text" ng-model="sanpham.don_vi_tinh" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click = "saveData()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="/js/angular.min.js"></script>
        <script src="/js/sanphamcontroller.js"></script>
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM
            });
        </script>
  </body>
@stop
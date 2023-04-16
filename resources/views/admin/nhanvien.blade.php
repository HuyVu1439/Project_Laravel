@extends('_admin_layout')
@section('content')
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
 <div class="container-fluid px-4" ng-app="myapp" ng-controller="mycontroller">
    <h1 class="text-center">Quản lí nhân viên</h1>
    <p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" ng-click="editClick(0)">
            Create
        </button>
    </p>
    <p>Search: <input type="text" ng-model='q'></p>
    <table class="table table-bordered table-stripper">
            <tr>
                <th>TT</th>
                <th>Full name</th>
                <th>Sex</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Number_Phone</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr dir-paginate = "nv in nhanviens | filter:q | itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
                <td>@{{nv.ten_nhanvien}}</td>
                <td>@{{nv.gioitinh}}</td>
                <td>@{{nv.ngaysinh}}</td>
                <td>@{{nv.quequan}}</td>
                <td>@{{nv.sdt}}</td>
                <td>@{{nv.email}}</td>
                <td><button class="btn btn-info" ng-click="editClick(nv.id)"> Edit</button></td>
                <td><button class="btn btn-danger" ng-click = "deleteClick(nv.id)"> Delete</button></td>
            </tr>
        </table>
        <dir-pagination-controls max-size='5' id="abuttonv" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls>
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title">@{{modalTitle}}</h5>
                                    <button type="button" class="close" ng-click="modalHide()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="form-group">
                            <label for="">Full name: </label>
                                <div><input type="text" ng-model="nhanvien.ten_nhanvien" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Sex: </label>
                                <select ng-model="nhanvien.gioitinh" class="form-control">
                                    <option value="Nam">Nam</option>
                                    <option value="Nu">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Birthday: </label>
                                <div><input type="text" ng-model="nhanvien.ngaysinh" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Address: </label>
                                <div><input type="text" ng-model="nhanvien.quequan" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Number_Phone: </label>
                                <div><input type="text" ng-model="nhanvien.sdt" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Email: </label>
                                <div><input type="text" ng-model="nhanvien.email" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="">Level: </label>
                                <div><input type="text" ng-model="nhanvien.capbac" class="form-control"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" ng-click="modalHide()">Close</button>
                        <button type="button" class="btn btn-primary" ng-click = "updateData()">Save</button>
                    </div>
                </div>
            </div>
        </div>

       
        <script src="/js/angular.min.js"></script>
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
        <script src="/js/nhanviencontroller.js"></script>
        <script>
            $('#exampleModal').on('show.bs.modal', event => {
                var button = $(event.relatedTarget);
                var modal = $(this);
                // Use above variables to manipulate the DOM

            });
        </script>
    </div>
@stop
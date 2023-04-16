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
    <h1 class="text-center">Quản lí nhà cung cấp</h1>
    <p>
        <button class="btn btn-primary" ng-click="editClick(0)">Create</button>
    </p>
    <p>Search: <input type="text" ng-model='q'></p>
    <table class="table table-bordered">
        <tr>
            <th>TT</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Number Phone</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr dir-paginate = "ncc in nhacungcaps | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{ $index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{ ncc.ten_ncc }}</td>
            <td>@{{ ncc.diachi_ncc }}</td>
            <td>@{{ ncc.email }}</td>
            <td>@{{ ncc.sdt }}</td>
            <td><button class="btn btn-info" ng-click="editClick(ncc.id)">Edit</button></td>
            <td><button class="btn btn-danger" ng-click="deleteClick(ncc.id)">Delete</button></td>
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
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" ng-model="nhacungcap.ten_ncc">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" ng-model="nhacungcap.diachi_ncc">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" ng-model="nhacungcap.email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Number Phone</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" ng-model="nhacungcap.sdt">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" ng-click="modalHide()">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="updateData()">Save</button>
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
    <script src="/js/angular.min.js"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
    <script src="/js/nhacungcapcontroller.js">

    </script>
@stop
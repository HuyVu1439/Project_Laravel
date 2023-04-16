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
    <h1 class="text-center">Quản lí tin tức</h1>
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
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            <tr dir-paginate = "tt in tintucs  | filter:q | itemsPerPage: pageSize" current-page="currentPage">
                <td>@{{$index+1 +(currentPage-1)*pageSize}}</td>
                <td>@{{tt.title}}</td>
                <td>@{{tt.content}}</td>
                <td><img src="/upload/sanpham/@{{tt.image}}" style='width:100px;height:100px' alt=""></td>
                <td><button class="btn btn-info" ng-click="editClick(tt.id_new)"> Edit</button></td>
                
                <td><button class="btn btn-danger" ng-click = "deleteClick(tt.id_new)"> Delete</button></td>
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
                            <label for="">Title: </label>
                                <div><input type="text" ng-model="tintuc.title" class="form-control"></div>
                            </div>
                            <div class="form-group">
                            <label for="">Content: </label>
                                <div><input type="text" ng-model="tintuc.content" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label for="name">Ảnh:</label>
                                <div>
                                    <input type="file" class="form-control" id="file-upload" ng-model="tintuc.image">
                                </div>
                                </br>
                                <div style="width:100px;height:100px" id="image">
                                    <img src="/upload/sanpham/@{{tintuc.image}}" alt="Ảnh" style="width:100%;height:100%" ng-model="lsp.image">
                                </div>
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

        <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
            
        });
    </script>
        <script src="/js/angular.min.js"></script>
        <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>
        <script src="/js/tintuccontroller.js"></script>
        
    </div>
@stop
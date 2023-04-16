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
    <h1 class="text-center">Quản lí loại sản phẩm</h1>
    <p>
        <button class="btn btn-primary" ng-click="editClick(0)">Create</button>
    </p>
    <p>Search: <input type="text" ng-model='q'></p>
    <table class="table table-bordered">
        <tr>
            <th>TT</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tr dir-paginate = "lsp in loaisps | filter:q | itemsPerPage: pageSize" current-page="currentPage">
            <td>@{{ $index+1 +(currentPage-1)*pageSize}}</td>
            <td>@{{ lsp.tenloai }}</td>
            <td><button class="btn btn-info" ng-click="editClick(lsp.id)">Edit</button></td>
            <td><button class="btn btn-danger" ng-click="deleteClick(lsp.id)">Delete</button></td>
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

                              <input type="text" class="form-control" id="tenloai" ng-model="loaisp.tenloai">
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="/js/angular.min.js"></script>
    <script src="https://rawgit.com/michaelbromley/angularUtils-pagination/master/dirPagination.js"></script>

    <script src="/js/loaispcontroller.js">
    </script>
@stop
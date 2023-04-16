<div class="navbar-nav w-100 overflow-hidden" style="height: auto" ng-app="myapp" ng-controller="mycontroller">
    <div ng-repeat="lsp in loaisanpham">
        <a href="/frontend/shoploai/id?={{lsp.id}}" class="nav-link">{{lsp.tenloai}}</a>
    </div>
</div>
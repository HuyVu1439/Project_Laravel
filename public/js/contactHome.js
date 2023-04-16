var app = angular.module('myapp', []);
app.controller('mycontroller', function($scope, $http) {
    $http({
        Method: "GET",
        url: "http://127.0.0.1:8000/api/loaisps/"
    }).success(function(response) {
        console.log(response);
        $scope.loaisanpham = response;
    });   
});
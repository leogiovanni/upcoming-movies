app.controller("moviesCtrl", function ($scope, $http, $filter, $location) {
    
    $scope.title  = 'Movies';
    $scope.movies = [];
    $scope.movie  = null;
    $scope.page   = 1;
    $scope.key    = '1f54bd990f1cdfb230adb312546d765d';

    var loadMovies = function () {
        $http.get("https://api.themoviedb.org/3/movie/upcoming?api_key="+$scope.key+"&language=en-US&page="+$scope.page).then(function (response) {
            $scope.movies = response.data.results;
        }, function (error){
            $scope.message = "Error";
        });
    };

    $scope.go = function (page){
        $scope.page = page;
        loadMovies();
    };

    $scope.details = function (id){
        $http.get("https://api.themoviedb.org/3/movie/"+id+"?api_key="+$scope.key+"&language=en-US").then(function (response) {
            $scope.movie = response.data;
            $scope.title = $scope.movie.title;
        }, function (error){
            $scope.message = "Error";
        });
    }

    $scope.leaveDetails = function(){
        $scope.movie = null;
        $scope.title = 'Movies';
    }

    loadMovies();
});
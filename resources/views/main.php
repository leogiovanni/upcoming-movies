<!doctype html>
<html ng-app="upcomingMovies">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movies</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" text="text/css" href="/css/main.css">
        <link rel="stylesheet" text="text/css" href="/css/bootstrap/bootstrap.min.css">

        <!-- Scripts -->
        <script src="/js/angular/angular.min.js"></script>
        <script src="/js/angular/angular-messages.min.js"></script>
        <!--<script src="js/angular/i18n/angular-locale_pt-br.js"></script>-->
        <script>
            angular.module("upcomingMovies", ["ngMessages"]);
            angular.module("upcomingMovies").controller("moviesCtrl", function ($scope, $http, $filter) {
                $scope.movies = [];
                $scope.page   = 1;

                var loadMovies = function () {
                 $http.get("https://api.themoviedb.org/3/movie/upcoming?api_key=1f54bd990f1cdfb230adb312546d765d&language=en-US&page="+$scope.page).then(function (response) {
                        $scope.movies = response.data.results;
                    }, function (error){
                         $scope.message = "Error";
                    });
                };

                $scope.go = function (page){
                    $scope.page = page;
                    loadMovies();
                };

                loadMovies();
            });
        </script>

    </head>
    <body ng-controller="moviesCtrl">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Movies</a>
              
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li> -->
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2 search" type="search" placeholder="Search" aria-label="Search" 
                        ng-model="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
       
        <div class="row">
            <div class="col-sm-12">
                <div class="row">                        
                    <div class="col-md-6"
                        ng-class="{'selected bold': movie.selected}" 
                        ng-repeat="movie in movies | filter: search | orderBy:criterioDeOrdenacao:direcaoDaOrdenacao">
                        <div class="col-sm-4 left">
                            <img ng-if="movie.backdrop_path != null" src='https://image.tmdb.org/t/p/w185_and_h278_bestv2/{{movie.backdrop_path}}'>
                        </div>
                        <div class="col-sm-8 left">
                            <b>{{movie.title}} </b> 
                            <span ng-if="movie.title != movie.original_title">| {{movie.original_title}} </span>
                            <p style="font-size: 12px;">Release date: {{movie.release_date | date:'MM/dd/yyyy'}}</p>
                            <hr ng-if="movie.overview != null">
                            <p>{{movie.overview}}</p>
                        </div>                                
                    </div>
                </div>
            </div>
        </div>

        <div class="row pagination"> 
            <div class="col-sm-5 left">&nbsp;</div>
            <div class="col-sm-2 left">
                <a href="" ng-if="page > 1" class="previous" ng-click="go(page -1)"> << Previous </a>
                <a href="" class="next" ng-click="go(page + 1)"> Next >> </a>
            </div>
            <div class="col-sm-5">&nbsp;</div>
        </div>

        <div class="row footer"><div class="col-sm-12"><p class="right">All Rights Reserved</p></div></div>
    </body>
</html>


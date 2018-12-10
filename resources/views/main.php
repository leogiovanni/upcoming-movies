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

    </head>
    <body ng-controller="moviesCtrl">
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">{{title}}</a>
              
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

        <div class="row" ng-if="!movie">                     
            <div class="col-md-6 movie"
                ng-class="{'selected bold': movie.selected}" 
                ng-repeat="movie in movies | filter: search | orderBy:'-vote_average'">
                <div class="row">    
                    <div class="col-sm-4 left image">
                        <img ng-if="movie.poster_path != null" src='https://image.tmdb.org/t/p/w185_and_h278_bestv2/{{movie.poster_path}}'>
                    </div>
                    <div class="col-sm-8 left description">
                        <b><a href='' ng-click='details(movie.id)'>{{movie.title}}</a></b> 
                        <span ng-if="movie.title != movie.original_title">| {{movie.original_title}} </span>
                        <span class="votes">{{movie.vote_average}}</span>
                        <p class="font-small">Release date: {{movie.release_date | date:'MM/dd/yyyy'}}</p>
                        <hr ng-if="movie.overview != null">
                        <p>{{movie.overview}}</p>
                    </div>  
                </div>                              
            </div>
        </div>

        <div class="row pagination" ng-if="!movie"> 
            <div class="col-sm-5 left">&nbsp;</div>
            <div class="col-sm-2 left">
                <a href="" ng-if="page > 1" class="previous" ng-click="go(page -1)"> << Previous </a>
                <a href="" class="next" ng-click="go(page + 1)"> Next >> </a>
            </div>
            <div class="col-sm-5">&nbsp;</div>
        </div>

        <div class="row details" ng-if="movie"> 
            <div class="col-sm-2 left">&nbsp;</div>
            <div class="col-sm-8 left">
                <div class="row">    
                    <div class="col-sm-3 left image">
                        <img ng-if="movie.backdrop_path != null" src='https://image.tmdb.org/t/p/w185_and_h278_bestv2/{{movie.backdrop_path}}'>
                    </div>
                    <div class="col-sm-9 left description">
                        <span ng-if="movie.title != movie.original_title">{{movie.original_title}} </span>
                        <hr ng-if="movie.title != movie.original_title">
                        <p>{{movie.overview}}</p>
                        <label ng-repeat="genre in movie.genres" class="genre">{{genre.name}}&nbsp; </label>
                        <hr ng-if="movie.overview != null">
                        <p class="font-small">Release date: {{movie.release_date | date:'MM/dd/yyyy'}}</p>
                        <p class="font-small">Duration: {{movie.runtime}} min</p>
                        <br>
                        <a href="" ng-click="leaveDetails()"> << Voltar </a>
                    </div>  
                </div>   
            </div>
            <div class="col-sm-2">&nbsp;</div>
        </div>

        <!-- Scripts -->
        <script src="/js/angular/angular.min.js"></script>

        <script>
            var app = angular.module('upcomingMovies', []); 
        </script>

        <!-- Controllers -->
        <script src="/js/controllers/moviesCtrl.js"></script>
    </body>
</html>


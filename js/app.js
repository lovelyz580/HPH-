var m = angular.module('app', ['ui.router'])
m.config(['$stateProvider', '$urlRouterProvider', function ($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.otherwise("/hot_movie.php/1")
        $stateProvider
                //        热门
                .state("hotmovie", {
                    url: "/hot_movie.php/:page",
                    templateUrl: "./hot_movie.php",
                    controller: "hotctrl"
                })
                //      即将          
                .state("soonmovie", {
                    url: "/soon_movie.php/:page/:state",
                    templateUrl: "./soon_movie.php",
                    controller: "hotctrl"
                })
//                上映中
                .state("rankmovie", {
                    url: "/rank_movie.php/:page/:state",
                    templateUrl: "./rank_movie.php",
                    controller: "hotctrl"
                })
                //                排行
                .state("paihmovie", {
                    url: "/paih_movie.php/:page",
                    templateUrl: "./paih_movie.php",
                    controller: "paictrl"
                })
                //类别排行
                .state("typemovie", {
                    url: "/type_movie.php/:page",
                    templateUrl: "./type_movie.php",
                    controller: "typectrl"
                })
 //发布
            .state('addmovie', {
                'url': '/add_movie.php',
                'templateUrl': './add_movie.php',
                'controller': 'addmovie',
                'title': '发布影片'
            })
//                详情
                .state("details", {
                    url: "/details.php/:mid",
                    templateUrl: "./details.php",
                    controller: "details"
                })
//                搜索
                .state("searchmovie", {
                    url: "/search_movie.php/:key",
                    templateUrl: "./search_movie.php",
                    controller: "search"
                })

    }])


m.controller('hotctrl', ['$scope', '$http', '$state', '$stateParams', function ($scope, $http, $state, $stateParams) {
        var data;
        var state;
        if ($stateParams.page == "" || $stateParams.page == undefined) {
            $scope.currentPage = 1;
        } else {
            $scope.currentPage = $stateParams.page;
        }
        if ($stateParams.state == "" || $stateParams.state == undefined) {
            data = {page: $scope.currentPage}
        } else {
            state = $stateParams.state;
            data = {page: $scope.currentPage, state: state};
        }



//        获取某一页的数据
        $http({
            url: './hotmovie.php',
            method: 'get',
            params: data,
        }).then(function (d) {
//            console.log(d);
            $scope.movies = d.data.data;
            $scope.pageList = d.data.pageList;
            $scope.pre = d.data.pre;
            $scope.next = d.data.next;
            $scope.currentPage = d.data.page;
        }, function (d) {})

        $scope.isActive = function (p) {
            return $scope.currentPage == p;
        }
        $scope.pageSelect = function (p) {
            if (state = null || state == "" || state == undefined) {
                $state.go($state.$current.self.name, {page: p});
            } else {
                $state.go($state.$current.self.name, {page: p});
            }
        }


    }])
m.controller('paictrl', ['$scope', '$http', '$state', '$stateParams', function ($scope, $http, $state, $stateParams) {
        var data;
        var state;
        if ($stateParams.page == "" || $stateParams.page == undefined) {
            $scope.currentPage = 1;
        } else {
            $scope.currentPage = $stateParams.page;
        }
        if ($stateParams.state == "" || $stateParams.state == undefined) {
            data = {page: $scope.currentPage}
        } else {
            state = $stateParams.state;
            data = {page: $scope.currentPage, state: state};
        }

//        获取影片排行榜的数据
        $http({
            url: './paihangmovie.php',
            method: 'get',
            params: data,
        }).then(function (d) {
            console.log(d);
            $scope.movies = d.data.data;
            $scope.pageList = d.data.pageList;
            $scope.pre = d.data.pre;
            $scope.next = d.data.next;
            $scope.currentPage = d.data.page;
        }, function (d) {})

        $scope.isActive = function (p) {
            return $scope.currentPage == p;
        }
        $scope.pageSelect = function (p) {
            if (state = null || state == "" || state == undefined) {
                $state.go("paihmovie", {page: p});
            } else {
                $state.go("paihmovie", {page: p, state: state});
            }
        }

    }])
//添加电影
m.controller('addmovie', ['$scope', '$rootScope', 'type', '$http', function ($scope, $rootScope, type, $http) {
    $scope.data = {};
   
    type.getlist().then(function (res) {
        $scope.type = res.data;
        $rootScope.typeAll = res.data;
    });
   
    $('#btn').click(function () {
        $scope.data.images = $('#images').val();
    });
  
}]);



//        电影详情
m.controller('details', ['$scope', '$http', '$state', '$stateParams', function ($scope, $http, $state, $stateParams) {
        var mid = $stateParams.mid;
//        console.log(mid);
        $http({

            url: './de-tails.php',
            method: 'get',
            params: {mid: mid}
        }).then(function (d) {
            console.log(d);
            $scope.movie = d.data.movie;
            $scope.comments = d.data.comments;
        }, function (error) {});
//添加评论
        $scope.addComment = function () {
            $http({
                url: './addcomment.php',
                method: 'post',
                data: $.param({mid: $scope.movie.mid, comment: $scope.content}),
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
            }).then(function (d) {
                console.log(d);
                if (d.data.code == 1) {

                    swal("完成!");
                    //自动刷新页面
                    setTimeout(function () {  //使用  setTimeout（）方法设定定时2000毫秒
                        window.location.reload();//页面刷新
                    }, 2000);
                } else {
                    alert("失败！");
                    //自动刷新页面
                    window.location.reload();
                }
            }, function (error) {});
        }
    }]);

//搜索电影
m.controller('search', ['$scope', '$stateParams', '$http', function ($scope, $stateParams, $http) {
        var key = $scope.key;
         console.log(key);
        $http({
            url: './search.php',
            method: 'get',
            params:{key:key}
            
        }).then(function (d) {
           console.log(d);
            $scope.movies = d.data.data;
            var movies = $scope.movies;
            console.log (movies);
        }, function (error) {});
    }
    
    ])

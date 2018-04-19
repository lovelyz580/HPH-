<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body ng-app="myapp" ng-controller="myctrl">
        <form id="uploadForm" action="addmovie.php" method="post" enctype="multipart/form-data" style="display: inline-block">
            <input type="text" name="name"/>
            <input type="text" name="date"/>
            <input type="text" name="performer"/>
            <input type="text" name="brief"/>
            <input type="file" name="images"/>
            <input type="text" name="typeid"/>
            <input type="text" name="score"/>
            <input type="text" name="state"/>
            <input type="text" name="hot"/>
            <input type="submit" value="submit"/>
        </form>
    </body>
    <script type="text/javascript">
    angular.module('myapp',[])
            .controller('myctrl',['$scope','$http',function($scope,$http){
                    $scope.save = function(){
                        var fromData = new FormData($("#form1")[0])
                    }
                    $http({
                        method:'post',
                       url:'addmovie.php',
                       params:fromData
                    }).then( function(d){},function(d){});
    }])
    
    
    
    </script>
</html>

<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href=" ./images/png.png">
        <meta charset="UTF-8">
        <title>豆瓣网首页</title>
        <link rel="stylesheet" href="./css/bootstrap.css"/>
        <link rel="stylesheet" href="./css/sweetalert.css"/>
        <style type="text/css">
            *{
                margin: 0;
                padding: 0;
            }
            a{
                color: #333
            }
            .search-nav{
                background: #f0f3f5;
                margin-top: -20px;
            }
            .search-box{
                height: 118px;
                border-bottom: 1px solid #E3EBEC;
            }
            .search-img{
                height: 118px;
                line-height: 118px;
            }
            .menu-box{
                height: 54px;
                border-top: 1px solid #E3EBEC;
            }
            .menu a{
                padding: 16px 0px;
                margin-right: 4%;
                font-size: 16px;
                color: #634D4D;
            }
            .menu a.active{
                color: #258DCD;
                border-bottom: 2px solid #258DCD;
                text-decoration: none;
            }
            a:active,a:link,a:visited,a:hover{
                text-decoration: none;
            }
            .item h6{
                padding-left: 4px;
                
            }
            .item img{
                width: 100%;
            }
            .item div{
                padding-bottom: 2px;
            }
            .item-box > div{
                margin-top: 32px;
            }
            .font-color {
                color: #0EABF4;
                padding: 0 10px;
            }
            .border{
                background: none;
            }
            .border p {
                text-indent: 2em;
            }
            textarea{
                box-shadow: inset 0 1px 14px 0 rgba(0,0,0,0.30);
                border-radius: 6px;
                width: 100%;
                padding: 8px;
                outline: none;
            }
            .btnn{
                padding: 6px 20px;
            }
            .Page li.active{
                background-color: #337ab7;
            }
            span{
                margin: 10px 10px;
            }


        </style>
        <script type="text/javascript"  src="./js/jquery-3.2.1.js"></script>
        <script type="text/javascript"  src="./js/bootstrap.js"></script>
        <script type="text/javascript"  src="./js/angular.js"></script>
        <script type="text/javascript" src="js/sweetalert.js"></script>
        <script type="text/javascript"  src="./js/angular-ui-router.min.js"></script>
        <script type="text/javascript"  src="./js/app.js"></script>
        <script type="text/javascript"  src="./service/controller.js"></script>
    </head>


    <body ng-app="app" style="background-color: #fafafa">
        <!--导航栏-->
        <nav class="navbar navbar-inverse" style="background: #384554;border-radius: 0;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
                        <span class="sr-only">Toggle navigation </span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="./images/Logo1.png" alt=""/></a>
                </div> 
                <!--导航-->
                <div class="collapse navbar-collapse "  id="bs-example-navbar-collapse-9" >
                    <ul class="nav navbar-nav text-center hidden-sm hidden-md hidden-lg">
                        <li><a ui-sref="hotmovie({page:1})" ui-sref-active="active">热门电影</a></li>
                        <li><a ui-sref="soonmovie({page:1,state:1})" ui-sref-active="active">即将上映</a></li>
                        <li><a ui-sref="rankmovie({page:1,state:2})" ui-sref-active="active">上映中的电影</a></li>
                        <li><a ui-sref="paihmovie({page:1})" ui-sref-active="active">影片排行榜</a></li>
                        <li><a href="http://localhost/doubanban/#!/add.html">影片发布</a></li>
                        
                    </ul>
                </div>
            </div>

        </nav>
        <!--导航栏-->

        <!--搜索框--> 
        <div class="container-fluid search-nav">
            <div class="row search-box">
                <div class="col-md-8 col-md-offset-2 search-img">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 hidden-sm hidden-xs text-right">
                            <a href="#"><img src="./images/Logo.png" alt=""/> </a> 
                        </div>
                        <div class="col-md-6 col-sm-12 text-center">
                            <div class="input-group">
                                
                                <input type="text" class="form-control" style="margin-top:42px;" ng-model="key" placeholder="搜索电影"/>
                                 <span class="input-group-btn"ui-sref="searchmovie({key:movie.key})" ng-click="search()">
                                    <button class="btn btn-primary" style="background:#258DCD;">
                                        <i class="glyphicon glyphicon-search" style="#FFF"></i>
                                    </button>
                                </span>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
            <div class="row menu-box hidden-xs"> 
                <div class="col-md-8 menu col-md-offset-2 text-center" style="height:54px;line-height:54px;">
                    <div class="row">
                        <div class="col-md-11" style="margin-left:3%;"> 
                            <a ui-sref="hotmovie({page:1})" ui-sref-active="active">热门电影</a>
                            <a ui-sref="soonmovie({page:1,state:1})" ui-sref-active="active">即将上映</a>
                            <a ui-sref="rankmovie({page:1,state:2})" ui-sref-active="active">上映中的电影</a>
                            <a ui-sref="paihmovie({page:1})" ui-sref-active="active">影片排行榜</a>
                            <a href="http://localhost/doubanban/#!/add.html">影片发布</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
        <!--搜索框--> 
<!--内容-->
        <div ui-view >
            
        </div><!--内容-->
        
        
        
        
        
<!--底部-->
        <div style=" width:100%;text-align: center;height: 34px;border-top: 2px solid #EEEEEE;line-height: 34px;background: #FFF;position: fixed;bottom: 0px;z-index: 99999">
            © 2017－2019 <a href="http://www.lovevivian.com/"/>www.lovevivian.com </a>,
        &nbsp;&nbsp;&nbsp; all rights reserved &nbsp;&nbsp;&nbsp;回忆❤记录
        <a href="./1.html" style="color:#3333331f">详情页面</a><a href="./indexx.html" style="color:#3333331f">结束页面</a>
    </div>
<!--底部-->

</body>
</html>

<div class="container">
    <h4 style="border-left: 2px solid #258DCD;padding-left: 8px;margin-top:20px;margin-bottom: -12px; ">
        热门电影
    </h4>
</div>
<div class="container item-box">
    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-xl-3 item" ng-repeat="movie in movies">
        <div style="background: #FFF;">
            <a href="" ui-sref="details({mid:movie.mid})" >

                <img ng-src="{{ movie.images}}" alt="Image">
                <h6>{{ movie.mname}}({{ movie.date}})</h6>
                <h6>类型：{{ movie.tname}}</h6>
            </a>
        </div>
    </div>


</div>
<nav aria-label="Page navigation" class="text-center">
    <ul class="pagination" style="cursor: pointer"> 
        <li>
            <a ng-click="pageSelect(pre)">
                <span>上一页</span>
            </a>
        </li>
        <li ng-class="{active:isActive(key)}" ng-repeat="key in pageList">
            <a ng-click="pageSelect(key)">{{key}}</a>
        </li> 
        <li>
            <a ng-click="pageSelect(next)">
                <span>下一页</span>
            </a>
        </li>
    </ul>
</nav>






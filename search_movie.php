<div class="container" style="display: flex">
    <h4 style="border-left: 2px solid #258DCD; padding-left: 8px; margin-top: 20px;margin-bottom: -12px;">
        搜索到的影片</h4>
</div>
<div class="container item-box">
    <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-xl-3 item" ng-repeat="movie in movies">
        <div style="background: #FFF;">
            <a href="" ui-sref="details({mid:movie.id})" >

                <img ng-src="{{ movie.images}}" alt="Image">
                <h6>{{ movie.name}}({{ movie.date}})</h6>
                <h6>类型：{{ movie.name}}</h6>
            </a>
        </div>
    </div>
    <script type="text/javascript">
    if(movies == ""){
        alert("未找到您要搜索的电影1");
    }
    
    
    
    </script>

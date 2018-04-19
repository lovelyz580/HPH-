<div class="container" style="margin-top: 56px; font-family: '微软雅黑' ">
    <div class="row">
        <div class="col-md-1 col-sm-12 col-xs-12" style="margin-right: 40px;">
            <img src="{{movie.images}}" class="img-responsive center-block"
                 style="min-width: 117px;" alt="">
        </div>
        <div class="col-xs-12 hidden-md hidden-lg" style="height: 8px;"></div>
        <div class="col-xs-2 col-sm-2"></div>
        <div class="col-md-10 col-sm-8 col-xs-8">
            <h3 style=" margin-top: 8px;">{{movie.mname}}<span
                    style="color: rgba(21,21,21,0.60);">（{{movie.date}}）</span></h3>
            <h4 style="margin-top: 8px; font-size: 16px; ">类型：<span class="font-color">{{movie.tname}}</span></h4>
            <h4 style="margin-top: -1px; font-size: 16px; ">主演：{{movie.performer}}</h4>
            <p style="margin-top: -3px;text-indent: 2em;">{{movie.brief}} </p>
        </div>
    </div>
</div>
<div class="container">
    <h4 style="border-left: 2px solid #258DCD; padding-left: 8px; margin-top: 40px;">
        热门影评</h4>
</div>
<div class="container">
    <div class="row text-center" ng-show="movie.comment.length==0">
        <h4>暂无评论，快来评论吧~</h4>
    </div>
    <ul class="list-group">
        <li class="list-group-item border" ng-repeat="c in comments">
            <h4><img src="./public/images/2017-08-14_115353.png" alt=""
                     style="width: 22px;height: 22px;border-radius: 50%; vertical-align: middle">
                <span style="font-size: 16px;font-family: '微软雅黑';vertical-align: middle;font-weight: bold;letter-spacing: 1.33px;color: #333333;">匿名</span>
            </h4>
            <p>
                {{c.content}}
            </p>
            <p class="text-right">
                {{c.date + '000' | date:'M月d日'}}
            </p>
        </li>
    </ul>
</div>
<div class="container" style="margin-bottom: 80px;">
    <div class="row">
        <div class="col-md-12">
            <form>
                <textarea rows="8" ng-model="content"></textarea>
                <div class="col-md-12 text-right" style="margin-top: 8px;">
                    <div class="col-md-11">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary btnn btn-block" ng-click="addComment()">评论</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

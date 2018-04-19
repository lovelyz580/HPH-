<div class="container" style="margin-bottom: 60px;">
    <div class="row">
        <form enctype="multipart/form-data" id="upForm">
            <div class="col-md-6">
                <div class="col-md-12 hidden-xs hidden-sm" style="height: 100px;">
                </div>
                <div class="col-md-12 hidden-xs hidden-sm" style="height: 100px;">
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 24px;">
                    <label for="avatar-upload" class="file" style="cursor: pointer;"><img
                            src="./public/images/2017-08-12_230041.png"
                            alt=""
                            class="img-responsive" style="height: 258px;"></label>
                    <input type="file" name="files" style="display: none;" id="avatar-upload">
                    <input type="hidden" id="images" ng-model="data.images">
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="col-md-7" style="padding-top: 45px;">
                    <div class="form-group">
                        <label for="movie">影片名</label>
                        <input type="text" ng-model="data.name" class="form-control" id="movie" placeholder="请输入影片名">
                    </div>
                    <div class="form-group">
                        <label for="zhuyan">主演</label>
                        <input type="text" ng-model="data.performer" class="form-control" id="zhuyan"
                               placeholder="请输入主演，用 / 隔开">
                    </div>
                    <div class="form-group">
                        <label for="date">年份</label>
                        <input type="text" ng-model="data.date" class="form-control" id="date" placeholder="请输入年份">
                    </div>
                    <div class="form-group">
                        <label>分类</label>
                        <select class="form-control" ng-options="v.id as v.name for v in type"
                                ng-model="data.typeid">
                            <option value="">请选择分类</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="score">评分</label>
                        <input type="text" ng-model="data.score" class="form-control" id="score" placeholder="请输入评分">
                    </div>
                    <div class="form-group">

                        <label>是否上映</label>
                        <div class="radio">
                            <label>
                                <input type="radio" ng-model="data.state" value="1" checked>
                                是
                            </label>
                            <label>
                                <input type="radio" ng-model="data.state" value="2">
                                否
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>是否热门</label>
                        <div class="radio">
                            <label>
                                <input type="radio" ng-model="data.hot" value="1" checked>
                                是
                            </label>
                            <label>
                                <input type="radio" ng-model="data.hot" value="0">
                                否
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>简介</label>
                        <textarea class="form-control" rows="4" ng-model="data.brief"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary btn-block"  id="btn">发布影片</button>

                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    
    $('#avatar-upload').change(function (event) {　　
    var formData = new FormData($('form')[0]);
    formData.append('file', $(':file')[0].files[0]);
    $.ajax({
    url: './upload.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
            var srcPath = data;
            $('.file img').attr('src', srcPath);
            $('#images').val(srcPath);
            }
    })
    });</script>

<!--载入父类模板-->
<extend file='../master'/>
<block name="content">
    <ul class="nav nav-tabs">
        <li><a href="{{u('lists',['m'=>$_GET['m']])}}">列表</a></li>
        <!--        将父类模板点击的功能块,获得地址栏m参数-->
        <li class="active"><a href="{{u('post',['m'=>$_GET['m']])}}">添加</a></li>
    </ul>
    <br>
    <form action="" method="post" id="module" ng-controller="moduleCtr" class="form-horizontal" role="form"
    ">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">消息管理</h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">关键词</label>
                <div class="col-sm-10">
                    <input type="text" autofocus name="keyword" class="form-control" id="" placeholder="">
                </div>
            </div>
        </div>
    </div>
    {{$messageDispay}}
    <div class="form-group">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    </div>
    </form>
</block>
<script>
    require(['angular', 'util'], function (angular, util) {
        //定义使用 angular 模块,控制器
        angular.module('module', []).controller('moduleCtr', ['$scope', function ($scope, _) {
            //判断如果有go方法 则调用执行这个module 并将$scope注入到此函数中
            if ($.isFunction(go)) {
                go($scope, _);
            }

            //表单提交的时候判断 如果有replySub方法, 传入$scope并调用执行
            $('form').submit(function () {
                if ($.isFunction(replySub)) {
                    replySub($scope, _);
                }
            })

        }]);
        angular.bootstrap(document.getElementById('module'), ['module']);
    })
</script>
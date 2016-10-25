<extend file='../master'/>
<block name="content">
    <form action="" method="post" class="form-horizontal" role="form">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">系统消息</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">默认回复</label>
                    <div class="col-sm-10">
                        <input type="text" name="content" value="{{v('config.default_message')}}" class="form-control" id="" placeholder="">
                        <span class="help-block">当没有响应时使用此内容回复给粉丝</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </form>
</block>
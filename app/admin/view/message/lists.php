<!--载入父类模板-->
<extend file='../master'/>
<block name="content">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1">列表</a></li>
<!--        将父类模板点击的功能块,获得地址栏m参数-->
        <li><a href="{{u('post',['m'=>$_GET['m']])}}">添加</a></li>
    </ul>
    <br>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>关键词</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    <foreach from="$data" value="$v">
                        <tr>
                            <td>{{$v['kid']}}</td>
                            <td>{{$v['keyword']}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success">编辑</button>
                                    <button type="button" class="btn btn-default">删除</button>
                                </div>
                            </td>
                        </tr>
                    </foreach>
                </tbody>
            </table>
            {{$data->links()}}
        </div>
    </div>
</block>
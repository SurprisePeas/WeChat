<html>
<head>
	<link href="resource/hdjs/css/bootstrap.min.css" rel="stylesheet">
	<link href="resource/hdjs/css/font-awesome.min.css" rel="stylesheet">
	<script src="resource/hdjs/js/jquery.min.js"></script>
	<script src="resource/hdjs/app/util.js"></script>
	<script src="resource/hdjs/require.js"></script>
	<script src="resource/hdjs/app/config.js"></script>
</head>
<body>
<!--
         =====================  父类 模板  =====================
-->
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{u('entry/index')}}">WeChat-微信开发</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{v('user.username')}} <span
							class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{u('entry/userOut')}}">退出</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<div class="list-group">
				<a href="#" class="list-group-item disabled">
					微信管理
				</a>
				<a href="{{u('message/lists',['m'=>'base'])}}" class="list-group-item">消息管理</a>
				<!--                调用helper文件里的 site_url方法 进行处理跳转
									helper文件在app启动文件里被定义为 自动加载的文件,所以可以直接在里面定义方法,随时可以调用
				-->
				<a href="{{site_url('site/lists','button')}}" class="list-group-item">菜单管理</a>
				<a href="{{u('message/lists',['m'=>'news'])}}" class="list-group-item">图文消息</a>
				<a href="{{u('message/default_message')}}" class="list-group-item">系统消息</a>
			</div>
			<div class="list-group">
				<a href="#" class="list-group-item disabled">
					素材管理
				</a>
				<a href="{{site_url('site/imageLists','Material')}}" class="list-group-item">图片素材</a>
				<a href="{{site_url('site/newsLists','Material')}}" class="list-group-item">图文管理</a>
			</div>
			<div class="list-group">
				<a href="#" class="list-group-item disabled">
					微官网
				</a>
				<a href="#" class="list-group-item">栏目管理</a>
				<a href="#" class="list-group-item">幻灯片</a>
				<a href="#" class="list-group-item">文章管理</a>
			</div>
		</div>
		<div class="col-sm-8">
			<blade name="content"/>
		</div>
	</div>
</div>
</body>
</html>
<script>
	require(['bootstrap']);
</script>
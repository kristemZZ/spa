<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 首页
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li class="text-info" id="hello"></li>
					<script type="text/javascript">
						var date = new Date();
						hours = date.getHours();
						if (hours >= '6' && hours <= '12') 
						{
							document.getElementById('hello').innerHTML="上午好！";
						}else if(hours > '12' && hours < '18')
						{
							document.getElementById('hello').innerHTML="下午好！";
						}else if(hours >= '18' && hours < '24')
						{
							document.getElementById('hello').innerHTML="晚上好！";
						}
					</script>
				</ul>				
			</div>
</div>
</body>
</html>
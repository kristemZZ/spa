<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Kuta Admin 2.0.2</title>
		<link href="library/css/bootstrap.css" rel="stylesheet" />
		<link href="library/css/styles.css" rel="stylesheet" />
		<script type="text/javascript" src="js/myjs.js"></script>
		<style type="text/css">
			#product_list li{position: relative;}
			#pro_check{position: absolute;top: 0;right: 0;width: 25px;height: 25px}
			#chk_all{margin-left: 100px}
			#del{margin-left: 20px}
			#del:hover{color: #f60} 
		</style>
		<script type="text/javascript" src="js/jquery.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
<div id="left_layout">
			<div id="main_content" class="container-fluid">
				<div class="page-heading">
					<h2 class="page-title muted">
						<i class="icon-dashboard"></i> 查询产品
					</h2>
				</div>	
				<ul class="breadcrumb breadcrumb-main">
					<li><a href="index.php" target="_top">首页</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li><a href="sel_product.php">产品中心</a> <span class="divider"><i class="icon-caret-right"></i></span></li>
					<li class="text-info">查询产品</li>
				</ul>
				
					<form method="post" action="del_check_product.php">
					<input type="button" name="btn" value="全选" onclick="checkAll()" id="chk_all">
					<input type="button" name="btn" value="不选" onclick="uncheck()" id="un_chk">
					<input type="submit" name="sub" value="批量删除" id="sub" onclick="return get_confirm()">
					<input type="button" name="btn" value="添加" onclick="location.href='add_product.php'" id="add_date">
					
					<ul id="product_list" style="width:868px;margin-left:100px">
					<?php
						require '../data/db_function.php';
						$list=page('tb_product',$conf,$pagesize=8);
						foreach ($list as $val) 
						{
							if(is_array($val))
							{
								foreach ($val as $value) 
								{
									$pic="../".$value['srcpic'];
					?>
						<li>
							<a href="update_product.php?id=<?=$value['id'] ?>">
								<img src=<?=$pic ?> title='点击修改' />
								<span><?=$value['pro_desc'] ?></span>
							</a>
							<span>
								<input type='checkbox' name='pro_chk[]' id='pro_check' value="<?=$value['id']?>" />
							</span>
							<a href="del_product.php?id=<?=$value['id'] ?>" id='del' onclick="return get_confirm()">删除</a>
						</li>
					<?php
								}
							}
						}
					?>
					</form>
				</ul>	
			</div>
			<p class="prompt">
				<?php
					$str=admin_page_style($list,$_SERVER['PHP_SELF']);
					echo $str;
				?>
			</p>
</div>
</body>
</html>
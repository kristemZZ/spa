		<form method="post" action="del_check_news.php">
			<table width="1000" cellspacing="0" cellpadding="0">
				<input type="button" name="btn" value="全选" onclick="checkAll()" id="chk_all">
				<input type="button" name="btn" value="不选" onclick="uncheck()" id="un_chk">
				<input type="submit" name="sub" value="批量删除" id="sub" onclick="return get_confirm()">
				<input type="button" name="btn" value="添加" onclick="location.href='add_news.php'" id="add_date">
				<tr align="center">
					<td>选择</td>
					<td>编号</td>
					<td>标题</td>
					<td>描述</td>
					<td>作者</td>
					<td>添加时间</td>
					<td>新闻类型</td>
					<td>操作</td>
				</tr>
				<?php
				require '../data/db_function.php';
				db_connect($conf);
				function counts_like($table,$sel,$data)
				{
					$sql="select id from $table where $sel like '%$data%'";
					$result=mysql_query($sql);
					$counts=mysql_num_rows($result);
					return $counts;
				}
				$data = $_POST['data'];
				$sel = $_POST['sel'];
				$pagesize = 8;
				$list = array();
				$list['pagesize']=$pagesize;
				$list['counts']=counts_like('tb_news',$sel,$data);
				$list['pages']=ceil($list['counts']/$list['pagesize']);
				$list['p']=max(@$_POST['p'],1);
				$list['offset']=($list['p']-1)*$pagesize;
				$sql = "select * from tb_news where $sel like '%$data%' order by time desc limit {$list['offset']},$pagesize";
				$res = mysql_query($sql) or die(mysql_error());
				while ($row = mysql_fetch_array($res)) 
				{
					$list['arr'][]=$row;
				}
				$i = 1;
				foreach ($list as $val) 
				{
					if(is_array($val))
					{
						foreach ($val as $value) 
						{	
				?>
						<tr align="center">
							<td><input type="checkbox" name="chk[]" value="<?=$value['id'] ?>" /></td>
							<td><?=$i ?></td>
							<td><?=$value['news_title'] ?></td>
							<td><?=$value['news_desc'] ?></td>
							<td><?=$value['news_author'] ?></td>
							<td><?=$value['time'] ?></td>
							<td><?=$value['classify'] ?></td>
							<td id="news_list"><a href="update_news.php?id=<?=$value['id'] ?>">修改</a><a href="del_news.php?id=<?=$value['id'] ?>" onclick="return get_confirm()">删除</a></td>
						</tr>
				<?php
						$i++;
						}
					}
				}
				?>
			</table>
		</form>
		<p class="prompt">
			<?php
				$str=admin_like_page_style($list);
				echo $str;
			?>
		</p>

	
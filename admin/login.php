<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>登录后台管理</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <style type="text/css">
            #chk{width: 15px;height: 15px;}
            #code{width: 85px;height: 44px;line-height: 44px;float: left;}
            .code_box{width: 300px;height: 44px}
            #code_php{float: left;margin-top: 24px;margin-left: 10px}
        </style>
    </head>

    <body>

        <div class="page-container">
            <h1>boutique spa美容会所后台管理中心</h1>
            <form action="login_deal.php" method="post">
                <input type="text" name="username" class="username" placeholder="Username" value="<?=@$_COOKIE['username'] ?>">
                <input type="password" name="password" class="password" placeholder="Password" value="<?=@$_COOKIE['password'] ?>">
                <div class="code_box">
	                <input type="text" name="auth_code" placeholder="请输入验证码" id="code" class="code" onblur="search_ajax()" >
	                <img style="width:80px;height:44px" id="code_php" src="code/code.php" onclick="javascript:this.src=this.src+'?'+Math.random()" /><br/>
                
                <?php
                    if(@$_COOKIE['chk_state'] == '1')
                    {
                        echo "<input type='checkbox' name='chk' id='chk' value='1' checked='checked'><font color='black'>记住密码</font>";
                    }else
                    {
                        echo "<input type='checkbox' name='chk' id='chk' value='1'><font color='black'>记住密码</font>";
                    }
                ?>
                </div>
                <div id="state"></div>
                <button type="submit" onclick="return login_limit()" >Sign me in</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/js/supersized.3.2.7.min.js"></script>
        <script src="assets/js/supersized-init.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/myjs.js"></script>
    </body>
</html>


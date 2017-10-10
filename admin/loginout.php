<?php
session_start();
unset($_SESSION['username']);
session_destroy();
setcookie('username','',time()-1);
setcookie('password','',time()-1);
setcookie('chk_state','1',time()-1);
echo "<meta http-equiv='refresh' content='0;url=index.php'  />";
?>
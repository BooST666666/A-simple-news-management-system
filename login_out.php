<?php
session_start();
session_unset();
if(isset($_COOKIE[session_name()])){
	setcookie(session_name(),session_id(), time()-10);
}
session_destroy();
echo "<script>alert('退出账号成功!'); window.location.href = 'index.php';</script>";

?>
<?php 
function is_login(){ 
     session_start();
     if(isset($_SESSION["user_id"])){ 
     		return TRUE; 
     }else{ 
     		return FALSE; 
     } 
} 
?> 
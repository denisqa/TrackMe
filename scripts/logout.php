<?php
setcookie("id", "", time()-3600, "/");
setcookie("login", "", time()-3600, "/");
setcookie("pass", "", time()-3600, "/");
return "logout true";
?>
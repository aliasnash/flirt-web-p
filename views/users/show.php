Test view USERS
<?php

foreach($userInfo as $user) {
	?>

id: <?=$user['id'];?>&nbsp;&nbsp;&nbsp;   
name: <?=$user['name'];?>
<br />
<br />

<?php }?>
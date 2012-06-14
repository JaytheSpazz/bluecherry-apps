<?php defined('INDVR') or exit(); 
require('../template/template.lib.php');



?>

<div id="user-table">
	<h1 id="header" class="header"><?php echo CAMERA_PERMISSIONS_SUB; ?></h1>
	<p><a href='#' id='allUsers'><? echo USERS_LIST;?></a> > <a href='#' id='userInfo' class='<?php echo $p->user->info['id'];?>'><?php echo $p->user->info['name'];?></a> > <? echo CAMERA_PERMISSIONS_SUB; ?></p></div>
</div>
<div id='settingsForm'>
	<div id='saveButton'><?php echo SAVE_CHANGES; ?></div>
</div>
<div class='bClear'></div>
<div id='allButtons' class='container-separator'>
	<div id='restrictAll' class='ra'><?php echo RESTRICT_ALL; ?></div>
	<div id='allowAll' class='aa'><?php echo ALLOW_ALL; ?></div>
	<div class='bClear'></div>
</div>
<div class='container-separator'>
	<div class='title'><?php echo CAMERA_PERMISSIONS_LIST_TITLE; ?></div>
	<div id="camList">
		<?php
		foreach($p->camera_list as $key => $camera){
			echo "<div class='".(($camera['allowed']) ? 'allowed' : 'nallowed')."' id='{$camera['id']}'>{$camera['device_name']}</div>";
		}
		?>
	</div>
	<div class='bClear'></div>
</div>


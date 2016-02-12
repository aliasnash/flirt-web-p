<div class="panel panel-default">
	<div class="panel-heading">Безлимитные знакомства в твоем телефоне</div>
	<div class="panel-body">
		<div class="row">
		
		<?php
		foreach($userList as $key => $value) {
			?>
			<div class="col-xs-6 col-md-3 new-padding">
				<a href="#" class="thumbnail"> <img src="<?=WEB_APP?>/images/00.jpg" alt="<?=$key.'#'.$value['mainfoto'];?>">
				</a>
				<div class="imgtext">
					<?=$value['name'];?>, <?=$value['age'];?> <span class="<?=$value['online']?'online':'offline'?> push-right"> <strong>●</strong>
					</span>
				</div>
			</div>
		<?php }?>		
		</div>
	</div>
</div>
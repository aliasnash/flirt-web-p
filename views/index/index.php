<div class="panel panel-default">
	<div class="lead text-center heading ">Безлимитные знакомства в твоем телефоне</div>
	<div class="panel-body">
		<div class="row">
		<?php if (!empty($userList)) {?>
    		<?php foreach($userList as $key => $value) {?>
			<div class="col-xs-6 col-md-3 new-padding">
				<a href="<?=WEB_APP?>/users/profile?id=<?=$value['id'];?>" class="thumbnail">
					<img src="<?=PHOTO_URL_PREFIX . '/'. $value['photopath'];?>" alt="<?=$key.'#'.$value['photopath'];?>">
				</a>
				<div class="imgtext">
    					<?=$value['nickname'];?>, <?=$value['age'];?> <span class="<?=$value['online']?'online':'offline'?> push-right">
						<strong>●</strong>
					</span>
				</div>
			</div>
			<?php }?>
		<?php } else {?>
			<div class="page-header text-center">
				<p>Анкеты по вашему запросу не найдены. Заполните профиль для автоматического подбора собеседников.</p>
			</div>
		<?php }?>		
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="text-center heading">Безлимитные знакомства в твоем телефоне</div>
	<div class="panel-body">
		<div class="row">
		
		<?php
		if (!empty($userList)) {
			foreach($userList as $key => $value) {
				?>
			<div class="col-xs-6 col-md-3 new-padding">
				<a href="#" class="thumbnail"> <img src="<?=WEB_APP?>/images/<?='00.jpg';?>" alt="<?=$key.'#'.$value['photopath'];?>">
				</a>
				<div class="imgtext">
				<?=$value['nickname'];?>, <?=$value['age'];?> <span class="<?=$value['online']?'online':'offline'?> push-right"> <strong>●</strong>
					</span>
				</div>
			</div>
		<?php
			}
		} else {
			?>
			<div class="page-header text-center">
				<p>Анкеты по вашему запросу не найдены. Заполните профиль для автоматического подбора собеседников.</p>
			</div>
			<?php
		}
		?>		
		</div>
	</div>
</div>
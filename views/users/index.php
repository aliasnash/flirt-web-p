<div class="well">
	<p class="lead text-center">Анкета</p>

	<div class="row">
		<div class="col-md-2 col-md-offset-5 col-xs-12">
			<a href="#" class="thumbnail"> <img class="img-responsive" src="<?=PHOTO_URL_PREFIX?>/<?=$profile['photopath'];?>" alt="">
			</a>
		</div>

		<div class="col-md-2 col-md-offset-4 col-xs-6 text-right no-right-spaces">
			<strong>Имя:</strong>
		</div>
		<div class="col-md-2 col-xs-6 text-left no-left-spaces">
			<?=$profile['nickname'];?> <?=$profile['sex']==1?'<i class="fa fa-mars fa-lg text-info" ></i>':'';?> <?=$profile['sex']==2?'<i class="fa fa-venus fa-lg text-danger"></i>':'';?>
		</div>

		<div class="col-md-2 col-md-offset-4 col-xs-6 text-right no-right-spaces">
			<strong>День рождения:</strong>
		</div>
		<div class="col-md-2 col-xs-6 text-left no-left-spaces">
			<?=$profile['birthday'];?>
		</div>

		<div class="col-md-2 col-md-offset-4 col-xs-6 text-right no-right-spaces">
			<strong>Город:</strong>
		</div>
		<div class="col-md-2 col-xs-6 text-left no-left-spaces">
			<?=$profile['caption'];?>
		</div>

		<?php if($profile['online']) {?>
		<div class="col-md-2 col-md-offset-4 col-xs-6 text-right no-right-spaces">
			<strong>Статус:</strong>
		</div>
		<div class="col-md-2 col-xs-6 text-left no-left-spaces">
			<span style="color: green;"> В сети </span>
		</div>
		<?php }?>
		<div class="col-md-4 col-md-offset-4 col-xs-12 text-center">
			<br>
			<p class="text-muted"><?=$profile['description'];?></p>
		</div>
	</div>
	<div class="row">
		<form class="form" role="form" method="post" action="<?=WEB_APP?>/msg">
			<input type="hidden" id="s" name="s" value="<?=$profile['id'];?>" />
			<div class="form-group col-md-12 col-xs-12 text-center">
				<div class="btn-group">
					<button class="btn btn-info btn-lg" type="submit">
						<i class="fa fa-commenting-o  fa-lg"></i> Начать общение
					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="row">
		<div id="links">
			<?php foreach ($photos as $key => $value) {?>
			<div class="col-md-2 col-xs-2 new-padding">
				<a href="<?=PHOTO_URL_PREFIX . '/'. $value['photopath'];?>" class="thumbnail" data-gallery> <img class="img-responsive"
					src="<?=PHOTO_URL_PREFIX . '/'. $value['photopath'];?>">
				</a>
			</div>
			<?php }?>
		</div>
	</div>
</div>

<div id="blueimp-gallery" class="blueimp-gallery " data-use-bootstrap-modal="false">

	<!-- The container for the modal slides -->
	<div class="slides"></div>

	<!-- Controls for the borderless lightbox -->
	<h3 class="title"></h3>
	<a class="prev">‹</a> <a class="next">›</a> <a class="close">×</a> <a class="play-pause"></a>
	<ol class="indicator"></ol>

	<!-- The modal dialog, which will be used to wrap the lightbox content -->
	<div class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" aria-hidden="true">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body next"></div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left prev">
						<i class="glyphicon glyphicon-chevron-left"></i>
					</button>
					<button type="button" class="btn btn-primary next">
						<i class="glyphicon glyphicon-chevron-right"></i>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>




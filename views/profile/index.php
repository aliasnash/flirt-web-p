<div class="well">
	<p class="lead text-center">Ваша анкета</p>

	<div class="row">
		<div class="col-md-2 col-md-offset-5 col-xs-12">
			<a href="#" class="thumbnail">
			<?php if(empty($profile['photopath'])){?>
				<img class="img-responsive" src="<?=WEB_APP?>/resources/images/rand_avatar5.jpg" alt="" id="img-avatar">
			<?php }else{?>
				<img class="img-responsive" src="<?=PHOTO_URL_PREFIX?>/<?=$profile['photopath'];?>" alt="" id="img-avatar">
			<?php }?>
			</a>
		</div>

		<div class="col-md-2 col-md-offset-4 col-xs-6 text-right no-right-spaces">
			<strong>Имя:</strong>
		</div>
		<div class="col-md-2 col-xs-6 text-left no-left-spaces">
			<?=$profile['nickname'];?> <?=$profile['sex']==1?'<i class="fa fa-mars fa-lg text-info" ></i>':'';?> <?=$profile['sex']==2?'<i class="fa fa-venus fa-lg text-danger"></i>':'';?>&nbsp;
		</div>

		<div class="col-md-2 col-md-offset-4 col-xs-6 text-right no-right-spaces">
			<strong>День рождения:</strong>
		</div>
		<div class="col-md-2 col-xs-6 text-left no-left-spaces">
			<?=$profile['birthday'];?>&nbsp;
		</div>

		<div class="col-md-2 col-md-offset-4 col-xs-6 text-right no-right-spaces">
			<strong>Город:</strong>
		</div>
		<div class="col-md-2 col-xs-6 text-left no-left-spaces">
			<?=$profile['caption'];?>&nbsp;
		</div>
		<div class="col-md-4 col-md-offset-4 col-xs-12 text-center">
			<br>
			<p class="text-muted"><?=$profile['description'];?></p>
			&nbsp;
		</div>
	</div>

	<div class="row">
		<div id="links">
			<?php foreach ($photos as $key => $value) {?>
			<div class="col-md-3 col-xs-3 new-padding" id="block_photo_<?=$value['id']?>">
				<a href="<?=PHOTO_URL_PREFIX?>/<?=$value['photopath']?>" class="thumbnail" data-gallery> <img class="img-responsive"
						src="<?=PHOTO_URL_PREFIX?>/<?=$value['photopath']?>">
				</a>
				<div class="profile-photo-buttons-holder">
					<span class="move-left">
						<a data-element-photo="<?=PHOTO_URL_PREFIX?>/<?=$value['photopath']?>" data-element-id="<?=$value['id']?>" data-toggle="modal"
							data-target="#modal-set-main" class="btn btn-info btn-xs"> <i class="fa fa-check-circle fa-lg"></i>
						</a>
					</span>
					<span class="move-right">
						<a data-element-photo="<?=PHOTO_URL_PREFIX?>/<?=$value['photopath']?>" data-element-id="<?=$value['id']?>" data-toggle="modal"
							data-target="#modal-remove-img" class="btn btn-danger btn-xs"> <i class="fa fa-times fa-lg"></i>
						</a>
					</span>
				</div>
			</div>
			<?php }?>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-md-12 col-xs-12 text-center">
			<div class="btn-group">
				<a href="<?=WEB_APP?>/photo" class="btn btn-success btn-lg"> <i class="glyphicon glyphicon-plus"></i> Фото
				</a>
			</div>
			<div class="btn-group">
				<a href="<?=WEB_APP?>/profile/edit" class="btn btn-info btn-lg"> <i class="fa fa-pencil-square-o fa-lg"></i> Изменить
				</a>
			</div>
		</div>
	</div>
</div>

<style>
.blueimp-gallery>.description {
	position: absolute;
	top: 30px;
	left: 15px;
	color: red;
	/* 	display: none; */
}
</style>

<div id="blueimp-gallery" class="blueimp-gallery " data-use-bootstrap-modal="false">
	<!-- The container for the modal slides -->
	<div class="slides"></div>

	<!-- Controls for the borderless lightbox -->
	<h3 class="title"></h3>
	<p class="description"></p>
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


<!-- modal -->
<div class="modal fade" id="modal-set-main">
	<div class="modal-dialog">
		<div class="modal-content">
			<input type="hidden" id="sid">
			<input type="hidden" id="sphoto">
			<div class="modal-body">Сделать фотографию основной?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Отменить</button>
				<button type="button" class="btn btn-primary btn-sm" id="set-main" data-dismiss="modal">Подтвердить</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- modal -->
<div class="modal fade" id="modal-remove-img">
	<div class="modal-dialog">
		<div class="modal-content">
			<input type="hidden" id="rid">
			<input type="hidden" id="rphoto">
			<div class="modal-body">Удалить фотографию из профиля?</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Отменить</button>
				<button type="button" class="btn btn-primary btn-sm" id="remove-img" data-dismiss="modal">Подтвердить</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

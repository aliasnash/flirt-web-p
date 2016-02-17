<div class="well">
	<p class="lead text-center">Ваша анкета</p>

	<div class="row">
		<div class="col-md-2 col-md-offset-5 col-xs-12">
			<a href="#" class="thumbnail">
				<img class="img-responsive" src="<?=WEB_APP?>/images/<?='00.jpg';?>" alt="">
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
			<?=$profile['cityCaption'];?>
		</div>
		<div class="col-md-4 col-md-offset-4 col-xs-12 text-center">
			<br>
			<p class="text-muted"><?=$profile['description'];?></p>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-12 col-xs-12 text-center">
			<div class="btn-group">
				<a href="<?=WEB_APP?>/profile/edit" class="btn btn-info btn-lg">
					<i class="fa fa-pencil-square-o fa-lg"></i> Изменить
				</a>
			</div>
		</div>
	</div>
</div>





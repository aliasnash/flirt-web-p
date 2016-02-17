<div class="well">
	<p class="lead text-center">Анкета</p>

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
			<?=$profile['caption'];?>
		</div>
		<div class="col-md-4 col-md-offset-4 col-xs-12 text-center">
			<br>
			<p class="text-muted"><?=$profile['description'];?></p>
		</div>
	</div>
</div>





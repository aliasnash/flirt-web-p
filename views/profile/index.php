<div class="well">
	<div class="text-center heading">Ваша анкета</div>

	<div class="row">

		<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
			<a href="#" class="thumbnail"> <img class="img-responsive" src="<?=WEB_APP?>/images/<?='02.jpg';?>" alt="">
			</a>
		</div>

		<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
			<label for="nick" class="control-label">Имя:</label> <input type="text" class="input-md form-control" id="nick" name="nick"
				value="<?=$profile['nickname'];?>" disabled="disabled" />
		</div>

		<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
			<label for="my_sex" class="control-label">Пол:</label> <input type="text" class="input-md form-control" id="my_sex" name="my_sex"
				value="<?=$profile['sex']==1?'Парень':'Девушка';?>" disabled="disabled" />
		</div>
		<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
			<label for="bday" class="control-label">День рождения:</label> <input type="text" class="input-md form-control" id="bday" name="bday"
				value="<?=$profile['birthday'];?>" disabled="disabled" />
		</div>
		<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
			<label for="idcity" class="control-label">Город:</label> <input type="text" class="input-md form-control" id="idcity" name="idcity"
				value="<?=$profile['idcity'];?>" disabled="disabled" />
		</div>

		<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
			<textarea rows="5" cols="6" class="input-md form-control" id="description" name="description" disabled="disabled"><?=$profile['description'];?></textarea>
		</div>
	</div>
	<div class="row">
		<div class="form-group col-md-12 col-xs-12 text-center">
			<div class="btn-group">
				<a href="<?=WEB_APP?>/profile/edit" class="btn btn-info btn-sm"> <i class="fa fa-pencil-square-o fa-lg"></i> Изменить
				</a>
			</div>
		</div>
	</div>
</div>
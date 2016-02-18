<div class="well">
	<p class="lead text-center">Ваша анкета</p>
	<form class="form" role="form" method="post" action="<?=WEB_APP?>/profile/update">
		<div class="row">
			<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
				<label for="nick" class="control-label">Имя:</label>
				<input type="text" maxlength="11" class="input-md form-control" id="nick" name="nick" placeholder="Имя..." value="<?=$profile['nickname'];?>" />
			</div>

			<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
				<label for="my_sex" class="control-label">Пол:</label>
				<select class="selectpicker form-control input-sm" id="my_sex" name="my_sex" title="Выберите пол" data-size="15">
					<option <?=$profile['sex'] == 1 ? 'selected' : '';?> value="1">Парень</option>
					<option <?=$profile['sex']==2?'selected':'';?> value="2">Девушка</option>
				</select>

			</div>
			<div class="form-group col-md-1 col-md-offset-4 col-xs-4 no-right-spaces">
				<label for="bday" class="control-label">День:</label>
				<select class="selectpicker form-control input-sm" id="bday" name="bday" title="День" data-size="15">
    					<?php for($i = 1; $i <= 31; $i++) {?>
							<option <?=$profile['bday']==$i?'selected':'';?> value="<?=$i?>"><?=$i?></option>
						<?php }?>
					</select>
			</div>
			<div class="form-group col-md-2 col-xs-4 no-right-spaces no-left-spaces">
				<label for="bmonth" class="control-label">Месяц:</label>
				<select class="selectpicker form-control input-sm" id="bmonth" name="bmonth" title="Месяц" data-size="15">
    					<?php foreach($monthList as $key => $value) {?>
							<option <?=$profile['bmonth']==$key?'selected':'';?> value="<?=$key?>"><?=$value?></option>
						<?php }?>
					</select>
			</div>
			<div class="form-group col-md-1 col-xs-4 no-left-spaces">
				<label for="byear" class="control-label">Год:</label>
				<select class="selectpicker form-control input-sm" id="byear" name="byear" title="Год" data-size="15">
    					<?php for($i = date('Y') - 40; $i < date('Y') - 7; $i++) {?>
							<option <?=$profile['byear']==$i?'selected':'';?> value="<?=$i?>"><?=$i?></option>
						<?php }?>
					</select>
			</div>

			<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
				<label for="idcity" class="control-label">Город:</label>
				<select class="selectpicker form-control input-sm " id="idcity" name="idcity" title="Выберите город" data-size="15">
						<?php foreach($cities as $key => $value) {?>
							<option <?=$profile['idcity']==$value['id']?'selected':'';?> value="<?=$value['id'];?>"><?=$value['caption'];?></option>
						<?php }?>
					</select>
			</div>

			<div class="form-group col-md-4 col-md-offset-4 col-xs-12">
				<textarea rows="5" cols="6" class="input-md form-control" id="description" name="description" placeholder="Описание..."><?=$profile['description'];?></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12 col-xs-12 text-center">
				<div class="btn-group">
					<button type="submit" class="btn btn-success btn-lg">
						<i class="fa fa-floppy-o fa-lg"></i> Сохранить
					</button>
				</div>
				<div class="btn-group">
					<a href="<?=WEB_APP?>/profile" class="btn btn-warning btn-lg">
						<i class="fa fa-ban fa-lg"></i> Отменить
					</a>
				</div>
			</div>
		</div>
	</form>
</div>
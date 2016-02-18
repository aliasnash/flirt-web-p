<div class="well">
	<p class="lead text-center">Фильтр для поиска</p>
	<form class="form" role="form" method="post" action="<?=WEB_APP?>/search/show">
		<div class="row">

			<div class="col-md-1 col-md-offset-4 col-xs-3 text-right no-right-spaces input-sm">
				<label for="sex" class="control-label">Пол:&nbsp;</label>
			</div>
			<div class="col-md-3 col-xs-9 text-left no-left-spaces">
				<div class="form-group ">
					<select class="selectpicker form-control input-sm" id="sex" name="sex" data-size="15">
						<option value="0">Не важно</option>
						<option value="1">Парень</option>
						<option value="2">Девушка</option>
					</select>
				</div>
			</div>

			<div class="col-md-12 col-xs-12">&nbsp;</div>

			<div class="col-md-1 col-md-offset-4 col-xs-3 text-right no-right-spaces input-sm">
				<label for="" class="control-label">Возраст:&nbsp;</label>
			</div>
			<div class="col-md-3 col-xs-9 text-left no-left-spaces">
				<div class='input-group form-group'>
					<div class="input-group-addon">от:</div>
					<select class="selectpicker form-control" id="bage" name="bage" data-size="10">
						<option value="0">---</option>
						<?php for($i = 18; $i <= 80; $i++) {?>
							<option value="<?=$i?>"><?=$i?></option>
						<?php }?>
					</select>
					<div class="input-group-addon">до:</div>
					<select class="selectpicker form-control" id="aage" name="aage" data-size="10">
						<option value="0">---</option>
						<?php for($i = 18; $i <= 80; $i++) {?>
							<option value="<?=$i?>"><?=$i?></option>
						<?php }?>
					</select>
				</div>
			</div>

			<div class="col-md-12 col-xs-12">&nbsp;</div>

			<div class="col-md-1 col-md-offset-4 col-xs-3 text-right no-right-spaces input-sm">
				<label for="idcity" class="control-label">Город:&nbsp;</label>
			</div>
			<div class="col-md-3 col-xs-9 text-left no-left-spaces">
				<div class="form-group ">
					<select class="selectpicker form-control input-sm " id="idcity" name="idcity" data-size="15">
						<option value="0">Не важно</option>
						<?php foreach($cities as $key => $value) {?>
							<option value="<?=$value['id'];?>"><?=$value['caption'];?></option>
						<?php }?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12 col-xs-12 text-center">&nbsp;</div>
		</div>
		<div class="row">
			<div class="form-group col-md-12 col-xs-12 text-center">
				<div class="btn-group">
					<button type="submit" class="btn btn-success btn-lg">
						<i class="fa fa-search fa-lg"></i> Найти
					</button>
				</div>
			</div>
		</div>
	</form>
</div>

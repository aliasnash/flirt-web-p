<div class="well">
	<p class="lead text-center">Для отписки от сервиса введите ваш номер телефона. Внимание! Ваша анкета будет удалена навсегда!</p>
	<form class="form" role="form" method="post">
		<input type="hidden" id="o" name="o" value=<?=$telco;?> />

		<div class="row">
			<div class="form-group col-md-5 hidden-xs"></div>
			<div class="col-md-2 col-xs-12">
				<div class="form-group">
					<label for="msisdn" class="control-label"></label>
					<?php if(empty($msisdn)){?>
						<input type="text" pattern="\d*" maxlength="11" class="input-lg form-control" id="msisdn" name="msisdn" placeholder="79991234567" />
					<?php }else{?>
						<input type="text" disabled="disabled" maxlength="11" class="input-lg form-control" value="<?=$msisdn?>" /> <input type="hidden" id="msisdn" name="msisdn"
						value=<?=$msisdn;?> />
					<?php }?>
				</div>
			</div>
			<div class="form-group col-md-5 hidden-xs"></div>
		</div>

		<div class="row">
			<div class="form-group col-md-12 col-xs-12 text-center">
				<div class="btn-group">
					<button type="submit" class="btn btn-info btn-lg">
						<span class="fa fa fa-power-off fa-lg" aria-hidden="true"></span>
						Отписаться
					</button>
				</div>
			</div>
		</div>
	</form>
</div>
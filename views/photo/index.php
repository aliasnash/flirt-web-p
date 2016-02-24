<div class="well">
	<p class="lead text-center">Добавление фотографии</p>

	<div class="row">
		<div class="col-md-12 col-xs-12 text-center">
			<div id="add-photo-errors" class="center-block" style="display: none"></div>
			<form class="text-center" action="<?=WEB_APP?>/photo/upload" method="post" enctype="multipart/form-data">
				<div class="add-photo-box center-block" style="width: 180px">
					<input id="add-photo" name="add-photo" type="file" class="file-loading">
				</div>
			</form>
		</div>
	</div>
</div>

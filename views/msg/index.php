<div class="panel panel-default">
	<div class="panel-body">
		<ul class="media-list">
		<?php foreach($messages as $key => $value) {?>
			<?php if($value['msgowner']) {?>
			<li class="media">
				<div class="media-body bg-info">
					<div class="media">
						<p class="pull-right" style="margin-bottom: 0px;">
							<img class="media-object img-circle " style="width: 60px;" src="<?=WEB_APP?>/images/<?=$value['pspath'];?>" />
						</p>
						<div class="media-body text-right">
							<?=$value['message'];?> <br /> <small class="text-muted"><?=$value['dateadded'];?></small>
						</div>
					</div>
				</div>
			</li>				
			<?php }else{?>
			<li class="media">
				<div class="media-body bg-warning">
					<div class="media">
						<a class="pull-left" href="<?=WEB_APP?>/users/profile?id=<?=$value['idus'];?>">
							<img class="media-object img-circle " style="width: 60px;" src="<?=WEB_APP?>/images/<?=$value['pspath'];?>" />
						</a>
						<div class="media-body text-left">
							<?=$value['message'];?> <br /> <small class="text-muted"><?=$value['dateadded'];?></small>
						</div>
					</div>
				</div>
			</li>
			<?php }?>
		<?php }?>
		</ul>
	</div>

	<div class="panel-footer">
		<form class="form" role="form" method="post">
			<input type="hidden" id="s" name="s" value="<?=$iduser;?>" />
			<div class="input-group">
				<input type="text" class="form-control" id="msg" name="msg" placeholder="Сообщение..." />
				<span class="input-group-btn">
					<button class="btn btn-info" type="submit">
						<i class="fa fa fa-paper-plane-o fa-lg"></i>
					</button>
				</span>
			</div>
		</form>
	</div>
</div>

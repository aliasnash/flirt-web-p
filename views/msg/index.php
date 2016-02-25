<div class="panel panel-default">
	<div class="panel-body">
		<div id="box" class="chat-window">
			<ul class="media-list">
			<?php foreach($messages as $key => $value) {?>
    			<li class="media" data-element-id="<?=$value['id'];?>">
    			<?php if($value['msgowner']) {?>
    				<div class="media-body bg-info">
						<div class="media">
							<div class="pull-left hide">
								<button type="button" class="close">
									<i class="fa fa-times fa-lg" style="color: red;"></i>
								</button>
							</div>
							<p class="pull-right" style="margin-bottom: 0px;">
								<img class="media-object img-circle " style="width: 60px;" src="<?=PHOTO_URL_PREFIX?>/<?=$value['pspath'];?>" />
							</p>
							<div class="media-body text-right">
    							<?=$value['message'];?> <br /> <small class="text-muted too-small"><?=$value['dateadded'];?></small>
							</div>
						</div>
					</div>
    			<?php }else{?>
    				<div class="media-body bg-warning">
						<div class="media">
							<div class="pull-right hide">
								<button type="button" class="close">
									<i class="fa fa-times fa-lg" style="color: red;"></i>
								</button>
							</div>
							<a class="pull-left" href="<?=WEB_APP?>/users/profile?id=<?=$value['idus'];?>">
								<img class="media-object img-circle " style="width: 60px;" src="<?=PHOTO_URL_PREFIX?>/<?=$value['pspath'];?>" />
							</a>
							<div class="media-body text-left">
    							<?=$value['message'];?> <br /> <small class="text-muted too-small"><?=$value['dateadded'];?></small>
							</div>
						</div>
					</div>
    			<?php }?>
    			</li>
			<?php }?>
			</ul>
		</div>
	</div>

	<div class="panel-footer">
		<div id="form-send-msg">
			<input type="hidden" id="s" name="s" value="<?=$iduser;?>" />
			<div class="input-group">
				<input type="text" class="form-control" id="msg" name="msg" placeholder="Сообщение..." autofocus="autofocus" />
				<span class="input-group-btn">
					<button class="btn btn-info" type="button" id="send-message">
						<i class="fa fa fa-paper-plane-o fa-lg"></i>
					</button>
				</span>
			</div>
		</div>
	</div>
</div>
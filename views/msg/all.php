<div class="panel panel-default">
	<div class="panel-body">
		<div id="box" class="chat-window">
			<ul class="media-list">
			<?php foreach($unreadedMessage as $key => $value) {?>
    			<li class="media" data-element-id="<?=$value['idus'];?>">
					<div class="media-body bg-success">
						<div class="media">
							<a class="pull-left" href="#">
								<img class="media-object img-circle " style="width: 50px;" src="<?=WEB_APP?>/images/<?=$value['pspath'];?>" />
							</a>
							<div class="media-body text-left">
    							<?=$value['nickname'];?>&nbsp;&nbsp;
								<span style="color:<?=$value['online']?'green':'red'?>;">
									<strong>●</strong>
								</span>
								<br /> <small class="text-muted">Возраст: <?=$value['age'];?></small>
							</div>
						</div>
					</div>
				</li>
			<?php }?>
			<?php foreach($restMessage as $key => $value) {?>
    			<li class="media" data-element-id="<?=$value['idus'];?>">
					<div class="media-body">
						<div class="media bg-warning">
							<a class="pull-left" href="#">
								<img class="media-object img-circle " style="width: 50px;" src="<?=WEB_APP?>/images/<?=$value['pspath'];?>" />
							</a>
							<div class="media-body text-left">
    							<?=$value['nickname'];?>&nbsp;&nbsp;
								<span style="color:<?=$value['online']?'green':'red'?>;">
									<strong>●</strong>
								</span>
								<br /> <small class="text-muted">Возраст: <?=$value['age'];?></small>
							</div>
						</div>
					</div>
				</li>
			<?php }?>			
			</ul>
		</div>
	</div>

	<div id="form-goto-chat">
		<form class="form" role="form" method="post" action="<?=WEB_APP?>/msg">
			<input type="hidden" id="s" name="s" />
		</form>
	</div>
</div>
<div class="panel panel-default">
	<div class="lead text-center heading">
		Найденные анкеты
		<span class="badge"><?=$userCount;?></span>
	</div>
	<div class="panel-body">
		<div class="row">
		<?php if (!empty($userList)) {?>
    		<?php foreach($userList as $key => $value) {?>
			<div class="col-xs-6 col-md-3 new-padding">
				<a href="<?=WEB_APP?>/users/profile?id=<?=$value['id'];?>" class="thumbnail">
					<img src="<?=WEB_APP?>/images/<?=$value['photopath'];?>" alt="<?=$key.'#'.$value['photopath'];?>">
				</a>
				<div class="imgtext">
    				<?=$value['nickname'];?>, <?=$value['age'];?> <span class="<?=$value['online']?'online':'offline'?> push-right">
						<strong>●</strong>
					</span>
				</div>
			</div>
			<?php }?>
				<div class="col-md-12 col-xs-12 text-center">
				<div class="btn-group">
					<nav>
						<ul class="pager">
							<li class="previous <?=($blockleft ? 'disabled' : '')?>">
								<a href="<?=WEB_APP?>/search/show?p=<?=$p-1;?>" class="btn-lg">
									&nbsp;<i class="fa fa-hand-o-left fa-lg"></i>&nbsp;
								</a>
							</li>
							&nbsp;&nbsp;
							<li class="next <?=($blockright ? 'disabled' : '')?>">
								<a href="<?=WEB_APP?>/search/show?p=<?=$p+1;?>" class="btn-lg">
									&nbsp;<i class="fa fa-hand-o-right fa-lg"></i>&nbsp;
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		<?php } else {?>
			<div class="page-header text-center">
				<p>Анкеты по вашему запросу не найдены.</p>
			</div>
		<?php }?>		
		</div>
	</div>
</div>

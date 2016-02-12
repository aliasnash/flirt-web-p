<div class="panel panel-default">
	<div class="panel-heading">Dump current variables</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>key</th>
				<th>value</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>DIR:</td>
				<td><?=__DIR__?></td>
			</tr>
			<tr>
				<td>$_SERVER['HTTP_HOST']:</td>
				<td><?=$_SERVER['HTTP_HOST']?></td>
			</tr>
			<tr>
				<td>$_SERVER['SCRIPT_FILENAME']:</td>
				<td><?=$_SERVER['SCRIPT_FILENAME']?></td>
			</tr>
			<tr>
				<td>$_SERVER['DOCUMENT_ROOT']:</td>
				<td><?=$_SERVER['DOCUMENT_ROOT']?></td>
			</tr>
			<tr>
				<td>$_SERVER['REQUEST_URI']:</td>
				<td><?=$_SERVER['REQUEST_URI']?></td>
			</tr>
			<tr>
				<td>$_SERVER['SCRIPT_NAME']:</td>
				<td><?=$_SERVER['SCRIPT_NAME']?></td>
			</tr>
			<tr>
				<td>$_SERVER['PHP_SELF']:</td>
				<td><?=$_SERVER['PHP_SELF']?></td>
			</tr>
			<tr>
				<td>dirname($_SERVER['PHP_SELF']):</td>
				<td><?=dirname($_SERVER['PHP_SELF'])?></td>
			</tr>
			<tr>
				<td>getcwd:</td>
				<td><?=getcwd()?></td>
			</tr>
			<tr>
				<td>WEB_APP:</td>
				<td><?=WEB_APP?></td>
			</tr>
		</tbody>
	</table>
</div>
<div class="panel panel-default">
	<div class="panel-heading">Dump ALL variables</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>key</th>
				<th>value</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($_SERVER as $key => $value) {
				echo '<tr><td>' . $key . '</td><td>' . $value . '</td></tr>';
			}
			?>
		</tbody>
	</table>
</div>
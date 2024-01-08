<fieldset>
	<legend>目前位置:首頁 > 人氣文章區</legend>
	<table style="width:95%;margin:auto">
		<tr>
			<th width="30%">標題</th>
			<th width="50%">內容</th>
			<th width="">人氣</th>
		</tr>
		<?php
		$rows=$News->all(['sh'=>1],"order by `good` desc");
		// 人氣文章要注意加排序 讚數多->少
		// 請注意陣列的括號(一組一組)
		foreach($rows as $row){

			
			?>
		<tr>
			<td><?=$row['title'];?></td>
			<td><?=mb_substr($row['news'],0,25);?>...</td>
			<td></td>
		</tr>
		<?php
		}
		?>
	</table>
</fieldset>
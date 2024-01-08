<fieldset>
	<legend>目前位置:首頁 > 最新文章區</legend>
	<table style="width:95%;margin:auto">
		<tr>
			<th width="30%">標題</th>
			<th width="50%">內容</th>
			<th></th>
		</tr>
		<?php
		// 在寫分頁時,注意擺放的位置, 原先從資料庫取資料出來的上方, 並這樣在取資料 會直接跟分頁合併取條件
		$total = $News->count(['sh' => 1]);
		$div = 5;
		$pages = ceil($total / $div);
		$now = $_GET['p'] ?? 1; //現在在的頁數
		$start = ($now - 1) * $div; //從哪筆資料開始

		$rows = $News->all(['sh' => 1], " limit $start,$div"); //這邊與分頁取資料的篩選合併
		foreach ($rows as $row) {
		?>
			<tr>
				<td>
					<div class="title" data-id="<?= $row['id']; ?>" style="cursor:pointer">
						<?= $row['title']; ?></div>
				</td>

				<td>
					<div id="s<?=$row['id'];?>"><?= mb_substr($row['news'], 0, 25); ?>...</div>
					<div id="a<?=$row['id'];?>" style="display:none"><?=$row['news'];?></div>
				</td>
				<td></td>
			</tr>
		<?php
		}

		?>
	</table>
	<div>
		<?php
		if (($now - 1) > 0) {
			$prev = $now - 1;
			echo "<a href='?do=news&p=$prev'> < </a>";
		}

		for ($i = 1; $i <= $pages; $i++) {
			$fontsize = ($now == $i) ? "font-size:20px" : "font-size:16px";
			echo "<a href='?do=news&p=$i' style='$fontsize'> $i </a>";
		}
		if (($now + 1) <= $pages) {
			$next = $now + 1;
			echo "<a href='?do=news&p=$next'> > </a>";
		}
		?>
	</div>
	<!-- 注意這邊用div包起來用於顯示 -->
</fieldset>

<script>
$(".title").on('click',(e)=>{
    let id=$(e.target).data('id');
    $(`#s${id},#a${id}`).toggle();
    //$("#s"+id+",#a"+id).toggle();

})


</script>
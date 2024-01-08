<fieldset>
	<legend>目前位置:首頁 > 人氣文章區</legend>
	<table style="width:95%;margin:auto">
		<tr>
			<th width="30%">標題</th>
			<th width="50%">內容</th>
			<th width="">人氣</th>
		</tr>
		<?php
		// 在寫分頁時,注意擺放的位置, 原先從資料庫取資料出來的上方, 並這樣在取資料 會直接跟分頁合併取條件
		$total = $News->count(['sh' => 1]);
		$div = 5;
		$pages = ceil($total / $div);
		$now = $_GET['p'] ?? 1; //現在在的頁數
		$start = ($now - 1) * $div; //從哪筆資料開始

		$rows = $News->all(['sh' => 1], " order by `good` desc limit $start,$div"); //要注意寫法要先寫order->desc->最後才寫limit
		foreach ($rows as $row) {
		?>
			<tr>
				<td>
					<div class="title" data-id="<?=$row['id'];?>"><?= $row['title']; ?></div>
				</td>
				<td style="position=relative"><div><?= mb_substr($row['news'], 0, 25); ?>...</div>
				<div id="p<?=$row['id'];?>" class="pop">
				<h3 style='color:skyblue'><?=$row['title'];?></h3>
				<pre><?=$row['news'];?></pre>
			</div>
			</td>
				<td>
					<span><?=$row['good'];?>個人說</span><img src="./icon/02B03.jpg" style="width:25px">
					<!-- 注意圖片路徑, 是已是含在index裡面 要用index角度來抓位置 -->
					<?php
					if(isset($_SESSION['user'])){
						if($Log->count(['news'=>$row['id'],'acc'=>$_SESSION['user']])>0){
							echo "<a id='n{$row['id']}' href='Javascript:good({$row['id']})'>收回讚</a>";
						}else{
							echo "<a id='n{$row['id']}' href='Javascript:good({$row['id']})'>讚</a>";
						}
						//這邊不須再放session[id] 因為一方面安全考量 一方面是session只要不關掉瀏覽器 幾乎哪裡皆可取得
					}
					?>
				</td>
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
$(".title").hover(
    function(){
        $(".pop").hide()
        let id=$(this).data("id")
        $("#p"+id).show();
    }
)

</script>
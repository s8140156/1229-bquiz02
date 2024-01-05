
<style>
	.type-item{
		display:block;
		margin:3px 6px;
	}
	.types,.news-list{
		display: inline-block;
		vertical-align: top;
	}
	.news-list{
		width:600px;
	}
</style>

<div>目前位置>分類網誌><span class="type"></span></div>

<fieldset class="types">
	<legend>分類網誌</legend>
	<div class="type-item">健康新知</div>
	<div class="type-item">菸害防治法規</div>
	<div class="type-item">癌症防治</div>
	<div class="type-item">慢性病防治</div>
</fieldset>
<fieldset class="news-list">
	<legend>文章列表</legend>
	<div class="list-items"></div>
	<div class="article"></div>
</fieldset>

<script>
	$('.type-item').on('click',function(){
		$('.type').text($(this).text())
	})
</script>


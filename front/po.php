
<style>
	.type-item{
		display:block; /*因為使用a tag 強制改成block顯示*/
		margin:3px 6px;
	}
	.types,.news-list{
		display: inline-block; /*讓2個fieldset並列*/
		vertical-align: top;  /*靠上對齊*/
	}
	.news-list{
		width:600px;
	}
</style>

<div class="nav">目前位置:首頁 > 分類網誌 > <span class="type"></span></div>

<fieldset class="types"> <!--當畫面點選分類網誌時,讓nav區塊分類網誌後(type)跟著改標題-->
	<legend>分類網誌</legend>
	<a class="type-item" data-id="1">健康新知</a>
	<a class="type-item" data-id="2">菸害防治法規</a>
	<a class="type-item" data-id="3">癌症防治</a>
	<a class="type-item" data-id="4">慢性病防治</a>
</fieldset>
<fieldset class="news-list"> <!--當畫面點選分類網誌時, 使用ajax去後台取對應的文章列表-->
	<legend>文章列表</legend> 
	<div class="list-items"></div> <!--點選文章列表-->
	<div class="article"></div> <!--會出現對應的文章-->
</fieldset>

<script>
	getList(1)
	$('.type-item').on('click',function(){
		$('.type').text($(this).text())
		let type=$(this).data('id')
		getList(type)
	})

	function getList(type){
		$get("./api/get_list.php",{type},(list)=>{
			$('.list-items').html(list)
			$(".article,.list-items").toggle()
		})
	}
	function getNews(id){
		$get("./api/get_news.php",{id},(news)=>{
			$('.article').html(news)
			$(".article,.list-items").toggle()

		})
	}
</script>


// JavaScript Document
function lo(th,url)
{
	$.ajax(url,{cache:false,success: function(x){$(th).html(x)}})
}
// function good(id,type,user)
// {
// 	$.post("back.php?do=good&type="+type,{"id":id,"user":user},function()
// 	{
// 		if(type=="1")
// 		{
// 			$("#vie"+id).text($("#vie"+id).text()*1+1)
// 			$("#good"+id).text("收回讚").attr("onclick","good('"+id+"','2','"+user+"')")
// 		}
// 		else
// 		{
// 			$("#vie"+id).text($("#vie"+id).text()*1-1)
// 			$("#good"+id).text("讚").attr("onclick","good('"+id+"','1','"+user+"')")
// 		}
// 	})
// }
//以上是原函式庫提供function good()用在收回/增加讚

function good(news){
	$.post("./api/good.php",{news},()=>{
		location.reload(); //使用這個function流量變大 而且如果重整 畫面會有點變動 但考試只寫一行且本機考 影響不大
	})
	}


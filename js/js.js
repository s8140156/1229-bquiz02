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
		// reload()瀏覽器會重新載入當前頁面，即相當於按下瀏覽器的重新整理按鈕或者使用 F5 鍵
		// 特定的情境下，這段程式碼是在使用者進行某個操作（例如點擊按鈕）後，向伺服器發送一個 POST 請求（使用 jQuery 的 $.post() 方法），並在請求完成後，通過 location.reload() 重新載入當前頁面。這可能是為了在後端資料更新後，同步更新前端畫面，以確保使用者看到最新的內容。
		// 這樣的重新載入可能會導致頁面的重新整理，可能會有一些視覺上的變動。同時，使用 location.reload() 也會重新加載所有資源，包括 JavaScript、CSS、圖片等，這可能會對效能產生一些影響
	})
	}


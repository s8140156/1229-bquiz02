<fieldset>
	<legend>會員註冊</legend>
	<span style="color:red">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
	<table>
		<tr>
			<td class="clo">step1:登入帳號</td>
			<td><input type="text" name="acc" id="acc"></td>
		</tr>
		<tr>
			<td class="clo">step2:登入密碼</td>
			<td><input type="password" name="pw" id="pw"></td>
		</tr>
		<tr>
			<td class="clo">step3:再次確認密碼</td>
			<td><input type="password" name="pw2" id="pw2"></td>
		</tr>
		<tr>
			<td class="clo">step4:信箱(忘記密碼時使用)</td>
			<td><input type="text" name="email" id="email"></td>
		</tr>
		<tr>
			<td><input type="button" value="註冊" onclick="reg()">
			<!-- 在button“註冊(on＋click)”一個事件 使用reg() -->
			<!-- type要使用button, 才可以onclick事件 submit是傳送表單 -->
				<input type="reset" value="清除">
			</td>
			<td></td>
		</tr>
	</table>
</fieldset>
<script>
	function reg() {
		let user = {
			acc: $("#acc").val(),
			//acc的值來自於id=acc的輸入值（表單輸入）
			pw: $("#pw").val(),
			pw2: $("#pw2").val(),
			email: $("#email").val()
			//這邊是先把表單上的資訊收集成一個js物件陣列(json) 在打包去後端
		}
		//邏輯順序：先判斷表單輸入是否有空白=>2次密碼輸入檢查(只會在前端發生 後端不會執行)=>帳號是否有重複
		if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
			if (user.pw == user.pw2) {
				$.post("./api/chk_acc.php",{acc:user.acc},(res)=>{
					//這邊只傳{acc:user.acc}的資料過去 因為只是確認帳號是否有重複 要等確認帳號沒有重複後 才整包資料給資料庫
					// console.log(res)
					if(parseInt(res)==1){
						// parseInt字串轉數字
						// 判斷如果資料庫回傳是1(對資料庫count)代表有帳號並有重複則顯示alert
						alert("帳號重覆")
					}else{
						$.post('./api/reg.php',user,(res)=>{
							//實務上這邊應該要加判斷 if(res==1){}..
							//經以上全部判斷後 才整包user(物件 所以是陣列格式)給api去資料庫寫進執行
							alert('註冊完成 歡迎加入')
						})

					}

				})

			} else {
				alert("密碼錯誤")
			}
		} else {
			alert("不可空白")
			//有發現如果當判斷式是以(!以否定)不是什麼的時候開始 其實是代表如果不是這樣的情況 就會執行什麼什麼 所以後面的執行會很多
			//所以感覺要先把else後面的動作先寫好(就是如果是否定的話) 這樣如果裡面還有很幾層判斷式 這樣也比較清楚這層的結構在哪

		}
		// console.log(user);
	}
</script>
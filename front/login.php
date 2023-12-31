
<fieldset>
	<legend>會員登入</legend>
	<table>
		<tr>
			<td class="clo">帳號</td>
			<td><input type="text" name="acc" id="acc"></td>
		</tr>
		<tr>
			<td class="clo">密碼</td>
			<td><input type="password" name="pw" id="pw"></td>
		</tr>
		<tr>
			<td><input type="button" value="登入" onclick="login()"><input type="reset" value="清除"></td>
			<td><a href="?do=forget">忘記密碼</a> | <a href="?do=reg">尚未註冊</a></td>
		</tr>
	</table>
	
</fieldset>
<!-- fieldset下層是legend(把標題打上去) -->
<!-- 有css格式可以使用 請參考cent clo ct -->
<!-- 有沒有發現使用ajax看起來好像可以不用form表單 如果使用form表單送至後端 則需要一直來回判斷 在題二題型不方便 -->
<!-- ajax可以一連串動作如下 -->

<script>
	function login(){
		$.post('./api/chk_acc.php',{acc:$('#acc').val()},(res)=>{
			if(parseInt(res)==0){
				alert('查無帳號')
			}else{
				$.post('./api/chk_pw.php',{acc:$('#acc').val(),pw:$('#pw').val()},(res)=>{
					if(parseInt(res)==1){
						if($('#acc').val()=='admin'){
							location.href='back.php'
						}else{
							location.href='index.php'
						}
					}else{
						alert('密碼錯誤')
					}
				})
			}
		})
	}
</script>
<h2 class="ct">管理登入</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pwd" id="pwd"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
        <?php
            $a=rand(10,99);
            $b=rand(10,99);
            $_SESSION['ans']=$a+$b;
            echo $a . " + " . $b . " = ";
        ?>
        <input type="text" name="ans" id="ans"></td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>
<script>
function login(){
    let acc=$("#acc").val()
    let pwd=$("#pwd").val()
    let ans=$("#ans").val()

    $.get("api/chk_ans.php",{ans},function(res){
        if(res==1){
            $.get("api/chk_pwd.php",{'table':'b04admin',acc,pwd},function(res){
                if(res==1){
                    //登入成功時導向後台頁面
                    location.href='admin.php';
                }else{
                    alert("帳號或密碼錯誤")
                    location.reload()
                }
            })
        }else{
            alert('驗證碼錯誤,請重新輸入')
        }
    })

}



</script>
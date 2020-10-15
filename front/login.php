<h2>第一次購物</h2>
<a href="?do=reg"><img src="icon/0413.jpg" alt=""></a>
<h2>會員登入</h2>
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
            //利用亂數來產生兩個數字，並將答案存在session中
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['ans'] = $a + $b;
            echo $a . " + " . $b . " = ";
            ?>
            <input type="text" name="ans" id="ans"></td>
    </tr>
</table>
<div class="ct"><button onclick="login()">確認</button></div>
<script>
    function login() {
        let acc = $("#acc").val()
        let pwd = $("#pwd").val()
        let ans = $("#ans").val()

        //先檢查驗證碼的答案是否正確
        $.get("api/chk_ans.php", {
            ans
        }, function(res) {
            if (res == 1) {
                //檢查帳號及密碼是否相符
                $.get("api/chk_pwd.php", {
                    'table': 'b04member',
                    acc,
                    pwd
                }, function(res) {
                    if (res == 1) {
                        location.href = 'index.php';
                    } else {
                        alert("帳號或密碼錯誤")
                        //利用刷新畫面來清除表單欄位
                        location.reload()
                    }
                })
            } else {
                alert('驗證碼錯誤,請重新輸入')
            }
        })

    }
</script>
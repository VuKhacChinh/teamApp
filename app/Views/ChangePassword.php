<?php
include('template/header.php');
?>
<style>
.changepassword{
    min-height:320px;
}

.changepassword table{
    margin:auto;
}
.changepassword table,tr,th,td{
    border-collapse:collapse;
}

.changepassword td{
    text-align:center;
}

</style>
<?php include('template/header.php') ?>
<div id='dangnhap'>
    <fieldset class='dangnhap'>
	    <legend style='color:blue; font-size:200%; font-weight:bold'>Đổi mật khẩu</legend>
        <form action='SuaThongTin' method='post'>
            <label>Mật khẩu cũ</label>
            <input type='password' name='password'>
            <label>Mật khẩu mới</label>
            <input type='password' name='newpassword1'>
            <label>Nhập lại mật khẩu mới</label>
            <input type='password' name='newpassword2'>
            <button type='submit' name='btndoimatkhau'>Thay đổi</button>
        </form>
    </fieldset>
</div>
</body>

</html>
<?php if(isset($Exception)) echo "<h3 style='color:red; text-align:center;'>Mật khẩu mới nhập lại chưa khớp</h3>"?>
<?php if(isset($success)) echo "<h3 style='color:red; text-align:center;'>Thay đổi mật khẩu thành công</h3>"?>
<?php if(isset($PasswordException)) echo "<h3 style='color:red; text-align:center;'>Mật khẩu không chính xác</h3>"?>
</div>

</body>
</html>

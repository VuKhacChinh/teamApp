<?php include('template/header.php') ?>
<div id='dangnhap'>
    <fieldset class='dangnhap'>
	    <legend style='color:blue; font-size:200%; font-weight:bold'>Đăng kí</legend>
        <form action='' method='post'>
            <label>Họ tên</label>
            <input type='text' name='name'>
            <label>Tên tài khoản</label>
            <input type='text' name='username'>
            <label>Mật khẩu</label>
            <input type='password' name='password'>
            <label>Nhập lại mật khẩu</label>
            <input type='password' name='pass_confirm'>
            <label>Email</label>
            <input type='email' name='email'>
            <button type='submit' name='btndangki'>Đăng kí</button>
        </form>
    </fieldset>
</div>
</body>

</html>
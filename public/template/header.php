<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type='text/css' href="template/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.2/socket.io.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- import the webpage's stylesheet -->
    <link
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"
    />

    <!-- import the webpage's javascript file -->

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.20.0/dist/axios.min.js"></script>
    <script src="https://cdn.stringee.com/sdk/web/2.2.1/stringee-web-sdk.min.js"></script>
</head>
<body>
<div id='header'>
<ul id='listheader'>
<li>
<span id='home'><a href='GroupC'><i class="fas fa-home"></i>HUST TEAM</a></span>
</li>
<li style='width:13%; float:right;'>
<span id='signin'>
    <?php if(isset($_SESSION['iduser'])){
    ?>
    <div id='userfun'>
        <img src='static/<?php echo $_SESSION['avata']?>' style='width:40px; height: 40px; border-radius: 50%;'> <?php echo $_SESSION['name'] ?>
        <div id='listfunctionuser'>
            <ul>
                <li><a href='SuaThongTin?doimatkhau=1'>Đổi mật khẩu</a></li>
                <li><a href='SuaThongTin?suathongtin=1'>Sửa thông tin</a></li>
               <li><a href='LogoutC'>Đăng xuất</a></li>
            </ul>
        </div>
    </div>
    <?php } ?>
</span>
</li>
</ul>
</div>

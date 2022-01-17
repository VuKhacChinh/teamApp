<?php include('template/header.php') ?>
    <div class='content'>
		<?php include('template/left.php') ?>
		<?php include('template/left2.php') ?>
        <div style='width:40%; margin:auto; margin-top:0;'>
            <div id='addmember'>
                <form action='MemberC?idgroup=<?php echo $_GET['idgroup'] ?>' method='post'>
                    <input type='text' name='email' placeholder='Nhập email'>
                    <button type='submit' name='btnaddmember'>Thêm</i></button>
                </form>
            </div>
            <div id='addmemsucess'></div>
            <div id='joinning_request'>
                <a href='MemberC?idgroup=<?php echo $_GET['idgroup'] ?>&joinning_request=1'>Yêu cầu gia nhập</a>
            </div>
			<div class="m-4">
                <?php 
                foreach($users as $user){ 
                ?>
                <div class='posting_user' style='background-color:#BCBCBC; margin:10px; display:flex'>
                    <div style=' display:flex; width:
                        <?php
                        if($manager==1&&$viewrequest==1) echo "68%";
                        else if($manager==1&&$viewrequest==0) echo "90%"; 
                        ?>'>
					    <div class='avata'>
						    <img src='static/<?php echo $user->avata?>' style='width:50px; height:50px; border-radius: 50%'>
                        </div>
					    <div class='infor_postuser'>
                            <div class='username' style='font-weight: bold'><?php echo $user->name ?></div>
                            <div class='user_email'><?php echo $user->email ?></div>
                        </div>
                    </div>
                    <?php 
                    if($manager==1&&$viewrequest==0&&$user->iduser != $_SESSION['iduser'])
                    {
                    ?>
                    <div class='manager_function'>
                        <button class='expel_refuse' value='<?php echo $user->iduser ?>'>Đuổi</button>
                    </div>
                    <?php
                    }
                    else{
                        
                        if($manager==1&&$viewrequest==1)
                        {
                    ?>
                        <div class='manager_function'>
                            <button class='expel_refuse' value='<?php echo $user->iduser ?>'>Từ chối</button>
                            <button class='approval' value='<?php echo $user->iduser ?>'>Phê duyệt</button>
                        </div>
                    <?php
                        }
                    }
                    ?>    
				</div>
                <?php
                }
                ?>
			</div>
		</div>
    </div>
	</body>
    <script>
// thông báo kết quả mời thành viên vào nhóm
    var opacity = 1;
    $(document).ready(function () {
        setInterval(function(){
            $('#addmemsucess').html("<?php
                if(isset($addmemsucess)){ 
                    if($addmemsucess==1){
                        echo "<h4 style='color:green; position: fixed; top:150px; left: 270px'>Thêm thành công</h4>";
                    }
                    else echo "<h4 style='color:red; position: fixed; top:150px; left: 270px'>Thành viên đã trong nhóm</h4>";
                }
            ?>");
            $('#addmemsucess').css('opacity',opacity);
            opacity = opacity - 0.1;
        }, 250);
    });
    // trục xuất thành viên
    $('.expel_refuse').click(function(){
        var user_group = {
            iduser:$(this).val(),
            idgroup:<?php echo $_GET['idgroup']; ?>
        };
        $.get('Ajax/expelMember',user_group);
        $(this).parent().parent().hide();
    });
    $('.approval').click(function(){
        var user_group = {
            iduser:$(this).val(),
            idgroup:<?php echo $_GET['idgroup']; ?>
        };
        $.get('Ajax/approvalMember',user_group);
        $(this).parent().parent().hide();
    });
</script>
</html>
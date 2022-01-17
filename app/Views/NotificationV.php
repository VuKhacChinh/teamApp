<?php include('template/header.php') ?>
    <div class='content'>
		<?php include('template/left.php') ?>
        <div style='width:60%; margin:auto; margin-top:0;'>
                <?php 
                foreach($notifications as $notification){ 
                ?>
                    <div style="background-color: #FAEBD7;" class="m-2 row">
                        <span class="<?php if($notification->view==0) echo "bg-info"; else echo "bg-secondary"; ?> text-light p-2 col-3 text-center"> <img src='static/<?php echo $notification->avata?>' class='fluid-image' style='width: 50px; height: 50px; border-radius: 50%'/> <?php echo $notification->name?></span>
                        <span class="col-9 d-flex align-items-center text-success">Đã bình luận về bài viết của bạn trong nhóm <?php echo $notification->groupname?></span>
                    </div>
                <?php
                }
                ?>
		</div>
    </div>
    </body>
</html>

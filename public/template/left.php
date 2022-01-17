<div class='left'>
    <div>
        <a href='NotificationC'>
			<i class="fas fa-bell"></i>
            <label>Thông báo</label>
        </a>
        <a href='GroupC'>
            <i class="fas fa-users"></i>
            <label>Nhóm</label>
        </a>
    </div>
</div>
<script>
$(document).ready(function () {
			setInterval(function(){
				var element = $('#notification');
				var value = element.html();
				if(value=="") value = 0;
				else value = parseInt(value);
				var iduser = <?php echo $_SESSION['iduser'] ?>;
				var data_send = {
					iduser:iduser,
					numofnotification:value
				};
				$.get("Ajax/getNumofNotification",data_send,function(data){
					data = parseInt(data);
					element.html(value+data);
				});
				
			},1000);
			});
</script>

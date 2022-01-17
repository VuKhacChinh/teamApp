<div class='left2'>
    <div>
        <h5 style='text-align:center;'><?php echo $_GET['groupname'] ?></h5>
        <a href='PostC?idgroup=<?php echo $_GET['idgroup'] ?>'>
            <label>Thảo luận</label>
        </a>
        <a href='MeetingC?idgroup=<?php echo $_GET['idgroup'] ?>'>
            <label>Cuộc họp</label>
        </a>
        <a href='MessengerC?idgroup=<?php echo $_GET['idgroup'] ?>'>
			<i class="fab fa-facebook-messenger"></i>
            <label>Tin nhắn</label>
        </a>
        <a href='FileC?idgroup=<?php echo $_GET['idgroup'] ?>'>
            <label>Tài liệu chung</label>
        </a>
        <a href='MemberC?idgroup=<?php echo $_GET['idgroup'] ?>'>
            <label>Thành viên</label>
        </a>
        <a href='MemberC?idgroup=<?php echo $_GET['idgroup'] ?>&out=1'>
            <label>Rời nhóm</label>
        </a>
    </div>
</div>

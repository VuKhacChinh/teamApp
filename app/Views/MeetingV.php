<?php include('template/header.php') ?>
<style>
  video{
    width: 45%;
    margin: 2px;
  }
</style>
<div class='content'>
    <?php include('template/left.php') ?>
    <?php include('template/left2.php') ?>
    <div style='width:70%; margin:auto; margin-top:0; margin-left: 400px; flex-direction:column'>
      <div class='meeting_function' id="app">
        <button class="create_room button is-primary btn btn-warning" @click="createRoom" name='btnCreate'>Tạo cuộc họp</button>   
        <button class="button is-info btn btn-info" v-if="!room" @click="joinWithId">
          Join Meeting
        </button>
        <button class="button is-info btn btn-success" v-if="room" @click="publish(true)">
          Share Desktop
        </button>
        <form action='' method='post' class='m-1'>
          <button class="end_room button is-info btn btn-danger" v-if="room" name='btnEnd'>
            End Room
          </button>
        </form>
        <p id="code" class="p-2 bg-info" style="display: none"><span class="text-light">Mã phòng</span> <code class="text-danger">{{roomId}}</code></p>
      </div>
      <div class="d-flex flex-row">
        <div id="videos" class="d-flex flex-row jusify-content-center align-items-center text-center"></div>
      </div>
    </div>
</div>
</body>
<script src="meetingAPI/api.js"></script>
<script src="meetingAPI/script.js"></script>
<script>


    $('.create_room').click(function(){
      $(this).css({'display':'none'});
      $('#code').css({'display':'block'});
    });

    $('.end_room').click(function(){
      $('.create_room').css({'display':'block'});
    });
</script>
</html>


<?php include('template/header.php') ?>
<div class='content'>
    <style type="text/css">
        #myiframe {
            width: 1300px;
            height: 91vh;
            margin-left: 10px;
            visibility:hidden;
        }
    </style>
    <?php include('template/left.php') ?>
    <?php include('template/left2.php') ?>
    <iframe name="myiframe" id="myiframe" src="uploads/test.pdf"></iframe>
    <div style="width: 25%; height: 91vh;">
        <div class="border border-1 border-primary text-center bg-warning" style="height:100px;">
            <form action="FileC?idgroup=<?php echo $_GET['idgroup']?>" method="post" enctype="multipart/form-data">
            <input type='hidden' name='idgroup' value=<?php echo $_GET['idgroup'] ?>>
            <div>
                <label class="btn btn-outline-primary m-1" for="files" class="btn">Chọn tệp</label>
                <input class="w-25" id="files" style="visibility:hidden;" name='fileupload' type="file">
                <button class='w-25 btn btn-primary'>Tải lên</button>
            </div>
            </form>
            <h3 class="text-primary" id="chosen-file">Chưa chọn tệp</h3>
        </div>
        
        <div style='display: flex; flex-direction:column; '>
            <?php 
            foreach($files as $file){
            ?>
            <button class="file btn btn-outline-success m-1"><?php echo $file->filepath ?></button>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
<script>
    $('.file').click(function(){
        $('#myiframe').attr('src','uploads/'+$(this).html());
        $('#myiframe').css({'visibility':'visible'});
    });

    $('#files').change(function(){
       let file_path = $(this).val();
       file_path = file_path.split("\\");
       let file_name = file_path[file_path.length-1];
       $('#chosen-file').html(file_name);

    })
</script>
</html>

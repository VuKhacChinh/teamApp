<?php include('template/header.php') ?>
        <script>
            function createGroup(){
                document.getElementById('create_group').style.display='inline-block';
                document.getElementById('input_create_group').focus();
            }
            function cancel_CreateGroup(){
                document.getElementById('create_group').style.display='none';
            }
        </script>
        <div class='content'>
        <?php include('template/left.php') ?>
        <div class='w-100'>
            <div id="search_create">
                <div id='button_create'>
                    <button  onclick="createGroup()"><i class="fas fa-plus-circle"></i> Tạo nhóm mới</button>
                </div>
                <div id='search_group'>
                    <form action='SearchGroupC' method='post'>
                        <input type='text' name='searchkey' placeholder='Tìm kiếm nhóm'>
                        <button type='submit'><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
            <br><br><br>
            <div>
                <div class="d-flex justify-content-center">
                    <div id="create_group">
                        <h3>Nhập tên nhóm</h3>
                        <form action='' method='post'>
                            <input id='input_create_group' type='text' name='groupname'>
                            <button type='submit'><i class="fas fa-plus-circle"></i>Thêm</button>
                            <input id='cancel_create_group' onclick="cancel_CreateGroup()" type='button' value='Hủy'>
                        </form>
                    </div>
                </div>
                <div class='group_content' style='margin-left:60px;'>
                <?php
                    $i = 0;
                    foreach($groups as $group)
                    {
                        if($i%5==0) echo "<div class='list_group d-flex flex-wrap justify-content-start'>";
                ?>
                        <a class="group d-flex justify-content-center align-items-center" style="background-color: #F5FFFA; margin: 50px; border: 1px solid blue" href='PostC?idgroup=<?php echo $group->idgroup ?>&groupname=<?php echo $group->groupname; ?>'>
                            <div class="d-flex justify-content-center align-items-center"<?php echo "style='width:120px; height:120px; background-color:".$group->groupcolor."'" ?>>
                                <?php echo $group->groupname; ?>
                            </div>
                        </a>
                <?php
                        if($i%5==4) echo "</div>";
                        ++$i;
                    }
                    if($i%5!=0) echo "<div class='list_group'>";
                ?>
            </div>
        </div>
        </div>
        </div>
    </body>
</head>

</html>

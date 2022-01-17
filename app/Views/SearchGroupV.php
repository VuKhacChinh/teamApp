<?php include('template/header.php') ?>
    <body>
    <div class='content'>
        <?php include('template/left.php') ?>
        <div class='main_content'>
            <div id="search_create">
                <div id='search_group'>
                    <form action='SearchGroupC' method='post'>
                        <input type='text' name='searchkey' placeholder='Tìm kiếm nhóm'>
                        <button type='submit'><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class='group_content' style='margin:0 auto;'>

            <?php
                $i = 0;
                foreach($exceptgroup as $group)
                {
                    if($i%4==0) echo "<div class='list_group'>";
            ?>
            <div style="background-color: white; margin: 20px; border: 1px solid blue;">
                <div class="btn" style='width: 150px; height: 150px; margin: 50px; background-color:<?php echo $group->groupcolor?>' >
                    <form action='' method='post'>
                        <input type='hidden' name='idgroup' value='<?php echo $group->idgroup?>'>
                        <input type='hidden' name='searchkey' value='<?php echo $searchkey?>'>
                        <ul>
                            <li><i class="fas fa-icons" ></i></li>
                            <li><?php echo $group->groupname; ?></li>
                            <li class='numofmem'>Thành viên: <?php echo $group->numofmem ?></li>
                            <li>
                                <button class='thamgia' name='btnthamgia' type='submit'>Tham gia</button>
                            </li>
                        <ul>
                    </form>
                </div>
            </div>
            <?php
            if($i%4==3) echo "</div>";
            ++$i;
            }
            if($i%4!=0) echo "</div>";
            ?>

            <?php
                $i = 0;
                foreach($reqgroups as $group)
                {
                    if($i%4==0) echo "<div class='list_group'>";
            ?>
            <div style="margin: 20px; border: 1px solid blue; background-color: white">
                <div class="btn" style='width: 150px; height: 150px; margin: 50px; background-color:<?php echo $group->groupcolor?>' >
                    <form action='' method='post'>
                        <input type='hidden' name='idgroup' value='<?php echo $group->idgroup?>'>
                        <input type='hidden' name='searchkey' value='<?php echo $searchkey?>'>
                        <ul>
                            <li><i class="fas fa-icons" ></i></li>
                            <li><?php echo $group->groupname; ?></li>
                            <li class='numofmem'>Thành viên: <?php echo $group->numofmem ?></li>
                            <li><span style='background-color:#fff'>Đã yêu cầu</span></li>
                        <ul>
                    </form>
                </div>
            </div>
            <?php
            if($i%4==3) echo "</div>";
            ++$i;
            }
            if($i%4!=0) echo "</div>";
            ?>
        </div>
    </body>
</head>

</html>

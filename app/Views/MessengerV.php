
        <?php include("template/header.php") ?>
        <?php
            $iduser = $_SESSION['iduser'];
        ?>
        <div class="content d-flex flex-row">
            <?php
                include("template/left.php");
                include("template/left2.php");
            ?>
            <!--Tin nhắn nhóm -->
            <div class='d-flex flex-column bg-light' style='position: fixed; right:150px; left: 430px; border: 1px solid #cdcdcd'>
                <div id="main_conv" style="height: 84vh; overflow-y:auto">
                    <?php
                    foreach($mess as $mes){
                    ?>
                    <div class="d-flex align-items-center m-3 text-light
                        <?php 
                            if($mes->iduser!=$iduser) echo "flex-row-reverse";
                        ?>
                    ">
                        <img src="static/<?php echo $mes->avata ?>" style="width:20px; height: 20px; border-radius: 50%; margin: 3px;"/>
                        <span class="<?php if(strpos($mes->content, "heart")==true); else if($mes->iduser==$iduser) echo "bg-primary"; else echo "bg-secondary" ?> p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">
                            <?php echo $mes->content ?>
                        </span>
                    </div>
                    <?php
                    } 
                    ?>
                </div>
                <div class="align-items-center d-flex p-2" style="width: 100%">
                    <input id="textInput" class="form-control" style="width: 95%; border-radius: 20px;" type="text" name="question" placeholder="Nhập tin nhắn">
                    <button id="heart" class="btn btn-light"><i class="fa fa-heart" style="color:red; font-size:120%"></i></button>
                </div>
                <script>
                    var conversation = document.getElementById("main_conv");
                    conversation.scrollTop = conversation.scrollHeight;
                    var iduser = <?php echo $_SESSION['iduser'] ?>;
                    var idgroup = <?php echo $idgroup ?>;
                    var socket = io('http://localhost:3000', { transports: ['websocket', 'polling', 'flashsocket'] });
                    socket.on('message', function (data) {
                        if(idgroup!=data.idgroup) return;
                        var img = "<img src='http://localhost/"+ data.avata+ "' style='width:20px; height: 20px; border-radius: 50%; margin: 3px;'/>";
                        var content ="";
                        if(data.content.includes("fa-heart")){
                            if(data.iduser==iduser){
                                content += '<div class="d-flex align-items-center  m-3">' + img + '<span class=" p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">' + data.content + "</span></div>";
                            }
                            else{
                                content += '<div class="d-flex flex-row-reverse align-items-center  m-3">' + img + '<span class=" p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">' + data.content + "</span></div>";
                            }
                        }
                        else{
                            if(data.iduser==iduser){
                                content += '<div class="text-light d-flex align-items-center  m-3">' + img + '<span class="bg-primary p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">' + data.content + "</span></div>";
                            }
                            else{
                                content += '<div class="text-light d-flex flex-row-reverse align-items-center  m-3">' + img + '<span class="bg-secondary p-1 d-inline-block" style="border-radius: 15px 15px 15px 15px; min-width:60px;">' + data.content + "</span></div>";
                            }
                        }
                        $( "#main_conv" ).append(content);
                        conversation.scrollTop = conversation.scrollHeight;
                    });
                    function chat(text) {

                        // socket
                        $("#textInput").val("");
                        let data = {
                            username: "<?php echo $_SESSION['username']?>",
                            iduser: <?php echo $_SESSION['iduser'] ?>,
                            idgroup: <?php echo $idgroup ?>,
                            avata: "static/<?php echo $_SESSION['avata']?>",
                            content: text,
                        }
                        this.socket.emit('message', data);
                        // insert to db
                        let data2 = {
                            iduser: <?php echo $_SESSION['iduser'] ?>,
                            idgroup: <?php echo $idgroup ?>,
                            content: text
                        }
                        $.get('/Ajax/chat',data2);
                        
                    }
                    $("#textInput").keypress(function(e) {
                        if (e.which == 13) {
                            let rawText = $("#textInput").val();
                            if(rawText=="") return;
                            chat(rawText);
                        }
                    });

                    $("#heart").click(function() {
                        let text = $(this).html();
                        chat(text);
                    });
                </script>
            </div>        
            <div>
        </div> 
    </body>   
</html>
<?php include('template/header.php') ?>
    <script>
		// tạo bài viết
		function createPost(){
			document.getElementById('create_post_input').style.display = 'block';
			document.getElementById('create_post_input').style.backgroundColor = 'white';
			document.getElementById('post_input').focus();
		}

		function completeCreatePost(){
			document.getElementById('create_post_input').style.display = 'none';
		}

	</script>
    <div class='content'>
		<?php include('template/left.php') ?>
		<?php include('template/left2.php') ?>
			<div style='width:60%; margin:auto; margin-top:0;'>
			<div>
			 <button id='create_post' style="border: 1px solid #cdcdcd" onclick="createPost()">
			    <i class="fas fa-pencil-alt"></i>
				<span>Create post</span>
			</button>
			<div id='create_post_input'>
				<fieldset>
					<legend style="color: blue">
						Tạo bài viết
					</legend>
				    <form action='PostC?idgroup=<?php echo $_GET['idgroup'] ?>' method="post">
						<div id='area_create' style="margin: 10px;">
							<textarea id='post_input' name='post_input' rows="10"></textarea>
						</div>
					    <button type='submit' name='btn_post_input' onclick='completeCreatePost()'>Đăng</button>
					    <input type='button' id='cancel_post_input' value='Hủy' onclick='completeCreatePost()'>
				    </form>
	            </fieldset>
			</div>
	       </div>
			<div id='content_post'>
				<ul id='list_post'>
					<?php
					$i = 0;
					foreach($posts as $post)
					{
						if($i>=5) break;
					?>
					<li>
						<div class='posting' id='post<?php echo $post->iduser ?>'>
							<?php 
						    if($manager==1||$_SESSION['iduser']==$post->iduser){
						    ?>
							<div style='float: right;'>
							    <button class='btnpost_function'>
							        <i class="fas fa-ellipsis-h"></i>
						        </button>
							    <div class='post_function'>
								    <form action='PostC?idgroup=<?php echo $_GET['idgroup'] ?>' method='post'>
									    <input type='hidden' name='idpost' value='<?php echo $post->idpost?>'>
										<?php 
										if($_SESSION['iduser']==$post->iduser){
										?>
										<input class='btnedit'type='button' name='btnupdatepost' value='Sửa bài viết'>
										<div class='new_post_input'>
				                            <fieldset>
					                            <legend>
						                            Sửa bài viết
					                            </legend>
						                        <div class='area_edit'>
							                        <textarea class='edit_input' name='edit_input' rows="7"></textarea>
						                        </div>
					                            <button type='submit' class='editcomplete' name='btn_new_post_input'>Sửa</button>
					                            <input type='button' class='editcomplete' value='Hủy'>
	                                        </fieldset>
			                            </div>
										<?php 
										}
										?>
									    <button type='submit' name='btndeletepost'>Xóa bài viết</button>
								    </form>
							    </div>
					        </div>
							<?php
							}
							?>

						    <div class='posting_user'>
								<div class='avata'>
								    <img src='static/<?php echo $post->avata; ?>'>
                                </div>
								<div class='infor_postuser'>
									<div class='username' style='font-weight: bold'>
										<?php echo $post->name ?>
								    </div>
									<div class='post_time'>
										<?php
										   $cur_date = strtotime(date("Y-m-d H:i:s"));
										   $post_date = strtotime($post->posttime); 
										   $hour = round(abs($cur_date-$post_date)/(60*60));
										   if($hour < 24) echo $hour." giờ";
										   else if($hour < 24*30) echo round($hour/24)." ngày";
										   else if($hour < 24*30*12 ) echo round($hour/24/30)." tháng";
										   else echo round($hour/24/30/12)." năm";
										?> 
										</div>
								</div>
							</div>
							<p class='main_content_post'><?php echo $post->contentpost ?></p>
							<div class='function'>
								<h4 style="text-align:center; color: blue">Bình luận bên dưới</h4>
							</div>
							<ul class='comment'>
										
							</ul>
							<div>
							    <input type='hidden' name='idpost_ajax' value='<?php echo $post->idpost ?>'>
							    <button class='more_comment' value='0'>Xem thêm...</button>
							</div>
							<div class='enter_comment' style='margin: 5px;'>
							    <input type='hidden' name='iduser' value='<?php echo $post->iduser ?>'>
							    <input type='hidden' name='idpost_ajax' value='<?php echo $post->idpost ?>'>
								<input type='text' class='cmt'
								placeholder='Viết gì đó...'
								style=' width:90%;padding: 5px; background-color:#D0D0D0; border-radius:15px; border: 2px none;'>
						    </div>
						</div>
					</li>
					<?php
					++$i;
					}
					?>
				</ul>
				<button class='more_post' value='1'>Xem thêm bài viết...</button>
			</div>
		</div>
    </div>
			<script>
				var avata_path = '<?php echo $_SESSION['avata'] ?>';
			// Bắt sự kiện enter khi comment/rep_comment và load comment vào trang hiện tại
			function getComment(value,list_comment,cl) {
			    if(value=="") return 0;
			    if(cl=="cmt") cl="comment";
			    else cl="rep_comment";
			    var avata = "<div class='avata'><img src='static/"+avata_path+"'></div>";
			    var content_comment = "<span class='"+cl+"_content'>" + value + "</span>";
			    var time_comment = "<span class='"+cl+"_time'>1 giờ</span>";
			    var comment = "<div class='"+cl+"'>" + content_comment + time_comment +"</div>";
			    var comment_component = "<div class='"+cl+"_user'>" + avata + comment +"</div>";
			    var li_comment = "<li>" + comment_component + "</li>";
                list_comment.append(li_comment);
				return 1;
            }
            $(".posting").delegate("input", "focus", function(){
				var element = $(this);
			    element.keypress(function(e){
				    if(e.which==13){
						var value = element.val();
					    var res = getComment(element.val(),element.parent().prev(),element.attr('class'));
						if(res==1){
							$comment = {
							    idpost: element.prev().attr('value'),
							    contentcomment: value,
								iduser2: element.prev().prev().attr('value'),
								idgroup: <?php echo $_GET['idgroup'] ?>
						    };
							$repcomment = {
							    idcomment: element.prev().attr('value'),
							    contentrepcomment: value,
								iduser2: element.prev().prev().attr('value'),
								idgroup: <?php echo $_GET['idgroup'] ?>
						    };
							if(element.attr('class')=="cmt"){
								$.post("Ajax/addComment",$comment);
								let iduser = <?php echo $_SESSION['iduser'] ?>;
								if(iduser != $comment.iduser2) $.post("Ajax/addNotification",$comment);
							}
							else {
								$.post("Ajax/addRepComment",$repcomment);
							}
							element.val("");
						}
				    }
			    });
            });

			// tải bình luận khi bấm xem bình luận
			$('.more_comment').click(function(){
				var element = $(this);
				var idpost = element.prev().attr('value');
				var index = parseInt(element.attr('value'));
				var data_send = 
				{
					idpost:idpost,
					index:index
				};
				element.val(index+1);
			    $.get("Ajax/loadComment",data_send,function(data){
					if(data!="") {
						element.parent().prev().append(data);
					}
					else{
						element.parent().next().css('display','block');
						element.css('display','none');;
					}
				});
            }); 

			// tải hết bình luận khi người dùng bấm nút bình luận

			$('.btncomment').click(function(){
				var element = $(this);
				var idpost = element.attr('value');
				var flag = element.prev().attr('value');
				var input_element = element.closest(".function").next();
				if(flag==0){
					$.get("Ajax/loadAllComment",{idpost:idpost},function(data){
					if(data!="") input_element.append(data);
					input_element.next().next().css('display','block');
					input_element.next().next().find('.cmt').focus();
					input_element.next().css('display','none');
				    });
					element.prev().val(1);
				}
			    else input_element.next().next().find('.cmt').focus();
            });

			// tải phản hồi bình luận khi bấm xem phản hồi
			$(".comment").delegate(".more_rep_comment", "click", function(){
				var element = $(this);
				var idcomment = element.prev().attr('value');
				var index = parseInt(element.attr('value'));
				var data_send = 
				{
					idcomment:idcomment,
					index:index
				};
				element.val(index+1);
			    $.get("Ajax/loadRepComment",data_send,function(data){
					if(data!="") element.parent().prev().append(data);
					else{
						element.parent().next().css('display','block');
						element.css('display','none');;
					}
				});
            }); 

			// làm hiện chức năng xóa hoặc chỉnh sửa bài viết
			$(".btnpost_function").click(function(e){
			    $(this).next().css(
					{
						"display":"block",
					    "position":"relative"
					}
				);
				e.stopPropagation();
		    });

			$(document).mouseup(function(e){
                var container = $('.btnpost_function').next().filter(function() {
                                   return $(this).css('display') == 'block';
                                });
                // If the target of the click isn't the container
                if(!container.is(e.target) && container.has(e.target).length === 0){
                    container.hide();
					document.getElementById('new_post_input').style.display = 'none';
                }
            });
			$('.btnedit').click(function(){
				var element = $(this);
				element.next().css({
					"display":"block",
					"background-color":"white"
					});
				element.next().find('.edit_input').val(element.closest('.posting').find('.main_content_post').html())
			    element.next().find('.edit_input').focus();
			});

			// Ẩn bảng chỉnh sửa khi hoàn thành
			$('.editcomplete').click(function(){
				$(this).closest('.new_post_input').css('display','none');
			});

			// tải thêm bài viết
			$(".more_post").click(function(){
				var element = $(this);
				var idgroup = <?php echo $_GET['idgroup'] ?> ;
				var index = parseInt(element.attr('value'));
				var data_send = 
				{
					idgroup:idgroup,
					index:index
				};
				element.val(index+1);
			    $.get("Ajax/loadPost",data_send,function(data){
					if(data!="") $('#list_post').append(data);
					else{
						element.css('display','none');
					}
				});
            }); 

			</script>
		</body>
	</html>

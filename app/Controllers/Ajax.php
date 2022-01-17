<?php namespace App\Controllers;
use App\Models\Comment;
use App\Models\RepComment;
use App\Models\User_Group;
use App\Models\User_Req_Group;
use App\Models\Post;
use App\Models\Math;
use App\Models\Notification;
use App\Models\Messenger;

class Ajax extends BaseController
{
    public function index(){

    }

    public function getNumofNotification(){
        $iduser = $_GET['iduser'];
        settype($iduser,'int');
        $pre_numofnotification = $_GET['numofnotification'];
        settype($pre_numofnotification,'int');
        $notification_obj = new Notification();
        $cur_numofnotification = $notification_obj->getNumOfNotificationById($iduser);
        $numofnewnotification = $cur_numofnotification - $pre_numofnotification;
        settype($numofnewnotification,'string');
        return $numofnewnotification;
    }

    public function addNotification(){
        
        session_start();
        $iduser2 = $_POST['iduser2'];
        $idgroup = $_POST['idgroup'];
        $idpost = -1;
        $idcomment = -1;
        if(isset($_POST['idpost'])) $idpost = $_POST['idpost'];
        if(isset($_POST['idcomment'])) $idcomment = $_POST['idcomment'];
        $notification = array(
            'idownuser' => $_SESSION['iduser'],
            'idgroup' => $idgroup,
            'idcmtuser' => $iduser2,
        );
        
        $notification_obj = new Notification();
        $notification_obj->addNotification($notification);
    }

    public function setStateNotification(){
        $idnotification = $_GET['idnotification'];
        $notification_obj = new Notification();
        $notification_obj->setStateNotification($idnotification);
    }

    public function addComment(){
        session_start();
        $comment = array(
            'idpost' => $_POST['idpost'],
            'iduser' => $_SESSION['iduser'],
            'contentcomment' => $_POST['contentcomment'],
            'commenttime' => date("Y-m-d H:i:s")
        );
        $comment_obj = new Comment();
        $comment_obj->addComment($comment);
    }

    public function loadComment(){
        $idpost = $_GET['idpost'];
        $index = $_GET['index'];
        $comment_obj = new Comment();
        $math_obj = new Math();
        $list_comment = $comment_obj->getComments($idpost);
        $numofcomment = $math_obj->countArray($list_comment);
        $list_comment_data = "";
        for($i = $index*5; $i < ($index+1)*5; ++$i){
            if($i >= $numofcomment){
                break;
            }

			$cur_date = strtotime(date("Y-m-d H:i:s"));
			$comment_date = strtotime($list_comment[$i]->commenttime); 
			$hour = round(abs($cur_date-$comment_date)/(60*60));
			if($hour < 24) $cur_date_format =  $hour." giờ";
			else if($hour < 24*30) $cur_date_format =  round($hour/24)." ngày";
			else if($hour < 24*30*12 ) $cur_date_format =  round($hour/24/30)." tháng";
			else $cur_date_format =  round($hour/24/30/12)." năm";

            $avata = "<div class='avata'><img src='static/".$list_comment[$i]->avata."'></div>";
            $content_comment = "<span class='comment_content'>".$list_comment[$i]->contentcomment."</span>";
            $time_comment = "<span class='comment_time'>".$cur_date_format."</span>";
            $comment = "<div class='comment'>".$content_comment.$time_comment."</div>";
            $comment_component = "<div class='comment_user' id='comment".$list_comment[$i]->idcomment."'>".$avata.$comment."</div>";
            $li_comment = "<li>".$comment_component."</li>";
            $li_comment = $li_comment."<ul class='rep_comment'></ul>
                                        <div>
                                            <input type='hidden' name='idcomment_ajax' value='".$list_comment[$i]->idcomment."'>
                                            <button class='more_rep_comment' value='0'>Xem phản hồi...</button>
                                        </div>
                                        <div class='enter_rep_comment' style='margin-left:25px; display:none'>
                                            <input type='hidden' name='idcomment_ajax' value='".$list_comment[$i]->iduser."'>
                                            <input type='hidden' name='idcomment_ajax' value='".$list_comment[$i]->idcomment."'>
								            <input class='rep_cmt' type='text'
								            placeholder='Viết gì đó...'
								            style='width:80%; padding:5px; background-color:#D0D0D0; border-radius:15px; border: 2px none;'>
						                </div>
                                        ";
            $list_comment_data = $list_comment_data.$li_comment;
        }
        return $list_comment_data; 
    }

    public function addRepComment(){
        session_start();
        $repcomment = array(
            'idcomment' => $_POST['idcomment'],
            'iduser' => $_SESSION['iduser'],
            'contentrepcomment' => $_POST['contentrepcomment'],
            'repcommenttime' => date("Y-m-d H:i:s")
        );
        $repcomment_obj = new RepComment();
        $repcomment_obj->addRepComment($repcomment);
    }

    public function loadRepComment(){
        $idcomment = $_GET['idcomment'];
        settype($idcomment,'int');
        $index = $_GET['index'];
        settype($index,'int');
        $repcomment_obj = new RepComment();
        $math_obj = new Math();
        $list_repcomment = $repcomment_obj->getRepComments($idcomment);
        $numofrepcomment = $math_obj->countArray($list_repcomment);

        $cur_date = strtotime(date("Y-m-d H:i:s"));
        $repcomment_date = strtotime($list_comment[$i]->repcommenttime); 
        $hour = round(abs($cur_date-$repcomment_date)/(60*60));
        if($hour < 24) $cur_date_format =  $hour." giờ";
        else if($hour < 24*30) $cur_date_format =  round($hour/24)." ngày";
        else if($hour < 24*30*12 ) $cur_date_format =  round($hour/24/30)." tháng";
        else $cur_date_format =  round($hour/24/30/12)." năm";

        $list_repcomment_data = "";
        for($i = $index*5; $i < ($index+1)*5; ++$i){
            if($i >= $numofrepcomment){
                break;
            }
            $avata = "<div class='avata'><img src='static/".$list_repcomment[$i]->avata."'></div>";
            $content_repcomment = "<span class='rep_comment_content'>".$list_repcomment[$i]->contentrepcomment."</span>";
            $time_repcomment = "<span class='rep_comment_time'>".$cur_date_format."</span>";
            $repcomment = "<div class='rep_comment'>".$content_repcomment.$time_repcomment."</div>";
            $repcomment_component = "<div class='rep_comment_user' id='repcomment".$list_repcomment[$i]->idrepcomment."'>".$avata.$repcomment."</div>";
            $li_repcomment = "<li>".$repcomment_component."</li>";
            $list_repcomment_data = $list_repcomment_data.$li_repcomment;
        }
        return $list_repcomment_data; 
    }

    public function loadAllComment(){
        $idpost = $_GET['idpost'];
        $comment_obj = new Comment();
        $list_comment = $comment_obj->getComments($idpost);
        $numofcomment = count($list_comment,0);
        $list_comment_data = "";
        for($i = 0; $i < $numofcomment; ++$i){
            $avata = "<div class='avata'><img src='static/".$list_comment[$i]->avata."'></div>";
            $content_comment = "<span class='comment_content'>".$list_comment[$i]->contentcomment."</span>";
            $time_comment = "<span class='comment_time'>".$list_comment[$i]->commenttime."</span>";
            $comment = "<div class='comment'>".$content_comment.$time_comment."</div>";
            $comment_component = "<div class='comment_user'>".$avata.$comment."</div>";
            $li_comment = "<li>".$comment_component."</li>";
            $li_comment = $li_comment."<ul class='rep_comment'></ul>
                                        <div>
                                            <button class='more_rep_comment'>Xem phản hồi...</button>
                                        </div>";
            $list_comment_data = $list_comment_data.$li_comment;
        }
        return $list_comment_data; 
    }

    public function expelMember(){
        $iduser = $_GET['iduser'];
        $idgroup = $_GET['idgroup'];
        $user_req_group_obj = new User_Req_Group();
        $user_req_group_obj->expelMember($iduser,$idgroup);
    }

    public function approvalMember(){
        $iduser = $_GET['iduser'];
        $idgroup = $_GET['idgroup'];
        $user_group_obj = new User_Group();
        $user_group_obj->approvalMember($iduser,$idgroup);
        $user_req_group_obj = new User_Req_Group();
        $user_req_group_obj->expelMember($iduser,$idgroup);
    }

    public function loadPost(){
        $idgroup = $_GET['idgroup'];
        settype($idgroup,'int');
        $index = $_GET['index'];
        settype($index,'int');
        $post_obj = new Post();
        $math_obj = new Math();
        $list_post = $post_obj->getPosts($idgroup);
        $numofpost = $math_obj->countArray($list_post);
        $list_post_data = "";

        for($i = $index*5; $i < ($index+1)*5; ++$i){
            if($i >= $numofpost){
                break;
            }

            $post= "<li>
						<div class='posting'>
							<div style='float: right;'>
							    <button class='btnpost_function' style='float: right;'>
							        <i class='fas fa-ellipsis-h'></i>
						        </button>
							    <div class='post_function'>
								    <form action='PostC?idgroup=".$idgroup."' method='post'>
									    <input type='hidden' name='idpost' value='".$list_post[$i]->idpost."'>
										<input class='btnedit'type='button' name='btnupdatepost' value='Sửa bài viết'>
										    <div class='new_post_input'>
				                                <fieldset>
					                                <legend>
						                                Sửa bài viết
					                                </legend>
						                            <div class='area_edit'>
							                            <textarea class='edit_input' name='edit_input' rows='7'></textarea>
						                            </div>
					                                <button type='submit' class='editcomplete' name='btn_new_post_input'>Sửa</button>
					                                <input type='button' class='editcomplete' value='Hủy'>
	                                            </fieldset>
			                                </div>
									    <button type='submit' name='btndeletepost'>Xóa bài viết</button>
								    </form>
							    </div>
					        </div>
						    <div class='posting_user'>
								<div class='avata'>
								    <img src='static/".$list_post[$i]->avata."'>
                                </div>
								<div class='infor_postuser'>
									<div class='username' style='font-weight: bold'>".$list_post[$i]->name."</div>
									<div class='post_time'>".$list_post[$i]->posttime."</div>
								</div>
							</div>
							<p class='main_content_post'>".$list_post[$i]->contentpost."</p>
							<div class='function'>
								<ul>
									<li><button class='btnlike'><i class='fas fa-heart' style='color:red'></i></button></li>
									<li style='border-left: 1px solid;'>
									    <input type='hidden' value='0'>
									    <button class='btncomment' value='".$list_post[$i]->idpost."'>
										    <i class='fas fa-comments' style='color:green'></i>
										</button>
									</li>
								</ul>
							</div>
							<ul class='comment'>
								<li>
								    <div class='comment_user'>
								        <div class='avata'>
								            <img src='static/avata.jpg'>
                                        </div>
								        <div class='comment'>
									        <span class='comment_content'>Comment</span>
									        <span class='comment_time'>1 giờ</span>
								        </div>
							        </div>
									<ul class='rep_comment'>
									</ul>
									<div>
									   <input type='hidden' value='idcomment'>
									    <button class='more_rep_comment'>Xem thêm...</button>
									</div>
									<div class='enter_rep_comment' style='margin-left:25px; display:none'>
								        <input id='input_rep_comment' class='rep_cmt' type='text'
								        placeholder='Viết gì đó...'
								        style='width:80%; padding:5px; background-color:#D0D0D0; border-radius:15px; border: 2px none;'>
						            </div>
									
								</li>		
							</ul>
							<div>
							    <input type='hidden' name='idpost_ajax' value='".$list_post[$i]->idpost."'>
							    <button class='more_comment' value='0'>Xem thêm...</button>
							</div>
							<div class='enter_comment' style='display:none'>
							    <input type='hidden' name='idpost_ajax' value='".$list_post[$i]->idpost."'>
								<input type='text' class='cmt'
								placeholder='Viết gì đó...'
								style=' width:90%;padding: 5px; background-color:#D0D0D0; border-radius:15px; border: 2px none;'>
						    </div>
						</div>
                    </li>
                    ";
            
            $list_post_data = $list_post_data.$post;
        }
        return $list_post_data; 
    }

    public function chat(){
        $messenger_obj = new Messenger();
        $message = array(
            'idgroup' => $_GET['idgroup'],
            'iduser' => $_GET['iduser'],
            'content' => $_GET['content']
        );
        $messenger_obj->addMess($message);
    }

}
?>

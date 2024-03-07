<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Messages
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start messages page -->
<div class="messages-page">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="users-box">
                        <?php if(isset($users)&&!empty($users)): ?>
                        <?php $users = array_reverse($users); ?>
                        <?php foreach($users as $user): ?>
                            <div class="box_user">
                                <a href='<?=site_url("Messages/index/?user=$user->id")?>' class="btn">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="<?=base_url('images/profiles/'.$user->image);?>" class="img-thumbnail rounded-circle"/>
                                        </div>
                                        <div class="col-8 pt-3">
                                            <h6><?=$user->firstName." ".$user->lastName?></h6>
                                            <p class="para-msg">
                                                <?php
                                                    $db      = \Config\Database::connect();
                                                    $me = session("id");
                                                    $Query   = "SELECT * FROM `messages` WHERE (msgFrom = $me and msgTo = $user->id) or (msgFrom = $user->id and msgTo = $me) ORDER BY id DESC LIMIT 1";
                                                    $builder = $db->query($Query);
                                                    $lastMsg  = $builder->getResult();
                                                    // print_r($lastMsg);
                                                    // $msg = $lastMsg[0]->msgFrom == $me ?"<strong>انت</strong> : ". $lastMsg[0]->msg:$lastMsg[0]->msg;
                                                    $msg = $lastMsg[0]->msg;
                                                    if(strlen($msg)>15)
                                                    {
                                                        $msg = substr($msg,0,15)."...";
                                                    }
                                                    $msg = $lastMsg[0]->msgFrom == $me ?"<strong>انت</strong> : ". $msg:$msg;
                                                    echo $msg;
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <div class="text-center" style="padding: 30% 15%;color: #9f6aba;">
                              <p style="font-size: smaller;"> لا يوجد اي شخص تواصلت معه من قبل</p>
                              <i style="font-size:100px" class="fa-solid fa-comment-slash"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="messages-box">
                        <?php if(isset($chatUser) && !empty($chatUser)): ?>
                            <div class="header-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a style="text-decoration: none;color: #4c4747;" href="<?=site_url("Users/Profile/".$chatUser->id)?>">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img src="<?=base_url('images/profiles/'.$chatUser->image);?>" class="img-thumbnail rounded-circle"/>
                                                </div>
                                                <div class="col-8 pt-3">
                                                    <h6><?=$chatUser->userName?></h6>
                                                    <p class="is_online"><?= $chatUser->is_online ? " متصل الان":" غير متصل الان"?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="content-box">
                                <?php if(isset($messages)&&!empty($messages)):?>
                                    <?php foreach($messages as $message): ?>
                                        <div <?=$message->msgFrom == session("id") ?"style='text-align: -webkit-left;'":""?>>
                                            <div class="message-box <?=$message->msgFrom == session("id") ?"msg-from-me":""?>">
                                                <p><?=$message->msg?></p>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                <?php else:?>
                                    <p style="font-size: smaller;text-align: center;color: #ababab;"> لا توجد اي رساله حتى الان</p>
                                <?php endif;?>
                            </div>
                            <form action="<?=site_url("Messages/sendMsg")?>" id="formMsg" method="POST">
                                <div class="input-group">
                                    <input type="hidden" name="msgTo" id="msgTo" value="<?=$chatUser->id?>"/>
                                    <input type="text" style="border-width: 1px 0;" class="form-control" id="msg" name="msg" placeholder=" اكتب رساله ..." aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                    <button class="btn btn-outline-secondary" style="border-color: #d9d9d9;" type="submit" id="btn-send-msg"><i class="fa-solid fa-paper-plane"></i></button>
                                </div>
                            </form>
                        <?php else:?>
                            <div class="not_converstion text-center">
                                <img src="<?=base_url("images/undraw_team_chat_re_vbq1.svg")?>"/>
                                <h5 class="mt-3"> اهلا <span style="color:var(--second)"><?= session("username")?></span> !!</h5>
                            </div>
                        <?php endif; ?>
                    </div>
                    <script>
                        <?php if(isset($chatUser)):?>

                        $("#btn-send-msg").click(function(e){
                            "use strict";
                            // let formData = new FormData($("#formMsg"));
                            if($("#msg").val()!="")
                            {
                                e.preventDefault();
                                $.ajax({
                                type: 'POST',
                                data: {
                                msgTo: $("#msgTo").val(),
                                msg: $("#msg").val(),
                                },
                                url: '<?= site_url("Messages/sendMsg")?>',
                                    success: function(messages) {
                                        $("#msg").val("");
                                        $.ajax({
                                            type: 'GET',
                                            url: '<?= site_url("Messages/UpdateMsgSetIsRead/?user=$chatUser->id")?>',
                                                success: function(data){
                                                    console.log("success");
                                                }
                                            });
                                    }
                                });

                            }

                        });


                        var msgLength = 0,
                            compMsgLength = 0;
                        setInterval(() =>{
                                $.ajax({
                                type: 'GET',
                                url: '<?= site_url("Messages/getMessages/?user=$chatUser->id")?>',
                                    success: function(messages) {
                                        var elements = "";
                                        msgLength = messages.length;
                                        
                                            if(messages.length>0)
                                            {
                                                for (var i = 0; i < messages.length; i++) {

                                                    var styleMe = "",
                                                        classMe = "message-box";
                                                    if(messages[i].msgFrom == <?= session("id"); ?>)
                                                    {
                                                        styleMe+=" style='text-align: -webkit-left;'";
                                                        classMe+=" msg-from-me";
                                                    }
                                                    var element = " <div "+styleMe+"><div class='"+classMe+"'><p>"+messages[i].msg+"</p></div></div>";

                                                    elements+=element;

                                                }
                                                    $('.content-box').html(elements);
                                                    if(msgLength != compMsgLength)
                                                    {
                                                    $(".content-box").scrollTop($(".content-box").prop("scrollHeight"));
                                                    }
                                            }
                                            compMsgLength = messages.length;
                                        }

                                });

                                    $.ajax({
                                        type: 'GET',
                                        url: '<?= site_url("Messages/isUserChatOnline/?user=$chatUser->id")?>',
                                            success: function(data){
                                                $(".is_online").html(data);
                                            }
                                        });

                                    $.ajax({
                                        type: 'GET',
                                        url: '<?= site_url("Messages/UpdateMsgSetIsRead/?user=$chatUser->id")?>',
                                            success: function(data){
                                                console.log("success");
                                            }
                                        });

                            }, 500);

                                $.ajax({
                                type: 'GET',
                                url: '<?= site_url("Messages/UpdateMsgSetIsRead/?user=$chatUser->id")?>',
                                    success: function(data){
                                        console.log("success");
                                    }
                                });

                        <?php endif; ?>
                        // var msg="";
                        // setInterval(() =>{

                        //     $.ajax({
                        //         type: 'GET',
                        //         url: '<?= site_url("Messages/getChatUsers")?>',
                        //             success: function(users) {
                        //                 var elements = "";
                        //                 for (var i = 0; i < users.length; i++) {

                        //                     var userId   = users[i].id,
                        //                         userName = users[i].firstName+" "+users[i].lastName,
                        //                         // msg      = 1,
                        //                         hrefUrl  = "http://localhost:8080/Messages/index?user="+userId,
                        //                         imgUrl   = "http://localhost:8080/images/profiles/"+users[i].image;

                        //                         // alert(userId);
                        //                         var element ="";
                        //                         promiseJax(userId).then(function (data) {
                        //                             // alert(data);
                        //                             msg = data;
                        //                             }).catch(function (err) {
                        //                             console.error(err);
                        //                             });
                        //                         // $.ajax({
                        //                         // type: 'GET',
                        //                         // url: "http://localhost:8080/Messages/getChatUsersLastMsg/?user="+users[i].id,
                        //                         //         success: function(data) {
                        //                         //             msg = data;
                        //                         //             alert(1);
                        //                         //         }
                        //                         //     });
                        //                             element = " <div class='box_user'><a href='"+hrefUrl+"' style='width:235px' class='btn' ><div class='row'><div class='col-4'><img src='"+imgUrl+"' class='img-thumbnail rounded-circle' /></div><div class='col-8 pt-3'><h6>"+userName+"</h6><p class='para-msg'>"+msg+"</p></div></div></a></div>";
                        //                             elements+=element;

                        //                 }
                        //                     $('.users-box').html(elements);
                        //             }
                        //     });

                        // }, 500);


                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End messages page -->
<?php $this->endsection(); ?>
<?php $activePage = 'home'?>
<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->renderSection("title");?></title>
    <link rel="icon" type="image/x-icon" href="<?=base_url('images/logo.png')?>">

    <!-- Font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@600&display=swap" rel="stylesheet">
    <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>
    <div class="myNavbar">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
            <a class="navbar-brand" href="<?=site_url('/')?>">
                <img src="<?= base_url("images/baynahoma-little-white.png") ?>"/>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="تبديل التنقل">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mx-auto mb-2 mb-md-0">
                    <li class="nav-item me-2">
                        <a class="nav-link <?php if($activePage == 'home') echo 'active' ?>" aria-current="page" href="<?=site_url('/')?>"><i class="fa fa-home"></i> الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2 <?php if($activePage == 'about') echo 'active' ?>" href="<?=site_url('About')?>">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($activePage == 'contact') echo 'active' ?>" href="<?=site_url('Contact')?>">للتواصل معنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($activePage == 'search') echo 'active' ?>" href="<?=site_url('Search')?>"><i class="fa fa-search"></i> البحث</a>
                    </li>
                </ul>
                <?php if(session()->has("logged")): ?>
                    <ul class="navbar-nav list-drop-user">
                    <?php if(session("admin")): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-gamepad"></i> تحكم
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?=site_url('Admin/users')?>"> <i class="fa-solid fa-users"></i>  المستخدمين</a></li>
                                <li><a class="dropdown-item" href="<?=site_url('Admin/suspended')?>"> <i class="fa-solid fa-users-slash"></i>  الموقوفين</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user"></i> <?= session("username"); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarDarkDropdownMenuLink">
                                <?php if(!session("admin")): ?>
                                <li><a class="dropdown-item" href="<?=site_url('Users/myProfile')?>"> <i class="fa-regular fa-id-card"></i> حسابي</a></li>
                                <li><a class="dropdown-item" href="<?=site_url('Users/editForm')?>"> <i class="fa-solid fa-receipt"></i>  معلوماتي الشخصيه</a></li>
                                <li class="position-relative"><a class="dropdown-item" href="<?=site_url('messages')?>"> <i class="fa-solid fa-message"></i>    <span style="top: 15px !important;left: 23px;" class="d-none position-absolute top-0 unread-messages translate-middle badge rounded-pill bg-danger">99+<span class="visually-hidden">unread messages</span></span>الرسائل</a></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="<?=site_url('Users/editPswForm')?>"> <i class="fa-solid fa-lock"></i>   تغيير كلمه السر</a></li>
                                <hr/>
                                <li><a class="dropdown-item" href="<?=site_url('Login/logOut')?>"> <i class="fa-solid fa-power-off"></i> تسجيل الخروج</a></li>
                                <script>
                                        setInterval(() =>{
                                            $.ajax({
                                                type: 'GET',
                                                url: '<?= site_url("Messages/getCountNotRead")?>',
                                                    success: function(data){
                                                        // alert(typeof(data));
                                                        if(data>0)
                                                        {
                                                            $(".unread-messages").html(data);
                                                            $(".unread-messages").removeClass("d-none");
                                                        }
                                                        else
                                                        {
                                                            if(!$(".unread-messages").hasClass("d-none"))
                                                            {
                                                                $(".unread-messages").addClass("d-none");
                                                            }
                                                        }
                                                    }
                                                });

                                        }, 2000);
                                </script>
                            </ul>
                        </li>
                    </ul>
                <?php else: ?>
                <ul class="navbar-nav ml-auto mb-2 mb-md-0">
                    <li class="nav-item me-2 mb-2">
                        <a class="btn btn-outline-light" href="<?=site_url('Login')?>">تسجيل الدخول</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-light" href="<?=site_url('Register')?>">اشتراك</a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
            </div>
        </nav>
    </div>
    <div class="space-up"></div>
    <?php
        if(session()->has("success"))
        {
        ?>
            <div style="z-index: 99;" class="alert alert-success alert-dismissible fade show" role="alert">
             <?= session("success"); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        if(session()->has("error"))
        {
        ?>
            <div style="z-index: 99;" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?= session("error"); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } 
        if(session()->has("info"))
        {
        ?>
            <div style="z-index: 99;" class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> ملاحظه!</strong> <?= session("info"); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } 
    ?>
    <?php $this->renderSection("content");?>
    <footer>
        <svg xmlns="http://www.w3.org/2000/svg" style="height: 101%;" class="position-absolute" viewBox="0 0 1440 320">
        <path fill="#6A69CF" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,80C640,85,800,107,960,101.3C1120,96,1280,64,1360,48L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        </svg>
        <svg class="position-absolute" style="height: 101%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#B06AB3" fill-opacity="0.6" d="M0,0L40,16C80,32,160,64,240,106.7C320,149,400,203,480,197.3C560,192,640,128,720,128C800,128,880,192,960,229.3C1040,267,1120,277,1200,256C1280,235,1360,181,1400,154.7L1440,128L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="img-logo-footer" src="<?=base_url('images/white-logo.png')?>"/>
                    <h6 class="title-under-logo" style="position: absolute;top: 70%;color: #FFF;">إبحث عن شريك العمر</h6>
                </div>
                <div class="col-md-4">
                    <div class="box ftr_box_fastSearch" style="right: 44%;">
                        <h3>البحث السريع</h3>
                        <ul class="list-unstyled">
                            <li><a href="<?=site_url('Search/result?gender=f')?>" class="btn"><i class="fa-solid fa-angles-left"></i> ابحث عن الاناث </a></li>
                            <li><a href="<?=site_url('Search/result?gender=m')?>" class="btn"><i class="fa-solid fa-angles-left"></i> البحث عن الذكور</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box ftr_box_contact" style="right: 75%;">
                        <h3>للتواصل معنا</h3>
                        <ul class="list-unstyled d-flex social-media-list">
                            <li><a href="#" class="btn"><i class="fa-brands fa-facebook"></i></a></li>
                            <li><a href="#" class="btn"><i class="fa-brands fa-instagram"></i></a></li>
                            <li><a href="#" class="btn"><i class="fa-brands fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>جميع حقوق النشر محفوظة  لموقعنا &copy; <span class="year"><?=date("Y")?></span></p>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?=base_url('assets/js/main.js')?>"></script>
  </body>
</html>
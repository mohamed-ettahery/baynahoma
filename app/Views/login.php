<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Login
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start Login page -->
<div class="login-page">
    <div class="container">
        <div class="form-content mx-auto">
        <h2> الدخول لحسابي</h2>
        <?php
            echo form_open('Login/auth',["class"=>"form-login","id"=>"form-login"]);
                $data = [
                    'type' => 'text',
                    'name' => 'userName',
                    'id' => 'username',
                    'class' => 'form-control mb-2',
                    'placeholder' => 'اسم المستخدم"',
                    'value' => old('userName')
                ];
                echo form_input($data);
                $data = [
                    'type' => 'password',
                    'name' => 'password',
                    'id' => 'psw',
                    'class' => 'form-control mb-2',
                    'placeholder' => 'كلمه السر"',
                    'value' => old('password')
                ];
                echo form_input($data);


                $data = [
                    'type' => 'submit',
                    'name' => 'submit',
                    'id' => 'btn-login',
                    'value' => ' تسجيل الدخول',
                    'class' => 'btn mt-2',
                ];
                echo form_submit($data);
     
              echo form_close(); 
        ?>
        <a class="btn" href="<?=site_url('Recovery/index')?>" style="color: #6a69cf;">إسترجاع كلمة السر ؟</a>
        <a class="btn" href="<?=site_url('Register')?>" style="color: #6a69cf;position: absolute;left: 18px;"> انشاء حساب</a>
        </div>
        <script>
            $("#btn-login").click(function(e){
                "use strict";
                e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            data: {
                                userName: $("#username").val(),
                                password: $("#psw").val(),
                            },
                            url: '<?= site_url("Login/auth")?>',
                                success: function(result) {
                                    switch(result)
                                    {
                                        case "failed":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'ربما هناك خطا في كلمه السر او اسم المستخدم, حاول من جديد !',
                                                    footer: '<a href="<?=site_url('Recovery/index')?>"> نسيت كلمه السر !</a>'
                                                    })
                                            break;
                                        case "suspended":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'لا يمكنك فتح هذا الحساب لانه موقوف حاليا !',
                                                    footer: '<a href="<?=site_url('Recovery/index')?>"> تواصل معنا !</a>'
                                                    })
                                            break;
                                        case "admin":
                                             window.open("<?=site_url('admin/users')?>","_self");
                                            break;
                                        case "connect":
                                            window.open("<?=site_url('Home')?>","_self");
                                            break;
                                    }
                                }
                            });
            });
        </script>
    </div>
</div>
<!-- End Login page -->
<?php $this->endsection(); ?>
<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 New Password
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start recovery page -->
<div class="recovery-page">
    <div class="container">
        <div class="form-content mx-auto">
        <h2>تغيير كلمه السر</h2>
        <?php
            echo form_open('Recovery/updatePassword',["class"=>"form-login"]);
                $data = [
                    'type' => 'password',
                    'name' => 'new_psw',
                    'id' => 'new_psw',
                    'class' => 'form-control mb-2',
                    'placeholder' => 'كلمه السر الجديده',
                ];
                echo form_input($data);
                $data = [
                    'type' => 'password',
                    'name' => 'conf_new_psw',
                    'id' => 'conf_new_psw',
                    'class' => 'form-control mb-2',
                    'placeholder' => 'تاكيد كلمه السر الجديده',
                ];
                echo form_input($data);
                $data = [
                    'type' => 'submit',
                    'name' => 'submit',
                    'id' => 'btn-login',
                    'value' => 'تاكيد ',
                    'class' => 'btn mt-2',
                ];
                echo form_submit($data);
     
              echo form_close(); 
        ?>
        </div>
        <script>
            $("#btn-login").click(function(e){
                "use strict";
                e.preventDefault();
                        $.ajax({
                            type: 'POST',
                            data: {
                                new_psw: $("#new_psw").val(),
                                conf_new_psw: $("#conf_new_psw").val(),
                            },
                            url: '<?= site_url("Recovery/updatePassword")?>',
                                success: function(result) {
                                    switch(result)
                                    {
                                        case "not_enough":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'يجب ان تحتوي كلمه السر على الاقل 6 احرف !',
                                                    })
                                            break;
                                        case "not_match":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: ' الحقلين غير متطابقين !',
                                                    })
                                            break;
                                        case "success":
                                                    Swal.fire({
                                                    icon: 'success',
                                                    title: 'Success',
                                                    text: 'تم تغيير كلمه السر بنجاح !',
                                                    confirmButtonText: " تسجيل الدخول الان !"
                                                    }).then((result) => {
                                                    window.open("<?=site_url('Login')?>","_self");
                                                })
                                                
                                            break;
                                    }
                                }
                            });
            });
        </script>
    </div>
</div>
<!-- End recovery page -->
<?php $this->endsection(); ?>
<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Paasword recovery
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start recovery page -->
<div class="recovery-page">
    <div class="container">
        <div class="form-content mx-auto">
        <h2>استرجاع كلمه السر</h2>
        <?php
            echo form_open('Recovery/sendVerificationCode',["class"=>"form-login"]);
                $data = [
                    'type' => 'email',
                    'name' => 'email',
                    'id' => 'email',
                    'class' => 'form-control mb-2',
                    'placeholder' => 'بريدك الالكتروني',
                    'value' => set_value('email')
                ];
                echo form_input($data);
                ?>
                <span class="text-danger">
                <?= (isset($validation) && $validation->hasError('email')) ? $validation->getError('email') : "" ?>
                </span>
                <?php
                $data = [
                    'type' => 'submit',
                    'name' => 'submit',
                    'id' => 'btn-login',
                    'value' => 'ارسال',
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
                                email: $("#email").val(),
                            },
                            url: '<?= site_url("Recovery/sendVerificationCode")?>',
                                success: function(result) {
                                    switch(result)
                                    {
                                        case "email_not_valid":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: ' يجب عليك ان تدخل بريدا الكترونيا صحيحا !',
                                                    })
                                            break;
                                        case "not_found":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'البريد الالكتروني الذي ادخلته غير مسجل في موقعنا !',
                                                    })
                                            break;
                                        case "email_not_sent":
                                            Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'فشل ارسال الرمز حاول من جديد !',
                                                    })
                                            break;
                                        case "code_sent":
                                                Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'تم',
                                                text: 'تم ارسال الرمز الى بريدك الالكتروني بنجاح !',
                                                showConfirmButton: false,
                                                timer: 1500
                                                }).then((result) => {
                                                    window.open("<?=site_url('Account/check_code')?>","_self");
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
<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Verification
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start recovery page -->
<div class="recovery-page">
    <?php
    if(isset($success)&& !empty($success))
    {
    ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $success ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>
    <div class="container">
        <div class="form-content mx-auto">
        <h2> تاكيد الرمز</h2>
        <?php
            echo form_open('Recovery/newPassword',["class"=>"form-login"]);
                $data = [
                    'type' => 'text',
                    'name' => 'code',
                    'id' => 'code',
                    'class' => 'form-control mb-2',
                    'maxLength' => '6',
                    'minLength' => '6',
                    'placeholder' => 'الرمز',
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
                                code: $("#code").val(),
                            },
                            url: '<?= site_url("Recovery/newPassword")?>',
                                success: function(result) {
                                    switch(result)
                                    {
                                        case "empty_code":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'يجب عليك ادخال الرمز الذي توصلت به !',
                                                    })
                                            break;
                                        case "not_valid":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'الرمز الذي ادخلته غير صحيح !',
                                                    })
                                            break;
                                        case "valid":
                                                Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'الرمز الصحيح !',
                                                showConfirmButton: false,
                                                timer: 1500
                                                }).then((result) => {
                                                    window.open("<?=site_url('Recovery/new_password_form')?>","_self");

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
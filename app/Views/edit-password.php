<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Edit Password
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start Edit Password page -->
<div class="edit-psw-page p-5">
    <div class="container">
        <div class="box mx-auto">
            <div class="card" width="450px">
                <div class="card-header text-center">
                تعديل الرمز السري
                </div>
                <div class="card-body">
                    <!-- <h5 class="card-title">Special title treatment</h5> -->
                        <?php
                            echo form_open_multipart('Users/updatePassword');
                                    echo form_label(' الرمز السري الحالي');
                                    $data = [
                                        'type' => 'password',
                                        'name' => 'old_psw',
                                        'class' => 'form-control mb-2',
                                        'placeholder' => 'الرمز السري الحالي',
                                        'value' => old('old_psw')
                                    ];
                                    echo form_input($data);
                                    echo form_label('الرمز السري الجديد');
                                    $data = [
                                        'type' => 'password',
                                        'name' => 'new_psw',
                                        'class' => 'form-control mb-2',
                                        'placeholder' => 'الرمز السري الحالي',
                                        'value' => old('new_psw')
                                    ];
                                    echo form_input($data);
                                    echo form_label('تاكيد الرمز السري الجديد');
                                    $data = [
                                        'type' => 'password',
                                        'name' => 'conf_new_psw',
                                        'class' => 'form-control mb-2',
                                        'placeholder' => 'تاكيد الرمز السري الجديد',
                                        'value' => old('conf_new_psw')
                                    ];
                                    echo form_input($data);
                                    $data = [
                                        'type' => 'submit',
                                        'name' => 'submit',
                                        'value' => 'تعديل ',
                                        'class' => 'btn btn-edit mt-4',
                                    ];
                                    ?>
                                    <div class="text-center">
                                        <?php echo form_submit($data); ?>
                                    </div>
                                    <?php

                            echo form_close();

                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Password page -->
<?php $this->endsection(); ?>
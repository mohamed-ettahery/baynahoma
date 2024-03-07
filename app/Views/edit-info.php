<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Edit Info
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start Edit page -->
<div class="edit-page p-3">
    <div class="container">
        <?php
            if(session()->has("errors"))
            {
                foreach(session("errors") as $error)
                {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                }
            } 
        ?>
        <div class="card">
            <div class="card-header text-center">
            تعديل المعلومات الشخصيه
            </div>
            <div class="card-body">
                    <?php
                        echo form_open_multipart('Users/update',["id"=>"form-edit"]);
                                echo form_label('الاسم الشخصي');
                                $data = [
                                    'type' => 'text',
                                    'name' => 'firstName',
                                    'id' => 'firstName',
                                    'class' => 'form-control mb-2',
                                    'placeholder' => 'الاسم الشخصي',
                                    'value' => old('firstName',$user->firstName)
                                ];
                                echo form_input($data);
                                echo form_label(' الاسم العائلي');
                                $data = [
                                    'type' => 'text',
                                    'name' => 'lastName',
                                    'id' => 'lastName',
                                    'class' => 'form-control mb-2',
                                    'placeholder' => 'الاسم العائلي',
                                    'value' => old('lastName',$user->lastName)
                                ];
                                echo form_input($data);
                                echo form_label('تاريخ الازدياد');
                                $data = [
                                    'type' => 'date',
                                    'name' => 'birthday',
                                    'id' => 'birthday',
                                    'class' => 'form-control mb-2',
                                    'value' => old('birthday',$user->birthday)
                                ];
                                echo form_input($data);
                                echo form_label('البلد ');
                                $data = [
                                    'type' => 'text',
                                    'name' => 'country',
                                    'id' => 'country',
                                    'class' => 'form-control mb-2',
                                    'placeholder' => 'البلد',
                                    'value' => old('country',$user->country)
                                ];
                                echo form_input($data);
                                echo form_label('المدينه ');
                                $data = [
                                    'type' => 'text',
                                    'name' => 'city',
                                    'id' => 'city',
                                    'class' => 'form-control mb-2',
                                    'placeholder' => 'المدينه',
                                    'value' => old('city',$user->city)
                                ];
                                echo form_input($data);
                                echo form_label('الهاتف ');
                                $data = [
                                    'type' => 'tel',
                                    'name' => 'phone',
                                    'id' => 'phone',
                                    'class' => 'form-control mb-2',
                                    'placeholder' => 'الهاتف',
                                    'value' => old('phone',$user->phone)
                                ];
                                echo form_input($data);
                                echo form_label(' البريد الالكتروني');
                                $data = [
                                    'type' => 'email',
                                    'name' => 'email',
                                    'id' => 'email',
                                    'class' => 'form-control mb-2',
                                    'placeholder' => 'البريد الالكتروني',
                                    'value' => old('email',$user->email)
                                ];
                                echo form_input($data);
                                echo form_label(' تحدث عن نفسك في معلومات اضافيه ');
                                $data = [
                                    'type' => 'text',
                                    'name' => 'about',
                                    'id' => 'about',
                                    'class' => 'form-control',
                                    'placeholder' => 'تحدث عن نفسك',
                                    'value' => old('about',$user->about)
                                ];
                                echo form_textarea($data);
                                echo form_label('الصوره الشخصيه');

                                $data = [
                                    'type' => 'file',
                                    'name' => 'image',
                                    'id' => 'image',
                                    'class' => 'form-control mb-2 d-none',
                                    "id"    => 'image-input-file',
                                    'accept'=> 'image/png, image/jpeg, image/jpg'
                                ];
                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="<?= site_url('images/profiles/'.$user->image) ?>" class="card-img-top img-edit-profile" id="img-file" alt="<?=$user->image?>" style="width: 240px;height: 240px;">
                                         <div class="change-image">تغيير الصوره <i class="fa-solid fa-arrows-rotate"></i></div>
                                        <?php 
                                          echo form_input($data);
                                          echo form_input(["type"=>"hidden","value"=>$user->image,"name"=>"hidden_image_name"]);
                                         ?>
                                    </div>
                                </div>
                                <?php
                                $data = [
                                    'type' => 'submit',
                                    'name' => 'submit',
                                    'id' => 'btn-edit',
                                    'value' => ' تاكيد التعديلات ',
                                    'class' => 'btn btn-edit mt-4',
                                ];
                                echo form_submit($data);

                        echo form_close();

                    ?>
            </div>
        <script>

            $("#form-edit").submit(function(e) {
                e.preventDefault();    
                var formData = new FormData(this);

                $.ajax({
                    url:'<?= site_url("Users/update")?>',
                    type: 'POST',
                    data: formData,
                    success: function (data) {
                        if(typeof(data)=="object")
                        {
                            var errors = "";
                            for (const key in data) {

                                errors+= data[key] + " - \n";
                                // console.log(`${key}: ${data[key]}`);
                            }
                            Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: errors,
                            })
                            console.log(errors);
                        }
                        else
                        {
                            switch(data)
                                    {
                                        case "nothing_changed":
                                                    Swal.fire({
                                                    icon: 'info',
                                                    title: ' ملاحظه.',
                                                    text: 'لم تغير اي معلومه!',
                                                    })
                                            break;
                                        case "extension":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'امتداد الصوره غير موافق!',
                                                    })
                                            break;
                                        case "size":
                                                    Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'حجم الصوره لا يجب ان يتعدى 2 ميغا بايت!',
                                                    })
                                            break;
                                        case "save":
                                                Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: 'تم تعديل المعلومات بنجاح !',
                                                showConfirmButton: false,
                                                timer: 1500
                                                })
                                            break;
                                    }
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        </script>
        </div>
    </div>
</div>
<!-- End Edit page -->
<?php $this->endsection(); ?>
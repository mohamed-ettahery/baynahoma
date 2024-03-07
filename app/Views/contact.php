<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Contact
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start contact page -->
<div class="contact-page">
    <div class="container">
        <div class="box">
            <h2 class="mb-5">للتواصل معنا</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="<?=base_url('images/undraw_personal_text_re_vqj3.svg')?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="<?=site_url("Contact/send")?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">الاسم</label>
                                <input type="text" class="form-control" placeholder="اسمك" name="name" value="<?=set_value('name')?>" aria-describedby="passwordHelpBlock">
                                <span class="text-danger">
                                <?= (isset($validation) && $validation->hasError('name')) ? $validation->getError('name') : "" ?>
                                </span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">البريد الالكتروني</label>
                                <input type="email" class="form-control" placeholder="بريدك الالكتروني" value="<?=set_value('email')?>" name="email" aria-describedby="passwordHelpBlock">
                                <span class="text-danger">
                                <?= (isset($validation) && $validation->hasError('email')) ? $validation->getError('email') : "" ?>
                                </span>
                            </div>
                            <div class="col-md-12 mb-3 mt-3">
                                <label class="form-label" placeholder="الرساله التي تريد ارسالها" >الرساله</label>
                                <textarea class="form-control" name="message"><?=set_value('message')?></textarea>
                                <span class="text-danger">
                                <?= (isset($validation) && $validation->hasError('message')) ? $validation->getError('message') : "" ?>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa-sharp fa-solid fa-paper-plane"></i> ارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End contact page -->
<?php $this->endsection(); ?>
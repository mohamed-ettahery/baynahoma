<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
  Profile
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start Profile page -->
<div class="profile-page p-3">
    <div class="box mx-auto">
        <div class="cover-box">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#6469D1" fill-opacity="1" d="M0,256L80,256C160,256,320,256,480,256C640,256,800,256,960,229.3C1120,203,1280,149,1360,122.7L1440,96L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
            </svg>
            <img src="<?=base_url('images/bubbles.png')?>" class="img-bubbles"/>
            <img src="<?=base_url('images/profiles/'.$user->image)?>" class="img-profile rounded-circle"/>

            <img src="<?=$user->is_online?base_url('images/ON.png'):base_url('images/OFF.png')?>" class="statusImg"/>
            <h3 class="name"><?=esc($user->firstName)." ".esc($user->lastName)?></h3>
        </div>
        <div style="margin: 28px 55px 0;">
            <a class="btn btn-success" href="<?=site_url("Messages/index/?user=$user->id")?>">
              <i class="fa-solid fa-message"></i>  إرسال رسالة 
            </a>
        </div>
        <div class="info-box p-5 mt-3">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><i class="text-primary me-2 fa-solid fa-hashtag"></i> العمر <?=date_diff(date_create($user->birthday), date_create(date("Y-m-d")))->format('%y')?> سنة</li>
                        <li><i class="text-primary me-2 fa-solid fa-venus-mars"></i>  <?php if($user->gender == 'm'){echo "ذكر ";} else{ echo "انثى"; };?></li>
                        <li><i class="text-primary me-2 fa-solid fa-flag"></i> <?=$user->country?> </li>
                        <?php if(!empty($user->city)):?><li><i class="text-primary me-2 fa-solid fa-location-dot"></i> <?=$user->city?> </li><?php endif; ?>
                        <li><i class="text-primary me-2 fa-solid fa-calendar-days"></i> تم إنشاء الحساب في التاريخ <?=date("Y-m-d",strtotime($user->created_at))?></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><i class="text-primary me-2 fa-solid fa-cake-candles"></i> <?=esc($user->birthday)?></li>
                        <li><i class="text-primary me-2 fa-solid fa-phone"></i> <a class="text-dark" href="tel:089371294"><?=esc($user->phone) ?></a></li>
                        <li><i class="text-primary me-2 fa-solid fa-envelope"></i> <a class="text-dark" href="mailto:test@gmail.com"><?=esc($user->email)?></a></li>
                    </ul>
                    <div class="about-box">
                        <h5 class="title">معلومات أكثر عن <?=$user->firstName." ".$user->lastName  ?></h5>
                        <?php if(!empty($user->about)): ?>
                          <p class="about-paragraph"><?=esc($user->about)?></p>
                        <?php else:?>
                          <p class="empty-about"> لم يضيف اي معلومات اضافيه حتى الان</p>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End  Profile page -->
<?php $this->endsection(); ?>
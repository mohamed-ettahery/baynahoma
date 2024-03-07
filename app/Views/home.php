<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Home
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start Front page -->
<div class="home-content">
    <div class="front-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="front-box">
                        <h1 class="mb-4">بينهما مودة ورحمة</h1>
                        <p>بينهما هو موقع زواج وتعارف يجمع خبراء في العلاقات الزوجية و مهندسين وضعوا في خدمتكم آلية تعارف وتوافق حديثة بما يتناسب مع المكونات الاجتماعية والثقافية في الوطن العربي.</p>
                    </div>
                 </div>
                 <div class="col-md-6 p-3">
                    <img class="img-cvr" src="<?=base_url('images/undraw_wedding_re_66hj.svg')?>"/>
                    <a href="#search-section" class="mouse">
                      <span class="mouse-icon">
                        <span class="mouse-wheel"></span>
                      </span>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFF" fill-opacity="1" d="M0,160L60,181.3C120,203,240,245,360,256C480,267,600,245,720,218.7C840,192,960,160,1080,160C1200,160,1320,192,1380,208L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <div id="search-section" class="search-section p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="<?=base_url("images/undraw_location_search_re_ttoj.svg")?>"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-content mx-auto">
                        <form action="<?=site_url('Search/result')?>" class="search-peaople-form">
                            <div class="row">
                                <div class="col-12">
                                  <h3 class="mb-4">إبحث عن شريك عمرك</h3>
                                </div>
                                <div class="col-12">
                                  <h6 class="mb-2">عن ماذا تبحث ؟</h6>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="m" name="gender" id="sexeRadio1">
                                        <label class="form-check-label" for="sexeRadio1">ذكر</label>
                                    </div>
                                </div>
                                <div class="col-6 mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="f" name="gender" id="sexeRadio2">
                                        <label class="form-check-label" for="sexeRadio2">أنثى</label>
                                    </div>
                                </div>
                                <hr/>
                                <div class="col-12">
                                  <h6 class="mb-2">العمر بين</h6>
                                </div>
                                <div class="col-12 p-3 mb-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <select class="form-select select-age" name="min-age" aria-label="Default select example">
                                              <option value="0"> الكل</option>
                                            </select>
                                        </div>
                                        <div class="col-4 text-center">و</div>
                                        <div class="col-4">
                                            <select class="form-select select-age" name="max-age" aria-label="Default select example">
                                              <option value="0"> الكل</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" name="submit" class="btn">إبحث الأن</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="random-people p-4 mt-4">
        <div class="container">
            <h2 class="mb-4"> بعض الاشخاص</h2>
                <div id="carouselExampleControls" class="carousel carousel-dark slide text-center" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="content">
                                <div class="row">
                                    <?php foreach($users1 as $user):?>
                                        <div class="col-md-6 col-lg-3">
                                            <a href="<?=site_url('Users/Profile/'.$user->id)?>" class="btn">
                                                <div class="card text-center p-3" style="width: 17rem;">
                                                    <img src="<?=base_url("images/profiles/".$user->image)?>" class="mx-auto card-img-top img-thumbnail rounded-circle" alt="...">
                                                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="#8A3FFC" d="M35.6,-44.1C50.1,-38.5,68.5,-33.4,78,-21.3C87.5,-9.3,87.9,9.7,81,24.8C74.1,39.9,59.7,51.1,44.9,59.1C30.2,67.1,15.1,71.8,1,70.4C-13,68.9,-26.1,61.4,-38.1,52.5C-50.1,43.7,-61,33.5,-66.9,20.5C-72.8,7.5,-73.5,-8.3,-66.6,-19.2C-59.7,-30.1,-45.1,-36,-32.7,-42.2C-20.3,-48.5,-10.1,-55.1,0.2,-55.4C10.6,-55.7,21.2,-49.7,35.6,-44.1Z" transform="translate(100 100)" />
                                                    </svg>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center mb-3" <?php if(strlen($user->firstName." ".$user->lastName)>14) echo "style='width: 120%;'"?> ><?=$user->firstName." ".$user->lastName?></h5>
                                                        <div class="row mb-3">
                                                            <div class="col-6 fs-5"><i class="fa-solid fa-<?php echo $user->gender == 'm' ? 'mars' :'venus' ?>" style="color: var(--<?php echo $user->gender == 'm' ? 'primary' :'second' ?>);"></i> <?php echo $user->gender == "m" ? "ذكر" :"أنثى" ?></div>
                                                            <div dir="rtl" class="col-6 fs-5"><?php echo date("Y")-intval(strtok($user->birthday, "-"))?> سنه</div>
                                                        </div>
                                                        <div class="fs-5 text-center"> من <?=$user->country?></div>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="content">
                                <div class="row">
                                <?php foreach($users2 as $user):?>
                                        <div class="col-md-6 col-lg-3">
                                            <a href="<?=site_url('Users/Profile/'.$user->id)?>" class="btn">
                                                <div class="card text-center p-3" style="width: 17rem;">
                                                    <img src="<?=base_url("images/profiles/".$user->image)?>" class="mx-auto card-img-top img-thumbnail rounded-circle" alt="...">
                                                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="#8A3FFC" d="M35.6,-44.1C50.1,-38.5,68.5,-33.4,78,-21.3C87.5,-9.3,87.9,9.7,81,24.8C74.1,39.9,59.7,51.1,44.9,59.1C30.2,67.1,15.1,71.8,1,70.4C-13,68.9,-26.1,61.4,-38.1,52.5C-50.1,43.7,-61,33.5,-66.9,20.5C-72.8,7.5,-73.5,-8.3,-66.6,-19.2C-59.7,-30.1,-45.1,-36,-32.7,-42.2C-20.3,-48.5,-10.1,-55.1,0.2,-55.4C10.6,-55.7,21.2,-49.7,35.6,-44.1Z" transform="translate(100 100)" />
                                                    </svg>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center mb-3" <?php if(strlen($user->firstName." ".$user->lastName)>14) echo "style='width: 120%;'"?>><?=$user->firstName." ".$user->lastName?></h5>
                                                        <div class="row mb-3">
                                                            <div class="col-6 fs-5"><i class="fa-solid fa-<?php echo $user->gender == 'm' ? 'mars' :'venus' ?>" style="color: var(--<?php echo $user->gender == 'm' ? 'primary' :'second' ?>);"></i> <?php echo $user->gender == "m" ? "ذكر" :"أنثى" ?></div>
                                                            <div dir="rtl" class="col-6 fs-5"><?php echo date("Y")-intval(strtok($user->birthday, "-"))?> سنه</div>
                                                        </div>
                                                        <div class="fs-5 text-center"> من <?=$user->country?></div>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="content">
                                <div class="row">
                                <?php foreach($users3 as $user):?>
                                        <div class="col-md-6 col-lg-3">
                                            <a href="<?=site_url('Users/Profile/'.$user->id)?>" class="btn">
                                                <div class="card text-center p-3" style="width: 17rem;">
                                                    <img src="<?=base_url("images/profiles/".$user->image)?>" class="mx-auto card-img-top img-thumbnail rounded-circle" alt="...">
                                                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill="#8A3FFC" d="M35.6,-44.1C50.1,-38.5,68.5,-33.4,78,-21.3C87.5,-9.3,87.9,9.7,81,24.8C74.1,39.9,59.7,51.1,44.9,59.1C30.2,67.1,15.1,71.8,1,70.4C-13,68.9,-26.1,61.4,-38.1,52.5C-50.1,43.7,-61,33.5,-66.9,20.5C-72.8,7.5,-73.5,-8.3,-66.6,-19.2C-59.7,-30.1,-45.1,-36,-32.7,-42.2C-20.3,-48.5,-10.1,-55.1,0.2,-55.4C10.6,-55.7,21.2,-49.7,35.6,-44.1Z" transform="translate(100 100)" />
                                                    </svg>
                                                    <div class="card-body">
                                                        <h5 class="card-title text-center mb-3" <?php if(strlen($user->firstName." ".$user->lastName)>14) echo "style='width: 120%;'"?>><?=$user->firstName." ".$user->lastName?></h5>
                                                        <div class="row mb-3">
                                                            <div class="col-6 fs-5"><i class="fa-solid fa-<?php echo $user->gender == 'm' ? 'mars' :'venus' ?>" style="color: var(--<?php echo $user->gender == 'm' ? 'primary' :'second' ?>);"></i> <?php echo $user->gender == "m" ? "ذكر" :"أنثى" ?></div>
                                                            <div dir="rtl" class="col-6 fs-5"><?php echo date("Y")-intval(strtok($user->birthday, "-"))?> سنه</div>
                                                        </div>
                                                        <div class="fs-5 text-center"> من <?=$user->country?></div>
                                                        <p></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
        </div>
    </div>
 </div>
<!-- End Front page -->
<?php $this->endsection(); ?>
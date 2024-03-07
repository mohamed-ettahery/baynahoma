<?php $this->extend("layouts/master");?>
<?php $this->section("title"); ?>
 Admin - Users
<?php $this->endsection(); ?>
<?php $this->section("content"); ?>
<!-- Start Users page -->
<div class="users-page">
    <img style="position: absolute;top: 16px;width: 29%;height: 167px;right: 0;" src="<?=base_url('images/purple-blue-wave-gradient.png')?>"/>
    <div class="container">
       <div class="content">
        <div class="card">
            <h3 class="card-header">المستخدمين</h3>
            <div class="card-body">
                <h5 class="card-title" style="font-size: small;">هنا يظهر جميع المستخدمين  سواء الناشطين او الموقوفين</h5>
                <hr/>
                <div class="table-box table-responsive-sm">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">الصوره</th>
                                <th scope="col">اسم الشخصي </th>
                                <th scope="col">اسم عائلي </th>
                                <th scope="col">الجنس</th>
                                <th scope="col">العمر</th>
                                <th scope="col">تاريخ الانضمام</th>
                                <th scope="col">الحاله</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td scope="row"><strong><?=$user->id?></strong></td>
                                <th><img class="img-thumbnail rounded-circle" style="width: 65px;" src="<?=base_url('images/profiles/'.$user->image)?>"/></th>
                                <td><?=$user->firstName?></td>
                                <td><?=$user->lastName?></td>
                                <td><?=$user->gender=="m"?"ذكر":"أنثى";?></td>
                                <td><?=date_diff(date_create($user->birthday), date_create(date("Y-m-d")))->format('%y')?> سنة</td>
                                <td><?=$user->created_at?></td>
                                <td><?=$user->is_active?'<span class="badge rounded-pill bg-success">نشط</span>':'<span class="badge rounded-pill bg-danger">موقوف</span>';?></td>
                                <td style="padding-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-4 mb-1">
                                            <a class="btn btn-danger delete-user" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف" style="width: 100%;" href="<?=site_url('Admin/deleteUser/'.$user->id)?>"><i class="fa-solid fa-trash-can"></i></a>
                                        </div>
                                        <div class="col-md-4 mb-1">
                                            <?php if($user->is_active): ?>
                                              <a class="btn btn-warning suspend-user text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="ايقاف" style="width: 100%;" href="<?=site_url('Admin/suspendUser/'.$user->id)?>"><i class="fa-solid fa-triangle-exclamation"></i></a>
                                            <?php else: ?>
                                              <a class="btn btn-success active-user" data-bs-toggle="tooltip" data-bs-placement="top" title="تنشيط" style="width: 100%;" href="<?=site_url('Admin/activeUser/'.$user->id)?>"><i class="fa-solid fa-circle-check"></i></a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="الملف الشخصي" style="width: 100%;" href="<?=site_url('Users/profile/'.$user->id)?>"><i class="fa-solid fa-eye"></i></a>
                                        </div>
                                    </div
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                      <?= $pager->links() ?>
                    </div>
                </div>
            </div>
        </div>
       </div>
    </div>
</div>
<!-- End Users page -->
<?php $this->endsection(); ?>
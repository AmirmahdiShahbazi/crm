<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php $sql = 'SELECT * FROM `experts`';
$stmt = $conn->prepare($sql);
$experts = $stmt->execute()->fetchAllAssociative(); ?>

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>کارت های کاربر</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">کارشناسان</li>
                    <li class="breadcrumb-item active">کارت های کاربر</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid user-card">
    <div class="row">
        <?php foreach ($experts as $expert) : ?>
            <div class="col-md-6 col-lg-6 col-xl-4 box-col-4">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/1.jpg" alt=""></div>
                    <div class="card-profile"><img class="rounded-circle" src="https://static.vecteezy.com/system/resources/previews/026/306/746/non_2x/man-head-silhouette-icon-person-user-social-account-profile-character-avatar-black-white-sign-symbol-illustration-artwork-graphic-clipart-eps-vector.jpg" alt=""></div>
                    <div class="text-center profile-details"><a href="./../../experts/show.php?id=<?php echo $expert['id']?>">
                            <h4><?php echo $expert['name'] ?></h4>
                        </a>
                        <h6><?php $expert['is_admin'] ? 'مدیر' : 'کارشناس' ?></h6>
                    </div>

                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>ملک ها</h6>
                            <h3 class="counter"><?php $sql = 'SELECT * FROM `expert_property` WHERE expert_id = ' . $expert['id'];
                                                $stmt = $conn->prepare($sql);
                                                $count = sizeof($stmt->execute()->fetchAllAssociative());
                                                echo $count; ?></h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>کاربران اختصاص داده شده</h6>
                            <h3><?php $sql = 'SELECT * FROM `expert_user` WHERE expert_id = ' . $expert['id'];
                                $stmt = $conn->prepare($sql);
                                $count = sizeof($stmt->execute()->fetchAllAssociative());
                                echo $count; ?></h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>تعداد بازدید</h6>
                            <h3><?php $sql = 'SELECT * FROM `visits` WHERE expert_id = '.$expert['id'];
                                                $stmt = $conn->prepare($sql);
                                                $count = sizeof($stmt->execute()->fetchAllAssociative());
                                                echo $count; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
</div>
</div>
</div>



<?php partial('footer') ?>
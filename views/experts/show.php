<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php $sql = 'SELECT * FROM `experts` WHERE id = ' . $_GET['id'];
$stmt = $conn->prepare($sql);
$expert = $stmt->execute()->fetchAssociative(); ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>فرم ایجاد کارشناس</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg></a></li>
                    <li class="breadcrumb-item"> کارشناس ها</li>
                    <li class="breadcrumb-item active"> ایجاد کارشناس</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['failed'])) : ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['failed'];
        unset($_SESSION['failed']); ?>

    </div>
<?php endif; ?>
<!-- Container-fluid starts -->
<div class="container-fluid">

    <div class="card">

        <div class="card-body">
            <form method="post" action="" class="theme-form">

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">نام کارشناس</label>
                    <div class="col-sm-9">
                        <input disabled required class="form-control" value="<?php echo $expert['name'] ?>" id="inputnumber" name="name" type="text" placeholder="نام کارشناس">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تلفن همراه</label>
                    <div class="col-sm-9">
                        <input disabled required class="form-control" id="inputnumber" value="<?php echo $expert['phone_number'] ?>" name="phone_number" type="text" placeholder="تلفن همراه">
                    </div>

                </div>






                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">ادمین</label>

                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input disabled required type="radio" <?php echo $property['is_admin'] ? 'checked' : '' ?> name="is_admin" value="1">
                            <span class="checkmark">بله</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input disabled required type="radio" <?php echo !$property['is_admin'] ? 'checked' : '' ?> name="is_admin" value="0">
                            <span class="checkmark">خیر</span>
                        </label>

                    </div>


                </div>

                <?php

                $sql = 'SELECT property_id FROM `expert_property` WHERE expert_id =' . $_GET['id'];
                $stmt = $conn->prepare($sql);
                $property_ids = $stmt->execute()->fetchAllAssociative();
                $ids = [];
                foreach ($property_ids as $property_id) {
                    $ids[] = $property_id['property_id'];
                }
                $properties = [];
                if (!empty($ids)) {
                    $sql = "SELECT * FROM properties
                    WHERE id IN (" . implode(',', $ids) . ")";
                    $stmt = $conn->prepare($sql);
                    $properties = $stmt->execute()->fetchAllAssociative();
                }

                $sql = 'SELECT user_id FROM `expert_user` WHERE expert_id =' . $_GET['id'];
                $stmt = $conn->prepare($sql);
                $user_ids = $stmt->execute()->fetchAllAssociative();
                $ids = [];
                foreach ($user_ids as $user_id) {
                    $ids[] = $user_id['user_id'];
                }

                $users = [];
                if (!empty($ids)) {

                    $sql = "SELECT * FROM users
                            WHERE id IN (" . implode(',', $ids) . ")";
                    $stmt = $conn->prepare($sql);
                    $users = $stmt->execute()->fetchAllAssociative();
                }

                if (!empty($properties)) {
                    echo '<hr>';
                }

                ?>
                <?php foreach ($properties as $property) : ?>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="inputPassword3">ملک</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="Website" type="text" disabled value="<?php echo $property['address'] ?>">
                        </div>
                    </div>

                <?php endforeach; ?>


                <?php
                if (!empty($users)) {
                    echo '<hr>';
                } ?>
                <?php foreach ($users as $user) : ?>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="inputPassword3">مشتری</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="Website" type="text" disabled value="<?php echo $user['name']; ?>">
                        </div>
                    </div>

                <?php endforeach; ?>



            </form>
        </div>




    </div>
    <!-- Container-fluid Ends-->
</div>
<?php partial('footer') ?>
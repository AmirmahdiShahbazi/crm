<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php $user = $queryBuilder
    ->select('*')
    ->from('users')
    ->where('id = ' .  $_GET['id'])->fetchAssociative(); ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>فرم ایجاد کاربر</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg></a></li>
                    <li class="breadcrumb-item"> کاربر ها</li>
                    <li class="breadcrumb-item active"> مشاهده کاربر</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid starts -->
<div class="container-fluid">

    <div class="card">

        <div class="card-body">
            <form method="post" action="" class="theme-form">

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">نام کاربر</label>
                    <div class="col-sm-9">
                        <input disabled required class="form-control" value="<?php echo $user['name']?>" id="inputnumber" name="name" type="text" placeholder="نام کارشناس">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تلفن همراه</label>
                    <div class="col-sm-9">
                        <input disabled required class="form-control" id="inputnumber" value="<?php echo $user['phone_number']?>" name="phone_number" type="text" placeholder="تلفن همراه">
                    </div>
                    
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">رمز عبور</label>
                    <div class="col-sm-9">
                        <input disabled  class="form-control" id="inputnumber" name="password" type="password" placeholder="رمز عبور">
                    </div>
                    
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تکرار رمز عبور</label>
                    <div class="col-sm-9">
                        <input disabled  class="form-control" id="inputnumber" name="confirmation_password" type="password" placeholder="تکرار رمز عبور">
                    </div>
                    
                </div>





                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع</label>

                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input disabled required type="radio" <?php echo $user['type']=='خریدار'?'checked':'' ?> value="خریدار">
                            <span class="checkmark">خریدار</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input disabled required type="radio" <?php echo $user['type']=='فروشنده'?'checked':'' ?>  value="فروشنده">
                            <span class="checkmark">فروشنده</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input disabled required type="radio" <?php echo $user['type']=='اجاره گیرنده'?'checked':'' ?>  value="فروشنده">
                            <span class="checkmark">اجاره گیرنده</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input disabled required type="radio" <?php echo $user['type']=='اجاره دهنده'?'checked':'' ?>  value="فروشنده">
                            <span class="checkmark">اجاره دهنده</span>
                        </label>

                    </div>


                </div>

            </form>
        </div>




    </div>
    <!-- Container-fluid Ends-->
</div>
<?php partial('footer') ?>
<?php partial('header'); ?>

<?php $sql = 'SELECT * FROM `properties`';
$stmt = $conn->prepare($sql);
$properties = $stmt->execute()->fetchAllAssociative();


$sql = 'SELECT * FROM `users` WHERE type = \'خریدار\' or type = \'اجاره گیرنده\'';
$stmt = $conn->prepare($sql);
$clients = $stmt->execute()->fetchAllAssociative();


$sql = 'SELECT * FROM `experts` ';
$stmt = $conn->prepare($sql);
$experts = $stmt->execute()->fetchAllAssociative();
?>
<?php partial('sidebar'); ?>

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>فرم ایجاد پرونده</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg></a></li>
                    <li class="breadcrumb-item"> پرونده ها</li>
                    <li class="breadcrumb-item active"> ایجاد پرونده</li>
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
            <form method="post" enctype="multipart/form-data" action="../../visits/create.php" class="theme-form">
                <div class="mb-3 row" id="reasonInput">
                    <label class="col-sm-3 col-form-label " for="reasonInput">دسته بندی</label>
                    <div class="col-sm-9">
                        <input s class="form-control" name="category" type="text" required placeholder="دسته بندی ">
                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">ملک</label>
                    <div class="col-sm-9">
                        <select name="property" class="js-example-basic-single form-control">
                            <?php foreach ($properties as $property) : ?>
                                <option value="<?php echo $property['id'] ?>"><?php echo $property['address'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">مشتری</label>
                    <div class="col-sm-9">
                        <select name="client" class="js-example-basic-single form-control">
                            <?php foreach ($clients as $client) : ?>
                                <option value="<?php echo $client['id'] ?>"><?php echo $client['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">کارشناس</label>
                    <div class="col-sm-9">
                        <select name="expert" class="js-example-basic-single form-control" >
                            <?php foreach ($experts as $expert) : ?>
                                <option value="<?php echo $expert['id'] ?>"><?php echo $expert['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">فایل</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="inputnumber" multiple name="files[]" type="file" required placeholder="تلفن همراه">
                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">توضیحات</label>
                    <div class="col-sm-9">
                        <textarea required class="form-control" id="inputnumber" name="description" type="password" required placeholder="توضیحات"></textarea>
                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تاریخ بازدید</label>
                    <div class="col-sm-9">
                        <input class="datepicker2 form-control digits" name="visit_time" type="text">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نتیجه</label>

                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" checked onchange="toggleReasonInput()" class="toggle-reason" name="result" value="1">
                            <span class="checkmark">موفق</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input id="inputnumber" onchange="toggleReasonInput()" class="toggle-reason" type="radio" name="result" value="0">
                            <span class="checkmark">ناموفق</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row" id="reasonInput">
                    <label class="col-sm-3 col-form-label " for="reasonInput">دلیل</label>
                    <div class="col-sm-9">
                        <input s class="form-control" name="reason" type="text" required placeholder="دلیل ">
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
            </form>
        </div>




    </div>
    <!-- Container-fluid Ends-->
</div>


<?php partial('footer') ?>
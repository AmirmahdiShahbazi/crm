<?php partial('header'); ?>

<?php partial('sidebar'); ?>
 <?php 
$sql = 'SELECT * FROM `visits`';
$stmt = $conn->prepare($sql);
$visits = $stmt->execute()->fetchAllAssociative(); 



$sql = 'SELECT * FROM `properties`';
$stmt = $conn->prepare($sql);
$properties = $stmt->execute()->fetchAllAssociative();


$sql = 'SELECT * FROM `experts`';
$stmt = $conn->prepare($sql);
$experts = $stmt->execute()->fetchAllAssociative();

$sql = 'SELECT * FROM `users`';
$stmt = $conn->prepare($sql);
$clients = $stmt->execute()->fetchAllAssociative(); ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>لیست پرونده ها</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg></a></li>
                    <li class="breadcrumb-item"> پرونده ها</li>
                    <li class="breadcrumb-item active"> لیست پرونده ها</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
    <?php unset($_SESSION['success']) ?>
<?php endif; ?>
<!-- Container-fluid starts -->
<div class="container-fluid">
    <div class="col-sm-12">
        <div class="card">

            <div class="card-body">
                <!-- <div class="table-responsive dataTables_wrapper me-0">
                    <table>
                        <tbody class="dataTables_filter custom-datatable-filter">
                            <tr class="d-inline-block me-sm-3">
                                <td>
                                    <label for="min">حداقل سن : </label>
                                    <input class="form-control m-0" id="min" type="search" name="min">
                                </td>
                            </tr>
                            <tr class="d-inline-block">
                                <td>
                                    <label for="max">حداکثر سن : </label>
                                    <input class="form-control m-0" id="max" type="search" name="max">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <div class="table-responsive">
                    <table class="display" id="datatable-range">
                        <thead>
                            <tr>
                                <th>کارشناس</th>
                                <th>مشتری</th>
                                <th>ملک</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($visits as $visit) : ?>
                                <tr>
                                    <td><?php $sql = 'SELECT * FROM `experts` WHERE id = ' . $visit['expert_id'];
                                        $stmt = $conn->prepare($sql);
                                        echo $stmt->execute()->fetchAssociative()['name']; ?></td>
                                    <td><?php $sql = 'SELECT * FROM `users` WHERE id = ' . $visit['visitor_id'];
                                        $stmt = $conn->prepare($sql);
                                        echo $stmt->execute()->fetchAssociative()['name'];  ?></td>
                                    <td><?php $sql = 'SELECT * FROM `properties` WHERE id = ' . $visit['property_id'];
                                        $stmt = $conn->prepare($sql);
                                        echo $stmt->execute()->fetchAssociative()['address']; ?></td>
                                    <td>
                                        <a style="cursor:pointer;" class="fa fa-eye" data-bs-toggle="modal" data-bs-target="#showModal"></a>
                                        <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">مشاهده پرونده</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">

                                                            <div class="card">

                                                                <div class="card-body">
                                                                    <form method="post" enctype="multipart/form-data" action="../../visits/create.php" class="theme-form">
                                                                        <div class="mb-3 row" id="reasonInput">
                                                                            <label class="col-sm-3 col-form-label " for="reasonInput">دسته بندی</label>
                                                                            <div class="col-sm-9">
                                                                                <input disabled class="form-control" value="<?php echo $visit['category']?>" name="category" type="text" required placeholder="دسته بندی ">
                                                                            </div>

                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputPassword3">ملک</label>
                                                                            <div class="col-sm-9">
                                                                                <select disabled name="property" class="js-example-basic-single form-control">
                                                                                    <?php foreach ($properties as $property) : ?>
                                                                                        <option value="<?php echo $property['id'] ?>" <?php echo $property['id'] == $visit['property_id'] ? 'selected' : '' ?>><?php echo $property['address'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputPassword3">مشتری</label>
                                                                            <div class="col-sm-9">
                                                                                <select disabled name="client" class="js-example-basic-single form-control">
                                                                                    <?php foreach ($clients as $client) : ?>
                                                                                        <option value="<?php echo $client['id'] ?>" <?php echo $client['id'] == $visit['visitor_id'] ? 'selected' : '' ?>><?php echo $client['name'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputPassword3">کارشناس</label>
                                                                            <div class="col-sm-9">
                                                                                <select disabled name="expert" class="js-example-basic-single form-control" name="state">
                                                                                    <?php foreach ($experts as $expert) : ?>
                                                                                        <option value="<?php echo $expert['id'] ?>" <?php echo $expert['id'] == $visit['expert_id'] ? 'selected' : '' ?>><?php echo $expert['name'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <?php
                                                                        $files = [];
                                                                        foreach (json_decode($visit['attachment_file'], true) as $filePath) {
                                                                            $name = explode(DIRECTORY_SEPARATOR, $filePath);
                                                                            $files[] = $name[array_key_last($name)];
                                                                        }
                                                                        $files = implode(',', $files) ?? null;
                                                                        ?>
                                                                        <?php if (!empty($files)) : ?>

                                                                            <div class="mb-3 row">
                                                                                <label class="col-sm-3 col-form-label" for="inputPassword3">فایل ها</label>
                                                                                <div class="col-sm-9">
                                                                                    <a href="../../visits/download.php?files=<?php echo $files == null ? '' : $files ?>" class="btn btn-primary"><?php echo $files == null ? 'فایلی موجود نمیباشید' : 'دانلود فایل های پیوست' ?></a>
                                                                                </div>
                                                                            </div>
                                                                        <?php endif; ?>


                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputPassword3">توضیحات</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea disabled class="form-control" id="inputnumber" name="description" type="password" required placeholder="توضیحات"><?php echo $visit['description'] ?></textarea>
                                                                            </div>

                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputPassword3">تاریخ بازدید</label>
                                                                            <div class="col-sm-9">
                                                                                <input disabled value="<?php echo $visit['visit_time'] ?>" class="datepicker2 form-control digits" name="visit_time" type="text">
                                                                            </div>
                                                                        </div>


                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputEmail3">نتیجه</label>

                                                                            <div class="col-sm-1 ">
                                                                                <label class="custom-checkbox" style="width:120px;">
                                                                                    <input disabled type="radio" <?php echo $visit['result'] ? 'checked' : '' ?>  class="toggle-reason" name="result" value="1">
                                                                                    <span class="checkmark">موفق</span>
                                                                                </label>

                                                                            </div>
                                                                            <div class="col-sm-1 ">
                                                                                <label class="custom-checkbox" style="width:120px;">
                                                                                    <input disabled id="inputnumber" <?php echo !$visit['result'] ? 'checked' : '' ?>  class="toggle-reason" type="radio" name="result" value="0">
                                                                                    <span class="checkmark">ناموفق</span>
                                                                                </label>

                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row" id="reasonInput">
                                                                            <label class="col-sm-3 col-form-label "  for="reasonInput">دلیل</label>
                                                                            <div class="col-sm-9">
                                                                                <input disabled class="form-control" value="<?php echo $visit['reason'] ?>" name="reason" type="text" required placeholder="دلیل ">
                                                                            </div>

                                                                        </div>

                                                                    </form>
                                                                </div>




                                                            </div>
                                                            <!-- Container-fluid Ends-->
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <a style="cursor:pointer;" class="fa fa-trash text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"></a>
                                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">حذف ملک</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>آیا از حذف این ملک اطمینان دارید؟</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="../users/delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php partial('footer') ?>
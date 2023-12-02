<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php $sql = 'SELECT * FROM `properties`';
$stmt = $conn->prepare($sql);
$properties = $stmt->execute()->fetchAllAssociative();
$sql = 'SELECT * FROM `experts`';
$stmt = $conn->prepare($sql);
$experts = $stmt->execute()->fetchAllAssociative();
?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>لیست ملک ها</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg></a></li>
                    <li class="breadcrumb-item"> املاک</li>
                    <li class="breadcrumb-item active"> لیست ملک ها</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success"><?php echo $_SESSION['success'] ?></div>
    <?php unset($_SESSION['success']) ?>

<?php endif; ?>
<?php if (isset($_SESSION['failed'])) : ?>
    <div class="alert alert-danger"><?php echo $_SESSION['failed'] ?></div>
    <?php unset($_SESSION['failed']) ?>

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
                                <th>نوع معامله</th>
                                <th>نوع ملک</th>
                                <th>محله</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($properties as $property) : ?>
                                <tr>
                                    <td><?php echo $property['transaction_type'] ?></td>
                                    <td><?php echo $property['property_type'] ?></td>
                                    <td><?php echo $property['neighborhood'] ?></td>
                                    <td>
                                        <a href="../properties/show.php?id=<?php echo $property['id']; ?>" class="fa fa-eye text-secondray" title="مشاهده"></a>
                                        <a href="../properties/update.php?id=<?php echo $property['id']; ?>" class="fa fa-edit text-primary" title="ویرایش"></a>
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
                                                        <a href="../properties/delete.php?id=<?php echo $property['id']; ?>" class="btn btn-danger">حذف</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <a style="cursor:pointer;" class="fa fa-user" data-bs-toggle="modal" data-bs-target="#showModal"></a>
                                        <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModal" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">اختصاص کارشناس</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">

                                                            <div class="card">

                                                                <div class="card-body">
                                                                    <form method="post" enctype="multipart/form-data" action="../../expert_property/create.php" class="theme-form">
                                                                        <input class="form-control" value="<?php echo $property['id'] ?>" name="property" type="hidden" required placeholder="دسته بندی ">

                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputPassword3">کارشناس</label>
                                                                            <div class="col-sm-9">

                                                                                <select name="expert" class="js-example-basic-single form-control">
                                                                                    <option>کارشناس</option>
                                                                                    <?php foreach ($experts as $expert) : ?>
                                                                                        <option value="<?php echo $expert['id'] ?>"><?php echo $expert['name'] ?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputPassword3">تاریخ</label>
                                                                            <div class="col-sm-9">
                                                                                <input class="datepicker2 form-control digits" name="date" type="text">
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3 row">
                                                                            <label class="col-sm-3 col-form-label" for="inputPassword3"></label>

                                                                            <div class="col-sm-9">
                                                                                <input class="btn btn-primary" value="تایید" type="submit">
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

                                    </td>

                                </tr>
                            <?php endforeach; ?>



                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php partial('footer') ?>
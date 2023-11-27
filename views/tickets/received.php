<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php



$receiveds = $queryBuilder->select('*')->from('tickets')->where('receiver_id = ?')->setParameter('0', 4)->execute()->fetchAllAssociative() ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>تیکت های دریافت شده</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg></a></li>
                    <li class="breadcrumb-item"> تیکت ها</li>
                    <li class="breadcrumb-item active">تیکت های دریافت شده</li>
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
                                <th>فرستنده</th>
                                <th>موضوع</th>
                                <th>خوانده شده</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php foreach ($receiveds as $received) : ?>


                                <tr>

                                    <td><?php

                                        echo $queryBuilder->select('name')
                                            ->from('experts')
                                            ->where('experts.id = ?') // Specify the table name before the column name
                                            ->setParameter('0', $received['sender_id'])
                                            ->execute()
                                            ->fetchOne();

                                        ?>
                                    </td>
                                    <td><?php echo $received['title'] ?></td>
                                    <td><i class="fa <?php echo $received['seen'] ? 'fa-check text-success' : 'fa-times text-danger' ?>"></i></td>
                                    <td>
                                        <a href="../../tickets/show-received.php?id=<?php echo $received['id']; ?>" class="fa fa-eye text-secondray" title="مشاهده"></a>
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
                                                        <a href="../../users/delete.php?id=<?php echo $property['id']; ?>" class="btn btn-danger">حذف</a>
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
<?php partial('header'); ?>
<?php $sql = 'SELECT * FROM `tasks` WHERE expert_id = ' . $_SESSION['user']['id'];
$stmt = $conn->prepare($sql);
$tasks = $stmt->execute()->fetchAllAssociative(); ?>
<?php partial('sidebar'); ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>وظایف</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">برنامه ها</li>
                    <li class="breadcrumb-item active">وظایف</li>
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
<div class="container-fluid">
    <a style="cursor:pointer;" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">افزودن وظیفه</a>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ایجاد وظیفه</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="card">

                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" action="../../tasks/create.php" class="theme-form">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">وظیفه </label>
                                        <div class="col-sm-9">
                                            <input name="title" required class="form-control">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">توضیحات </label>
                                        <div class="col-sm-9">
                                            <textarea name="description" required class="form-control"></textarea>
                                        </div>
                                    </div>






                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">تاریخ </label>
                                        <div class="col-sm-9">
                                            <input class="datepicker5 form-control digits pwt-datepicker-input-element form-control" name="date" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3"> </label>
                                        <div class="col-sm-9">
                                            <input class="btn btn-primary" type="submit" value="تایید">
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
    <div class="email-wrap bookmark-wrap">
        <div class="row">

            <div class="col-xl-12 box-col-12 col-md-12 xl-70">
                <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h5 class="mb-0">ایجاد شده توسط من</h5><a href="#"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="taskadd">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <?php foreach ($tasks as $task) : ?>
                                                            <tr>
                                                                <td>
                                                                    <h6 class="task_title_0"><?php echo $task['title'] ?></h6>
                                                                    <p class="project_name_0"><?php echo $task['date'] ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class="task_desc_0"><?php echo $task['description'] ?></p>
                                                                </td>
                                                                <td> <a style="cursor:pointer;" class="fa fa-trash text-danger" style="font-size:16px;" data-bs-toggle="modal" data-bs-target="#deleteModal"></a>
                                                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">حذف وظیفه</h5>
                                                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p>آیا از حذف این وظیفه اطمینان دارید؟</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <a href="../../tasks/delete.php?id=<?php echo $task['id']; ?>" class="btn btn-danger">حذف</a>
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
                                <div class="fade tab-pane" id="pills-todaytask" role="tabpanel" aria-labelledby="pills-todaytask-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">وظایف امروز</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="details-bookmark text-center">
                                                <div class="row" id="favouriteData"></div>
                                                <div class="no-favourite"><span>امروز وظیفه ای نیست</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fade tab-pane" id="pills-delayed" role="tabpanel" aria-labelledby="pills-delayed-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">وظایف تاخیری</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="details-bookmark text-center"><span>هیچ وظیفه ای پیدا نشد</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fade tab-pane" id="pills-upcoming" role="tabpanel" aria-labelledby="pills-upcoming-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">وظایف آتی</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="details-bookmark text-center"><span>هیچ وظیفه ای پیدا نشد</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fade tab-pane" id="pills-weekly" role="tabpanel" aria-labelledby="pills-weekly-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">وظایف این هفته</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="details-bookmark text-center"><span>هیچ وظیفه ای پیدا نشد</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fade tab-pane" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">وظایف این ماه</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="details-bookmark text-center"><span>هیچ وظیفه ای پیدا نشد</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fade tab-pane" id="pills-assigned" role="tabpanel" aria-labelledby="pills-assigned-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">به من اختصاص داده است</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="taskadd">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fade tab-pane" id="pills-tasks" role="tabpanel" aria-labelledby="pills-tasks-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">وظایف من</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="taskadd">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h6 class="task_title_0">نام وظیفه</h6>
                                                                <p class="project_name_0">عمومی</p>
                                                            </td>
                                                            <td>
                                                                <p class="task_desc_0">لورم ایپسوم به سادگی متن ساختگی صنعت چاپ و حروفچینی است.
                                                                    لورم ایپسوم متن ساختگی</p>
                                                            </td>
                                                            <td><a class="me-2" href="javascript:void(0)"><i data-feather="link"></i></a><a href="javascript:void(0)"><i data-feather="more-horizontal"></i></a></td>
                                                            <td><a href="javascript:void(0)"><i data-feather="trash-2"></i></a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fade tab-pane" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">اعلان</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="details-bookmark text-center"><span>هیچ وظیفه ای پیدا نشد</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="fade tab-pane" id="pills-newsletter" role="tabpanel" aria-labelledby="pills-newsletter-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h6 class="mb-0">خبرنامه</h6><a href="javascript:void(0)"><i class="me-2" data-feather="printer"></i>چاپ</a>
                                        </div>
                                        <div class="card-body">
                                            <div class="details-bookmark text-center"><span>هیچ وظیفه ای پیدا نشد</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade modal-bookmark" id="createtag" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">ایجاد برچسب</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-bookmark needs-validation" novalidate="">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>نام برچسب</label>
                                                            <input class="form-control w-100" type="text" required="" autocomplete="off">
                                                        </div>
                                                        <div class="form-group col-md-12 mb-0">
                                                            <label>رنگ برچسب</label>
                                                            <input class="form-control fill-color" type="color" value="#24695c">
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-secondary" type="button">ذخیره</button>
                                                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal">لغو</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
</div>

<?php partial('footer'); ?>
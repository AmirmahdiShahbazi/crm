<?php include './bootstrap.php'; ?>

<?php partial('header') ?>
<?php $sql = 'SELECT * FROM `tasks` WHERE expert_id = ' . $_SESSION['user']['id'];
$stmt = $conn->prepare($sql);
$tasks = $stmt->execute()->fetchAllAssociative();
$sql = 'SELECT * FROM `properties` ORDER BY id DESC LIMIT 5';
$stmt = $conn->prepare($sql);
$_properties = $stmt->execute()->fetchAllAssociative(); ?>
<?php partial('sidebar'); ?>

<!-- Container-fluid starts-->
<div class="container-fluid default-dash">

    <div class="email-wrap bookmark-wrap">
        <div class="row">
            <div class="col-sm-6 col-xl-3 col-lg-6 mt-3">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">

                            <div class="media-body">
                                <a href="/properties">
                                    <h6 class="font-roboto">ملک ها</h6>
                                    <h4 class="mb-0 counter"><?php $sql = 'SELECT COUNT(id) FROM properties;';
                                                                $stmt = $conn->prepare($sql);
                                                                $properties = $stmt->execute()->fetchAssociative();
                                                                echo $properties['COUNT(id)'] . ' ملک'; ?></h4>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 mt-3">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">

                            <div class="media-body">
                                <a href="/experts">
                                    <h6 class="font-roboto">کارشناس ها</h6>
                                    <h4 class="mb-0 counter"><?php $sql = 'SELECT COUNT(id) FROM experts;';
                                                                $stmt = $conn->prepare($sql);
                                                                $properties = $stmt->execute()->fetchAssociative();
                                                                echo $properties['COUNT(id)'] . ' کارشناس'; ?></h4>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 mt-3">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">

                            <div class="media-body">
                                <a href="/users">
                                    <h6 class="font-roboto">مشتریان</h6>
                                    <h4 class="mb-0 counter"><?php $sql = 'SELECT COUNT(id) FROM users;';
                                                                $stmt = $conn->prepare($sql);
                                                                $properties = $stmt->execute()->fetchAssociative();
                                                                echo $properties['COUNT(id)'] . ' مشتری'; ?></h4>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3 col-lg-6 mt-3">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="media static-widget">

                            <div class="media-body">
                                <a href="/visits">
                                    <h6 class="font-roboto">پرونده ها</h6>
                                    <h4 class="mb-0 counter"><?php $sql = 'SELECT COUNT(id) FROM visits;';
                                                                $stmt = $conn->prepare($sql);
                                                                $properties = $stmt->execute()->fetchAssociative();
                                                                echo $properties['COUNT(id)'] . ' پرونده'; ?></h4>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xl-12 box-col-12 col-md-12 xl-70 mt-3">
                <div class="email-right-aside bookmark-tabcontent">
                    <div class="card email-body radius-left">
                        <div class="ps-0">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="pills-created" role="tabpanel" aria-labelledby="pills-created-tab">
                                    <div class="card mb-0">
                                        <div class="card-header d-flex">
                                            <h5 class="mb-0">وظایف</h5><a href="#"><i class="me-2" data-feather="printer"></i>چاپ</a>
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
                                                                <td> <a style="cursor:pointer;" class="fa fa-trash text-danger" style="font-size:16px;" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $task['id'] ?>"></a>
                                                                    <div class="modal fade" id="deleteModal<?php echo $task['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?php echo $task['id'] ?>" aria-hidden="true">
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
            <div class="col-xl-6 xl-100 col-sm-12 box-col-12">
                <div class="card o-hidden">
                    <div class="weather-widget-two">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-5 col-md-6">
                                    <div class="mobile-clock-widget">
                                        <div>
                                            <ul class="clock" id="clock">
                                                <li class="hour" id="hour" style="transform: rotate(569.5deg);"></li>
                                                <li class="min" id="min" style="transform: rotate(354deg);"></li>
                                                <li class="sec" id="sec" style="transform: rotate(24deg);"></li>
                                            </ul>
                                            <div class="date f-24 mb-2" id="date"><span id="monthDay">17 آذر</span><span id="year">, 1402</span>
                                            </div>
                                            <div>
                                                <p class="m-0 f-14 text-light">تهران، ایران</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-md-6">
                                    <div class="widget-list">
                                        <ul>
                                            <li>
                                                <div class="media">
                                                    <svg class="climacon climacon_cloudDrizzleMoonFillAlt" id="cloudDrizzleMoonFillAlt" version="1.1" viewBox="15 15 70 70">
                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudDrizzleMoonFillAlt">
                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z">
                                                                </path>
                                                                <path class="climacon_component climacon_component-fill climacon_component-fill_moon" fill="#FFFFFF" d="M59.235,30.851c-3.556,0.813-6.211,3.989-6.211,7.792c0,4.417,3.581,7.999,7.999,7.999c3.802,0,6.979-2.655,7.791-6.211C63.961,39.527,60.139,35.705,59.235,30.851z">
                                                                </path>
                                                            </g>
                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-drizzle">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-left" id="Drizzle-Left_1_6" d="M56.969,57.672l-2.121,2.121c-1.172,1.172-1.172,3.072,0,4.242c1.17,1.172,3.07,1.172,4.24,0c1.172-1.17,1.172-3.07,0-4.242L56.969,57.672z">
                                                                </path>
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-middle" d="M50.088,57.672l-2.119,2.121c-1.174,1.172-1.174,3.07,0,4.242c1.17,1.172,3.068,1.172,4.24,0s1.172-3.07,0-4.242L50.088,57.672z">
                                                                </path>
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_drizzle climacon_component-stroke_drizzle-right" d="M43.033,57.672l-2.121,2.121c-1.172,1.172-1.172,3.07,0,4.242s3.07,1.172,4.244,0c1.172-1.172,1.172-3.07,0-4.242L43.033,57.672z">
                                                                </path>
                                                            </g>
                                                            <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z">
                                                                </path>
                                                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <div class="media-body">
                                                        <h5>25*C</h5>
                                                    </div><span>تهران</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <svg class="climacon climacon_cloudLightningMoonFill" id="cloudLightningMoonFill" version="1.1" viewBox="15 15 70 70">
                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudLightningMoonFill">
                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-moon climacon_componentWrap-moon_cloud">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" d="M61.023,50.641c-6.627,0-11.999-5.372-11.999-11.998c0-6.627,5.372-11.999,11.999-11.999c0.755,0,1.491,0.078,2.207,0.212c-0.132,0.576-0.208,1.173-0.208,1.788c0,4.418,3.582,7.999,8,7.999c0.614,0,1.212-0.076,1.788-0.208c0.133,0.717,0.211,1.452,0.211,2.208C73.021,45.269,67.649,50.641,61.023,50.641z">
                                                                </path>
                                                                <path class="climacon_component climacon_component-fill climacon_component-fill_moon" fill="#FFFFFF" d="M59.235,30.851c-3.556,0.813-6.211,3.989-6.211,7.792c0,4.417,3.581,7.999,7.999,7.999c3.802,0,6.979-2.655,7.791-6.211C63.961,39.527,60.139,35.705,59.235,30.851z">
                                                                </path>
                                                            </g>
                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-lightning">
                                                                <polygon class="climacon_component climacon_component-stroke climacon_component-stroke_lightning" points="48.001,51.641 57.999,51.641 52,61.641 58.999,61.641 46.001,77.639 49.601,65.641 43.001,65.641 ">
                                                                </polygon>
                                                            </g>
                                                            <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z">
                                                                </path>
                                                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <div class="media-body">
                                                        <h5>25*C</h5>
                                                    </div><span>شیراز</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="media">
                                                    <svg class="climacon climacon_cloudHailAltSun" id="cloudHailAltSunalt" version="1.1" viewBox="15 15 70 70">
                                                        <g class="climacon_iconWrap climacon_iconWrap-cloudHailAltSun">
                                                            <g class="climacon_componentWrap climacon_componentWrap-sun climacon_componentWrap-sun_cloud">
                                                                <g class="climacon_componentWrap climacon_componentWrap_sunSpoke">
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M80.029,43.611h-3.998c-1.105,0-2-0.896-2-1.999s0.895-2,2-2h3.998c1.104,0,2,0.896,2,2S81.135,43.611,80.029,43.611z">
                                                                    </path>
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,30.3c-0.781,0.781-2.049,0.781-2.828,0c-0.781-0.781-0.781-2.047,0-2.828l2.828-2.828c0.779-0.781,2.047-0.781,2.828,0c0.779,0.781,0.779,2.047,0,2.828L72.174,30.3z">
                                                                    </path>
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,25.614c-1.105,0-2-0.896-2-2v-3.999c0-1.104,0.895-2,2-2c1.104,0,2,0.896,2,2v3.999C60.033,24.718,59.135,25.614,58.033,25.614z">
                                                                    </path>
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,30.3l-2.827-2.828c-0.781-0.781-0.781-2.047,0-2.828c0.78-0.781,2.047-0.781,2.827,0l2.827,2.828c0.781,0.781,0.781,2.047,0,2.828C45.939,31.081,44.673,31.081,43.892,30.3z">
                                                                    </path>
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M42.033,41.612c0,1.104-0.896,1.999-2,1.999h-4c-1.104,0-1.998-0.896-1.998-1.999s0.896-2,1.998-2h4C41.139,39.612,42.033,40.509,42.033,41.612z">
                                                                    </path>
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M43.892,52.925c0.781-0.78,2.048-0.78,2.827,0c0.781,0.78,0.781,2.047,0,2.828l-2.827,2.827c-0.78,0.781-2.047,0.781-2.827,0c-0.781-0.78-0.781-2.047,0-2.827L43.892,52.925z">
                                                                    </path>
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M58.033,57.61c1.104,0,2,0.895,2,1.999v4c0,1.104-0.896,2-2,2c-1.105,0-2-0.896-2-2v-4C56.033,58.505,56.928,57.61,58.033,57.61z">
                                                                    </path>
                                                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_sunSpoke climacon_component-stroke_sunSpoke-north" d="M72.174,52.925l2.828,2.828c0.779,0.78,0.779,2.047,0,2.827c-0.781,0.781-2.049,0.781-2.828,0l-2.828-2.827c-0.781-0.781-0.781-2.048,0-2.828C70.125,52.144,71.391,52.144,72.174,52.925z">
                                                                    </path>
                                                                </g>
                                                                <g class="climacon_wrapperComponent climacon_wrapperComponent-sunBody">
                                                                    <circle class="climacon_component climacon_component-stroke climacon_component-stroke_sunBody" cx="58.033" cy="41.612" r="11.999"></circle>
                                                                    <circle class="climacon_component climacon_component-fill climacon_component-fill_sunBody" fill="#FFFFFF" cx="58.033" cy="41.612" r="7.999"></circle>
                                                                </g>
                                                            </g>
                                                            <g class="climacon_wrapperComponent climacon_wrapperComponent-hailAlt">
                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                                                    <circle cx="42" cy="65.498" r="2"></circle>
                                                                </g>
                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                                                    <circle cx="49.999" cy="65.498" r="2"></circle>
                                                                </g>
                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                                                    <circle cx="57.998" cy="65.498" r="2"></circle>
                                                                </g>
                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                                                    <circle cx="42" cy="65.498" r="2"></circle>
                                                                </g>
                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                                                    <circle cx="49.999" cy="65.498" r="2"></circle>
                                                                </g>
                                                                <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                                                    <circle cx="57.998" cy="65.498" r="2"></circle>
                                                                </g>
                                                            </g>
                                                            <g class="climacon_componentWrap climacon_componentWrap_cloud">
                                                                <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M43.945,65.639c-8.835,0-15.998-7.162-15.998-15.998c0-8.836,7.163-15.998,15.998-15.998c6.004,0,11.229,3.312,13.965,8.203c0.664-0.113,1.338-0.205,2.033-0.205c6.627,0,11.998,5.373,11.998,12c0,6.625-5.371,11.998-11.998,11.998C57.168,65.639,47.143,65.639,43.945,65.639z">
                                                                </path>
                                                                <path class="climacon_component climacon_component-fill climacon_component-fill_cloud" fill="#FFFFFF" d="M59.943,61.639c4.418,0,8-3.582,8-7.998c0-4.417-3.582-8-8-8c-1.601,0-3.082,0.481-4.334,1.291c-1.23-5.316-5.973-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.999c0,6.626,5.372,11.998,11.998,11.998C47.562,61.639,56.924,61.639,59.943,61.639z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <div class="media-body">
                                                        <h5>25*C</h5>
                                                    </div><span>تبریز</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 xl-50 col-md-6 box-col-6">
                <div class="card">
                    <div class="cal-date-widget card-body">
                        <div class="cal-datepicker">
                            <div id="taghvim" class="pwt-datepicker-input-element">
                                <div id="persianDateInstance-415" class="datepicker-container-inline">
                                    <div id="plotId" class="datepicker-plot-area datepicker-plot-area-inline-view datepicker-state-no-meridian   datepicker-persian">
                                        <div data-navigator="" class="datepicker-navigator">
                                            <div class="pwt-btn pwt-btn-next">&lt;</div>
                                            <div class="pwt-btn pwt-btn-switch">۱۴۰۲ آذر</div>
                                            <div class="pwt-btn pwt-btn-prev">&gt;</div>
                                        </div>
                                        <div class="datepicker-grid-view">
                                            <div class="datepicker-day-view">
                                                <div class="month-grid-box">
                                                    <div class="header">
                                                        <div class="title"></div>
                                                        <div class="header-row">
                                                            <div class="header-row-cell">ش</div>
                                                            <div class="header-row-cell">ی</div>
                                                            <div class="header-row-cell">د</div>
                                                            <div class="header-row-cell">س</div>
                                                            <div class="header-row-cell">چ</div>
                                                            <div class="header-row-cell">پ</div>
                                                            <div class="header-row-cell">ج</div>
                                                        </div>
                                                    </div>
                                                    <table cellspacing="0" class="table-days">
                                                        <tbody>

                                                            <tr>
                                                                <td data-date="1402,8,27" data-unix="1700296200000">
                                                                    <span class="other-month">۲۷</span>
                                                                </td>

                                                                <td data-date="1402,8,28" data-unix="1700382600000">
                                                                    <span class="other-month">۲۸</span>
                                                                </td>

                                                                <td data-date="1402,8,29" data-unix="1700469000000">
                                                                    <span class="other-month">۲۹</span>
                                                                </td>

                                                                <td data-date="1402,8,30" data-unix="1700555400000">
                                                                    <span class="other-month">۳۰</span>
                                                                </td>

                                                                <td data-date="1402,9,1" data-unix="1700641800000">
                                                                    <span class="">۱</span>
                                                                </td>

                                                                <td data-date="1402,9,2" data-unix="1700728200000">
                                                                    <span class="">۲</span>
                                                                </td>

                                                                <td data-date="1402,9,3" data-unix="1700814600000">
                                                                    <span class="">۳</span>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td data-date="1402,9,4" data-unix="1700901000000">
                                                                    <span class="">۴</span>
                                                                </td>

                                                                <td data-date="1402,9,5" data-unix="1700987400000">
                                                                    <span class="">۵</span>
                                                                </td>

                                                                <td data-date="1402,9,6" data-unix="1701073800000">
                                                                    <span class="">۶</span>
                                                                </td>

                                                                <td data-date="1402,9,7" data-unix="1701160200000">
                                                                    <span class="">۷</span>
                                                                </td>

                                                                <td data-date="1402,9,8" data-unix="1701246600000">
                                                                    <span class="">۸</span>
                                                                </td>

                                                                <td data-date="1402,9,9" data-unix="1701333000000">
                                                                    <span class="">۹</span>
                                                                </td>

                                                                <td data-date="1402,9,10" data-unix="1701419400000">
                                                                    <span class="">۱۰</span>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td data-date="1402,9,11" data-unix="1701505800000">
                                                                    <span class="">۱۱</span>
                                                                </td>

                                                                <td data-date="1402,9,12" data-unix="1701592200000">
                                                                    <span class="">۱۲</span>
                                                                </td>

                                                                <td data-date="1402,9,13" data-unix="1701678600000">
                                                                    <span class="">۱۳</span>
                                                                </td>

                                                                <td data-date="1402,9,14" data-unix="1701765000000">
                                                                    <span class="">۱۴</span>
                                                                </td>

                                                                <td data-date="1402,9,15" data-unix="1701851400000" class="">
                                                                    <span class="">۱۵</span>
                                                                </td>

                                                                <td data-date="1402,9,16" data-unix="1701937800000" class="today selected">
                                                                    <span class="">۱۶</span>
                                                                </td>

                                                                <td data-date="1402,9,17" data-unix="1702024200000">
                                                                    <span class="">۱۷</span>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td data-date="1402,9,18" data-unix="1702110600000">
                                                                    <span class="">۱۸</span>
                                                                </td>

                                                                <td data-date="1402,9,19" data-unix="1702197000000">
                                                                    <span class="">۱۹</span>
                                                                </td>

                                                                <td data-date="1402,9,20" data-unix="1702283400000">
                                                                    <span class="">۲۰</span>
                                                                </td>

                                                                <td data-date="1402,9,21" data-unix="1702369800000">
                                                                    <span class="">۲۱</span>
                                                                </td>

                                                                <td data-date="1402,9,22" data-unix="1702456200000">
                                                                    <span class="">۲۲</span>
                                                                </td>

                                                                <td data-date="1402,9,23" data-unix="1702542600000">
                                                                    <span class="">۲۳</span>
                                                                </td>

                                                                <td data-date="1402,9,24" data-unix="1702629000000">
                                                                    <span class="">۲۴</span>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td data-date="1402,9,25" data-unix="1702715400000">
                                                                    <span class="">۲۵</span>
                                                                </td>

                                                                <td data-date="1402,9,26" data-unix="1702801800000">
                                                                    <span class="">۲۶</span>
                                                                </td>

                                                                <td data-date="1402,9,27" data-unix="1702888200000">
                                                                    <span class="">۲۷</span>
                                                                </td>

                                                                <td data-date="1402,9,28" data-unix="1702974600000">
                                                                    <span class="">۲۸</span>
                                                                </td>

                                                                <td data-date="1402,9,29" data-unix="1703061000000">
                                                                    <span class="">۲۹</span>
                                                                </td>

                                                                <td data-date="1402,9,30" data-unix="1703147400000">
                                                                    <span class="">۳۰</span>
                                                                </td>

                                                                <td data-date="1402,10,1" data-unix="1703237399000">
                                                                    <span class="other-month">۱</span>
                                                                </td>

                                                            </tr>

                                                            <tr>
                                                                <td data-date="1402,10,2" data-unix="1703323799000">
                                                                    <span class="other-month">۲</span>
                                                                </td>

                                                                <td data-date="1402,10,3" data-unix="1703410199000">
                                                                    <span class="other-month">۳</span>
                                                                </td>

                                                                <td data-date="1402,10,4" data-unix="1703496599000">
                                                                    <span class="other-month">۴</span>
                                                                </td>

                                                                <td data-date="1402,10,5" data-unix="1703582999000">
                                                                    <span class="other-month">۵</span>
                                                                </td>

                                                                <td data-date="1402,10,6" data-unix="1703669399000">
                                                                    <span class="other-month">۶</span>
                                                                </td>

                                                                <td data-date="1402,10,7" data-unix="1703755799000">
                                                                    <span class="other-month">۷</span>
                                                                </td>

                                                                <td data-date="1402,10,8" data-unix="1703842199000">
                                                                    <span class="other-month">۸</span>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="toolbox">
                                            <div class="pwt-btn-today">امروز</div>
                                            <div class="pwt-btn-calendar">December</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12">
                <div class="card ongoing-project recent-orders">
                    <div class="card-header card-no-border">
                        <div class="media media-dashboard">
                            <div class="media-body">
                                <h5 class="mb-0">ملک های اخیر</h5>
                            </div>

                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th> <span>محله</span></th>
                                        <th> <span>نوع ملک</span></th>
                                        <th> <span>نوع معامله </span></th>
                                        <th> <span>شناسه فایل</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($_properties as $property) : ?>

                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body ps-2">
                                                        <div class="avatar-details"><a href="/properties/show.php?id=<?php echo $property['id'] ?>" data-bs-original-title="" title="">
                                                                <h6><?php echo $property['neighborhood'] ?></h6>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td class="img-content-box">
                                                <h6><?php echo $property['property_type'] ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $property['transaction_type'] ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $property['file_id'] ?></h6>
                                            </td>


                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $sql = 'SELECT * FROM `experts` ORDER BY id DESC LIMIT 5';
            $stmt = $conn->prepare($sql);
            $experts = $stmt->execute()->fetchAllAssociative();
            ?>
            <div class="col-xl-4 col-md-12">
                <div class="card ongoing-project recent-orders">
                    <div class="card-header card-no-border">
                        <div class="media media-dashboard">
                            <div class="media-body">
                                <h5 class="mb-0">کارشناس های اخیر</h5>
                            </div>

                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th> <span>نام</span></th>
                                        <th> <span>شماره تلفن</span></th>
                                        <th> <span>ادمین </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($experts as $expert) : ?>

                                        <tr>

                                            <td class="img-content-box">

                                                <div class="media">
                                                    <div class="media-body ps-2">
                                                        <div class="avatar-details"><a href="/experts/show.php?id=<?php echo $expert['id'] ?>" data-bs-original-title="" title="">
                                                                <h6> <?php echo $expert['name'] ?> </h6>
                                                        </div>
                                                    </div>

                                            </td>

                                            <td>
                                                <h6><?php echo $expert['phone_number'] ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo $expert['is_admin'] ? 'بله' : 'خیر' ?></h6>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php $sql = 'SELECT * FROM `users` ORDER BY id DESC LIMIT 5';
            $stmt = $conn->prepare($sql);
            $users = $stmt->execute()->fetchAllAssociative();
            ?>
            <div class="col-xl-4 col-md-12">
                <div class="card ongoing-project recent-orders">
                    <div class="card-header card-no-border">
                        <div class="media media-dashboard">
                            <div class="media-body">
                                <h5 class="mb-0">مشتری های اخیر</h5>
                            </div>

                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th> <span>نام</span></th>
                                        <th> <span>شماره تلفن</span></th>
                                        <th> <span>گروه </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) : ?>

                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body ps-2">
                                                        <div class="avatar-details"><a href="/properties/show.php?id=<?php echo $property['id'] ?>" data-bs-original-title="" title="">
                                                                <h6><?php echo $user['name'] ?></h6>
                                                        </div>
                                                    </div>
                                            </td>
                                            <td class="img-content-box">
                                                <h6><?php echo $user['phone_number'] ?></h6>
                                            </td>
                                            <td>
                                                <h6><?php echo json_decode($user['type'], true)[0] ?></h6>
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
    </div>
</div>
<!-- Container-fluid Ends-->
</div>


</div>

<?php partial('footer') ?>
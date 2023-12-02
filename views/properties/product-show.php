<?php partial('header'); ?>
<style>
    .hidden {
        display: none;
    }
</style>


<?php partial('sidebar'); ?>
<?php $sql = 'SELECT * FROM `properties` WHERE id =' . $_GET['id'];
$stmt = $conn->prepare($sql);
$property = $stmt->execute()->fetchAssociative();


$sql = 'SELECT expert_id FROM `expert_property` WHERE property_id =' . $_GET['id'];
$stmt = $conn->prepare($sql);
$expert_ids = $stmt->execute()->fetchAllAssociative();
$ids = [];
foreach ($expert_ids as $expert_id) {
    $ids[] = $expert_id['expert_id'];
}
$experts = [];
if (!is_null($ids) && !empty($ids)) {
    $sql = "SELECT * FROM experts
    WHERE id IN (" . implode(',', $ids) . ")";
    $stmt = $conn->prepare($sql);
    $experts = $stmt->execute()->fetchAllAssociative();
}

?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>صفحه محصول</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">فروشگاه</li>
                    <li class="breadcrumb-item active">صفحه محصول</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div>
        <div class="row product-page-main p-0">
            <div class="col-xl-5 col-md-6 box-col-6 xl-50">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-9 box-col-7 product-main">
                                <div class="pro-slide-single">
                                    <?php if ($property['files'] == 'none') : ?>
                                        <img class="img-fluid" src="https://www.bhg.com/thmb/H9VV9JNnKl-H1faFXnPlQfNprYw=/1799x0/filters:no_upscale():strip_icc()/white-modern-house-curved-patio-archway-c0a4a3b3-aa51b24d14d0464ea15d36e05aa85ac9.jpg" alt="">
                                    <?php else : ?>
                                        <?php foreach (json_decode($property['files'], true) as $file) : ?>

                                            <div><img class="img-fluid" src="./../../files/<?php echo $file ?>" alt=""></div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="col-xl-3 box-col-4 product-thumbnail">
                                <div class="pro-slide-right">
                                    <?php foreach (json_decode($property['files'], true) as $file) : ?>

                                        <div>
                                            <div class="slide-box"><img src="./../../files/<?php echo $file ?>" style="max-width:100px;" alt=""></div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 box-col-12 proorder-xl-3 xl-100">
                <div class="card">
                    <div class="card-body">
                        <div class="pro-group pt-0 border-0">
                            <div class="product-page-details mt-0">
                                <h3><?php echo $property['neighborhood'] ?></h3>

                            </div>
                            <div class="product-price">
                                <?php echo $property['property_type'] ?>
                            </div>

                        </div>
                        <div class="pro-group">
                            <p><?php echo $property['address'] ?></p>
                        </div>
                        <div class="pro-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td> <b>نوع معامله &nbsp;: &nbsp;</b></td>
                                                <td class="txt-success"><?php echo $property['transaction_type'] ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td> <b>مالک &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;:
                                                        &nbsp;&nbsp;&nbsp;</b></td>
                                                <td><?php echo $property['owner'] ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php if(!empty($experts)):?>
            <div class="col-xl-2 col-md-6 box-col-6 xl-50 proorder-lg-1">
                <div class="card">
                    <div class="card-body">
                        <!-- side-bar colleps block stat-->
                        <div class="filter-block">
                            <h4>کارشناسان </h4>
                            <ul>
                                <?php foreach ($experts as $expert) : ?>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Raymond"><?php echo $expert['name'] ?></label>
                                        </div>
                                    </li>
                                <?php endforeach ?>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <?php endif?>
        </div>
    </div>
    <div class="card">
        <div class="row product-page-main">
            <div class="col-sm-12">
                <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">


                    <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="true">جزئیات</a>
                        <div class="material-border"></div>
                    </li>

                </ul>
                <div class="tab-content" id="top-tabContent">
                    <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                        <div class="card">

                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data" action="../properties/update.php?id=<?php echo $_GET['id'] ?>" class="theme-form">
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">نوع معامله</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['transaction_type'] == 'فروش' ? 'checked' : '' ?> name="transaction_type" value="فروش">
                                                <span class="checkmark">فروش</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['transaction_type'] == 'مشارکت' ? 'checked' : '' ?> name="transaction_type" value="مشارکت">
                                                <span class="checkmark">مشارکت</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['transaction_type'] == 'اجاره' ? 'checked' : '' ?> name="transaction_type" value="اجاره">
                                                <span class="checkmark">اجاره</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="transaction_type" <?php echo $property['transaction_type'] == 'پیش فروش' ? 'checked' : '' ?> value="پیش فروش">
                                                <span class="checkmark">پیش فروش</span>
                                            </label>

                                        </div>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">نوع ملک</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="appartment" class="property_type" <?php echo $property['property_type'] == 'آپارتمان' ? 'checked' : '' ?> name="property_type" value="آپارتمان">
                                                <span class="checkmark">آپارتمان</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="villa" class="property_type" <?php echo $property['property_type'] == 'ویلا' ? 'checked' : '' ?> name="property_type" value="ویلا">
                                                <span class="checkmark">ویلا</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="yard" class="property_type" <?php echo $property['property_type'] == 'حیاط خانه دار' ? 'checked' : '' ?> name="property_type" value="خانه حیاط دار">
                                                <span class="checkmark">خانه حیاط دار</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="land" class="property_type" <?php echo $property['property_type'] == 'زمین' ? 'checked' : '' ?> name="property_type" value="زمین">
                                                <span class="checkmark">زمین</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="office" class="property_type" <?php echo $property['property_type'] == 'دفتر کار' ? 'checked' : '' ?> name="property_type" value="دفتر کار">
                                                <span class="checkmark">دفتر کار</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="shop" class="property_type" <?php echo $property['property_type'] == 'مغازه' ? 'checked' : '' ?> name="property_type" value="مغازه">
                                                <span class="checkmark">مغازه</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="estate" class="property_type" <?php echo $property['property_type'] == 'مستغلات' ? 'checked' : '' ?> name="property_type" value="مستغلات">
                                                <span class="checkmark">مستغلات</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="pick" class="property_type" <?php echo $property['property_type'] == 'کلنگی' ? 'checked' : '' ?> name="property_type" value="کلنگی">
                                                <span class="checkmark">کلنگی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" id="store" class="property_type" name="property_type" <?php echo $property['property_type'] == 'انبار' ? 'checked' : '' ?> value="انبار">
                                                <span class="checkmark">انبار</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">شناسه فایل</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="inputnumber" name="file_id" type="text" value="<?php echo $property['file_id'] ?>" placeholder="شناسه فایل">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">نام مالک</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="text" name="owner" value="<?php echo $property['owner'] ?>" type="text" placeholder="نام مالک">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">شماره همراه</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" type="text" id="Website" value="<?php echo $property['phone_number'] ?> " name="phone_number" placeholder="شماره همراه">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">تلفن ثابت</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" type="text" value="<?php echo $property['landline_phone'] ?>" name="landline_phone" placeholder="تلفن ثابت">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">قدرالسهم</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" type="text" value="<?php echo $property['share_amount'] ?>" name="share_amount" placeholder="قدرالسهم">
                                        </div>
                                    </div>
                                    <div class="mb-3 row feature villa villa land pick store">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ زمین (متر مربع)</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" type="text" name="land_size" value="<?php echo $property['land_size'] ?> " placeholder="متراژ زمین (متر مربع)">
                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden shop">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ کف مغازه (متر مربع)</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" type="text" name="shop_size" value="<?php echo $property['shop_size'] ?>" placeholder="متراژ زمین (متر مربع)">
                                        </div>
                                    </div>
                                    <div class="mb-3 row feature villa yard hidden pick store">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ بنا (متر مربع)</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" type="text" name="building_size" value="<?php echo $property['building_size'] ?>" placeholder="متراژ بنا (متر مربع)">
                                        </div>
                                    </div>

                                    <div class="mb-3 row feature villa hidden yard">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">تعداد اتاق</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" type="text" name="room_number" value="<?php echo $property['room_number'] ?>" placeholder="تعداد اتاق">
                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden shop">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">طبقه</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" name="floor" type="text" value="<?php echo $property['floor'] ?>" placeholder="طبقه">
                                        </div>
                                    </div>
                                    <div class="mb-3 row feature villa hidden">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">بالکن (متر مربع)</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" name="balcony" type="text" value="<?php echo $property['balcony'] ?>" placeholder="بالکن (متر مربع)">
                                        </div>
                                    </div>
                                    <div class="mb-3 row feature  hidden">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">انبار</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" name="store" type="text" value="<?php echo $property['store'] ?>" placeholder="انبار">
                                        </div>
                                    </div>
                                    <div class="mb-3 row feature villa hidden yard">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">عمر بنا (سال)</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" name="lifetime" type="text" value="<?php echo $property['lifetime'] ?>" placeholder="عمر بنا (سال)">
                                        </div>
                                    </div>
                                    <div class="mb-3 row  ">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">قیمت هر متر (تومان)</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" type="text" name="meter_price" value="<?php echo $property['meter_price'] ?> " placeholder="قیمت هر متر (تومان)">
                                        </div>
                                    </div>
                                    <div class="mb-3 row   ">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">قیمت کل (تومان)</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" name="total_price" type="text" value="<?php echo $property['total_price'] ?>" placeholder="قیمت کل (تومان)">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">نام محله یا خیابان اصلی</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" name="neighborhood" type="text" value="<?php echo $property['neighborhood'] ?>" placeholder="نام محله یا خیابان اصلی">
                                        </div>
                                    </div>
                                    <div class="mb-3 row  ">
                                        <label class="col-sm-3 col-form-label" for="inputPassword3">آدرس دقیق</label>
                                        <div class="col-sm-9">
                                            <input disabled class="form-control" id="Website" name="address" type="text" value="<?php echo $property['address'] ?>" placeholder="آدرس دقیق">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">موقعیت ملک</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['position'] == 'داخل کوچه' ? 'checked' : '' ?> name="position" value="داخل کوچه">
                                                <span class="checkmark">داخل کوچه</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['position'] == 'بر اصلی' ? 'checked' : '' ?> name="position" value="بر اصلی">
                                                <span class="checkmark">بر اصلی</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">جهت واحد</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="direction" <?php echo $property['direction'] == 'شمالی' ? 'checked' : '' ?> value="شمالی">
                                                <span class="checkmark">شمالی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="direction" <?php echo $property['direction'] == 'جنوبی' ? 'checked' : '' ?> value="جنوبی">
                                                <span class="checkmark">جنوبی</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden villa yard shop pick">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">مشخصه ملک</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" <?php echo in_array('دوبلکس', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]" value="دوبلکس">
                                                <span class="checkmark">دوبلکس</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" <?php echo in_array('پینت هاوس', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]" value="پینت هاوس">
                                                <span class="checkmark">پینت هاوس</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" <?php echo in_array('فول امکانات', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]" value="فول امکانات">
                                                <span class="checkmark">فول امکانات</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" <?php echo in_array('تریبلکس', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]" value="تریبلکس">
                                                <span class="checkmark">تریبلکس</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" <?php echo in_array('ساحلی', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]" value="ساحلی">
                                                <span class="checkmark">ساحلی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" <?php echo in_array('اختلاف سطح', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]" value="اختلاف سطح">
                                                <span class="checkmark">اختلاف سطح</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" <?php echo in_array('بازسازی شده', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]" value="بازسازی شده">
                                                <span class="checkmark">بازسازی شده</span>
                                            </label>

                                        </div>
                                    </div>




                                    <div class="mb-3 row feature hidden land pick">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">نوع زمین</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'مسکونی' ? 'checked' : '' ?> name="land_type" value="مسکونی">
                                                <span class="checkmark">مسکونی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'تجاری' ? 'checked' : '' ?> name="land_type" value="تجاری">
                                                <span class="checkmark">تجاری</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'باغ' ? 'checked' : '' ?> name="land_type" value="باغ">
                                                <span class="checkmark">باغ</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'خدماتی' ? 'checked' : '' ?> name="land_type" value="خدماتی">
                                                <span class="checkmark">خدماتی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'فرهنگی' ? 'checked' : '' ?> name="land_type" value="فرهنگی">
                                                <span class="checkmark">فرهنگی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'مزروعی' ? 'checked' : '' ?> name="land_type" value="مزروعی">
                                                <span class="checkmark">مزروعی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'صنعتی' ? 'checked' : '' ?> name="land_type" value="صنعتی">
                                                <span class="checkmark">صنعتی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['شهری'] == 'مسکونی' ? 'checked' : '' ?> name="land_type" value="شهری">
                                                <span class="checkmark">شهری</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['شهرکی'] == 'مسکونی' ? 'checked' : '' ?> name="land_type" value="شهرکی">
                                                <span class="checkmark">شهرکی</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden land">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3"></label>

                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'ساحلی' ? 'checked' : '' ?> name="land_type" value="ساحلی">
                                                <span class="checkmark">ساحلی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'داخل بافت' ? 'checked' : '' ?> name="land_type" value="داخل بافت">
                                                <span class="checkmark">داخل بافت</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" <?php echo $property['land_type'] == 'خارج بافت' ? 'checked' : '' ?> name="land_type" value="خارج بافت">
                                                <span class="checkmark">خارج بافت</span>
                                            </label>

                                        </div>
                                    </div>



                                    <div class="mb-3 row feature hidden villa yard">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">نمای ساختمان</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'چوب' ? 'checked' : '' ?> value="چوب">
                                                <span class="checkmark">چوب</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'کلاسیک' ? 'checked' : '' ?> value="کلاسیک">
                                                <span class="checkmark">کلاسیک</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'مدرن' ? 'checked' : '' ?> value="مدرن">
                                                <span class="checkmark">مدرن</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'سنگ' ? 'checked' : '' ?> value="سنگ">
                                                <span class="checkmark">سنگ</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'سیمان' ? 'checked' : '' ?> value="سیمان">
                                                <span class="checkmark">سیمان</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'آجر' ? 'checked' : '' ?> value="آجر">
                                                <span class="checkmark">آجر</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'کامپوزیت' ? 'checked' : '' ?> value="کامپوزیت">
                                                <span class="checkmark">کامپوزیت</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'شیشه' ? 'checked' : '' ?> value="شیشه">
                                                <span class="checkmark">شیشه</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="building_facade" <?php echo $property['building_facade'] == 'ترکیبی' ? 'checked' : '' ?> value="ترکیبی">
                                                <span class="checkmark">ترکیبی</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden villa">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">مشاعات</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('آسانسور', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="آسانسور">
                                                <span class="checkmark">آسانسور</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('لابی', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="لابی">
                                                <span class="checkmark">لابی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('روف گاردن', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="روف گاردن">
                                                <span class="checkmark">روف گاردن</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('کارواش', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="کارواش">
                                                <span class="checkmark">کارواش</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('سالن اجتماعات', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="سالن اجتماعات">
                                                <span class="checkmark">سالن اجتماعات</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('سالن ورزشی', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="سالن ورزشی">
                                                <span class="checkmark">سالن ورزشی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('استخر', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="استخر">
                                                <span class="checkmark">استخر</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('سونا', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="سونا">
                                                <span class="checkmark">سونا</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="checkbox" name="joints[]" <?php echo in_array('جکوزی', json_decode($property['joints'], true))  ? 'checked' : '' ?> value="جکوزی">
                                                <span class="checkmark">جکوزی</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden villa yard">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">تاسیسات گرمایشی و سرمایشی</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'اسپلیت' ? 'checked' : '' ?> value="اسپلیت">
                                                <span class="checkmark">اسپلیت</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'داکت اسپلیت' ? 'checked' : '' ?> value="داکت اسپلیت">
                                                <span class="checkmark">داکت اسپلیت</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'کولر آبی' ? 'checked' : '' ?> value="کولر آبی">
                                                <span class="checkmark">کولر آبی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'پکیج و رادیاتور' ? 'checked' : '' ?> value="پکیج و رادیاتور">
                                                <span class="checkmark">پکیج و رادیاتور</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'گرمایش از کف' ? 'checked' : '' ?> value="گرمایش از کف">
                                                <span class="checkmark">گرمایش از کف</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'بخاری' ? 'checked' : '' ?> value="بخاری">
                                                <span class="checkmark">بخاری</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'هواساز' ? 'checked' : '' ?> value="هواساز">
                                                <span class="checkmark">هواساز</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'موتورخانه مرکزی' ? 'checked' : '' ?> value="موتورخانه مرکزی">
                                                <span class="checkmark">موتورخانه مرکزی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="facilities" <?php echo $property['facilities'] == 'چیلر' ? 'checked' : '' ?> value="چیلر">
                                                <span class="checkmark">چیلر</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden villa yard">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">پوشش از کف</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'سرامیک' ? 'checked' : '' ?> value="سرامیک">
                                                <span class="checkmark">سرامیک</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'پارکت' ? 'checked' : '' ?> value="پارکت">
                                                <span class="checkmark">پارکت</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'موکت' ? 'checked' : '' ?> value="موکت">
                                                <span class="checkmark">موکت</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'سنگ' ? 'checked' : '' ?> value="سنگ">
                                                <span class="checkmark">سنگ</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'موزاییک' ? 'checked' : '' ?> value="موزاییک">
                                                <span class="checkmark">موزاییک</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'سیمان' ? 'checked' : '' ?> value="سیمان">
                                                <span class="checkmark">سیمان</span>
                                            </label>

                                        </div>

                                    </div>
                                    <div class="mb-3 row feature hidden villa yard">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">آشپزخانه</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" <?php echo $property['kitchen'] == 'MDF' ? 'checked' : '' ?> value="MDF">
                                                <span class="checkmark">MDF</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="چوب" <?php echo $property['kitchen'] == 'چوب' ? 'checked' : '' ?>>
                                                <span class="checkmark">چوب</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="فلزی" <?php echo $property['kitchen'] == 'فلزی' ? 'checked' : '' ?>>
                                                <span class="checkmark">فلزی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="جزیره" <?php echo $property['kitchen'] == 'جزیره' ? 'checked' : '' ?>>
                                                <span class="checkmark">جزیره</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="مدرن" <?php echo $property['kitchen'] == 'مدرن' ? 'checked' : '' ?>>
                                                <span class="checkmark">مدرن</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="کلاسیک" <?php echo $property['kitchen'] == 'کلاسیک' ? 'checked' : '' ?>>
                                                <span class="checkmark">کلاسیک</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="صفحه سنگ" <?php echo $property['kitchen'] == 'صفحه سنگ' ? 'checked' : '' ?>>
                                                <span class="checkmark">صفحه سنگ</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="صفحه کورین" <?php echo $property['kitchen'] == 'صفحه کورین' ? 'checked' : '' ?>>
                                                <span class="checkmark">صفحه کورین</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="صفحه چوب" <?php echo $property['kitchen'] == 'صفحه چوب' ? 'checked' : '' ?>>
                                                <span class="checkmark">صفحه چوب</span>
                                            </label>

                                        </div>



                                    </div>
                                    <div class="mb-3 row feature hidden villa">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3"></label>


                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="اپن" <?php echo $property['kitchen'] == 'اپن' ? 'checked' : '' ?>>
                                                <span class="checkmark">اپن</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="لاندری" <?php echo $property['kitchen'] == 'لاندری' ? 'checked' : '' ?>>
                                                <span class="checkmark">لاندری</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="فول فرنیش" <?php echo $property['kitchen'] == 'فول فرنیش' ? 'checked' : '' ?>>
                                                <span class="checkmark">فول فرنیش</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="هود" <?php echo $property['kitchen'] == 'هود' ? 'checked' : '' ?>>
                                                <span class="checkmark">هود</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="گاز رو میزی" <?php echo $property['kitchen'] == 'گاز رو میزی' ? 'checked' : '' ?>>
                                                <span class="checkmark">گاز رو میزی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="kitchen" value="مطبخ" <?php echo $property['kitchen'] == 'مطبخ' ? 'checked' : '' ?>>
                                                <span class="checkmark">مطبخ</span>
                                            </label>

                                        </div>
                                    </div>


                                    <div class="mb-3 row feature hidden villa yard shop">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">سرویس بهداشتی و حمام</label>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="bathroom" value="ایرانی" <?php echo $property['bathroom'] == 'ایرانی' ? 'checked' : '' ?>>
                                                <span class="checkmark">ایرانی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="bathroom" value="فرنگی" <?php echo $property['bathroom'] == 'فرنگی' ? 'checked' : '' ?>>
                                                <span class="checkmark">فرنگی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="bathroom" value="وان" <?php echo $property['bathroom'] == 'وان' ? 'checked' : '' ?>=>
                                                <span class="checkmark">وان</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" name="bathroom" value="جکوزی" <?php echo $property['bathroom'] == 'جکوزی' ? 'checked' : '' ?>>
                                                <span class="checkmark">جکوزی</span>
                                            </label>

                                        </div>
                                    </div>
                                    <div class="mb-3 row feature hidden villa yard shop">
                                        <label class="col-sm-3 col-form-label" for="inputEmail3">نوع دیوار</label>

                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" value="نقاشی" name="wall" <?php echo $property['wall'] == 'نقاشی' ? 'checked' : '' ?>> <span class="checkmark">نقاشی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" value="گچ" name="wall" <?php echo $property['wall'] == 'گچ' ? 'checked' : '' ?>>
                                                <span class="checkmark">گچ</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" value="سنگ" <?php echo $property['wall'] == 'سنگ' ? 'checked' : '' ?>>
                                                <span class="checkmark">سنگ</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" value="پارچه کوبی" <?php echo $property['wall'] == 'پارچه کوبی' ? 'checked' : '' ?> name="wall">
                                                <span class="checkmark">پارچه کوبی</span>
                                            </label>

                                        </div>
                                        <div class="col-sm-1 ">
                                            <label class="custom-checkbox">
                                                <input disabled type="radio" value="چوبکاری" name="wall" <?php echo $property['wall'] == 'چوبکاری' ? 'checked' : '' ?>>
                                                <span class="checkmark">چوبکاری</span>
                                            </label>

                                        </div>




                                    </div>




                                </form>
                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <!-- Container-fluid Ends-->
</div>
<script>
    var radioButtons = document.querySelectorAll('.property_type');
    var features = document.getElementsByClassName('feature');

    for (var i = 0; i < features.length; i++) {
        features[i].classList.add('hidden');
    }
    if (document.getElementById('appartment').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('feature'))
                features[i].classList.remove('hidden');
        }

    }
    if (document.getElementById('villa').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('villa'))
                features[i].classList.remove('hidden');
        }

    }
    if (document.getElementById('yard').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('yard'))
                features[i].classList.remove('hidden');
        }

    }
    if (document.getElementById('land').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('land'))
                features[i].classList.remove('hidden');
        }

    }
    if (document.getElementById('office').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('feature'))
                features[i].classList.remove('hidden');
        }

    }
    if (document.getElementById('shop').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('feature'))
                features[i].classList.remove('hidden');
        }

    }
    if (document.getElementById('estate').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('feature'))
                features[i].classList.remove('hidden');
        }

    }
    if (document.getElementById('pick').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('feature'))
                features[i].classList.remove('hidden');
        }

    }
    if (document.getElementById('store').checked) {
        for (var i = 0; i < features.length; i++) {
            if (features[i].classList.contains('feature'))
                features[i].classList.remove('hidden');
        }

    }
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
            for (var i = 0; i < features.length; i++) {
                features[i].classList.add('hidden');
            }

            for (var i = 0; i < features.length; i++) {
                if (this.checked) {
                    if (
                        (this.value === "آپارتمان" && features[i].classList.contains('feature')) ||
                        (this.value === "ویلا" && features[i].classList.contains('villa')) ||
                        (this.value === "خانه حیاط دار" && features[i].classList.contains('yard')) ||
                        (this.value === "زمین" && features[i].classList.contains('land')) ||
                        (this.value === "دفتر کار" && features[i].classList.contains('feature')) ||
                        (this.value === "مغازه" && features[i].classList.contains('shop')) ||
                        (this.value === "مستغلات" && features[i].classList.contains('feature')) ||
                        (this.value === "کلنگی" && features[i].classList.contains('pick')) ||
                        (this.value === "انبار" && features[i].classList.contains('store'))




                    ) {
                        features[i].classList.remove('hidden');
                    }
                }
            }
        });
    });
</script>
<?php partial('footer') ?>
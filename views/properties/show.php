<?php partial('header'); ?>
<style>
    .hidden {
        display: none;
    }
</style>


<?php partial('sidebar'); ?>
<?php $sql = 'SELECT * FROM `properties` WHERE id =' . $_GET['id'];
$stmt = $conn->prepare($sql);
$property = $stmt->execute()->fetchAssociative(); ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>فرم ایجاد ملک</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg></a></li>
                    <li class="breadcrumb-item"> املاک</li>
                    <li class="breadcrumb-item active"> ایجاد ملک</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['failed'])) : ?>
    <div class="alert alert-danger"><?php echo $_SESSION['failed'];
                                    unset($_SESSION['failed']) ?></div>
<?php endif; ?>
<!-- Container-fluid starts -->
<div class="container-fluid">

    <div class="card">

        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="../../properties/update.php?id=<?php echo $_GET['id'] ?>" class="theme-form">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع معامله</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" <?php echo $property['transaction_type'] == 'فروش' ? 'checked' : '' ?> name="transaction_type"  value="فروش">
                            <span class="checkmark">فروش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" <?php echo $property['transaction_type'] == 'مشارکت' ? 'checked' : '' ?> name="transaction_type"      disabled   value="مشارکت">
                            <span class="checkmark">مشارکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" <?php echo $property['transaction_type'] == 'اجاره' ? 'checked' : '' ?> name="transaction_type"      disabled   value="اجاره">
                            <span class="checkmark">اجاره</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="transaction_type" <?php echo $property['transaction_type'] == 'پیش فروش' ? 'checked' : '' ?>      disabled   value="پیش فروش">
                            <span class="checkmark">پیش فروش</span>
                        </label>

                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="appartment" class="property_type" <?php echo $property['property_type'] == 'آپارتمان' ? 'checked' : '' ?> name="property_type"      disabled   value="آپارتمان">
                            <span class="checkmark">آپارتمان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="villa" class="property_type" <?php echo $property['property_type'] == 'ویلا' ? 'checked' : '' ?> name="property_type"      disabled   value="ویلا">
                            <span class="checkmark">ویلا</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="yard" class="property_type" <?php echo $property['property_type'] == 'حیاط خانه دار' ? 'checked' : '' ?> name="property_type"      disabled   value="خانه حیاط دار">
                            <span class="checkmark">خانه حیاط دار</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="land" class="property_type" <?php echo $property['property_type'] == 'زمین' ? 'checked' : '' ?> name="property_type"      disabled   value="زمین">
                            <span class="checkmark">زمین</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="office" class="property_type" <?php echo $property['property_type'] == 'دفتر کار' ? 'checked' : '' ?> name="property_type"      disabled   value="دفتر کار">
                            <span class="checkmark">دفتر کار</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="shop" class="property_type" <?php echo $property['property_type'] == 'مغازه' ? 'checked' : '' ?> name="property_type"      disabled   value="مغازه">
                            <span class="checkmark">مغازه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="estate" class="property_type" <?php echo $property['property_type'] == 'مستغلات' ? 'checked' : '' ?> name="property_type"      disabled   value="مستغلات">
                            <span class="checkmark">مستغلات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="pick" class="property_type" <?php echo $property['property_type'] == 'کلنگی' ? 'checked' : '' ?> name="property_type"      disabled   value="کلنگی">
                            <span class="checkmark">کلنگی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" id="store" class="property_type" name="property_type" <?php echo $property['property_type'] == 'انبار' ? 'checked' : '' ?>      disabled   value="انبار">
                            <span class="checkmark">انبار</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">شناسه فایل</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="inputnumber" name="file_id" type="text"      disabled   value="<?php echo $property['file_id'] ?>" placeholder="شناسه فایل">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">نام مالک</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="text" name="owner"      disabled   value="<?php echo $property['owner'] ?>" type="text" placeholder="نام مالک">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">شماره همراه</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" id="Website"      disabled   value="<?php echo $property['phone_number'] ?> " name="phone_number" placeholder="شماره همراه">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تلفن ثابت</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text"      disabled   value="<?php echo $property['landline_phone'] ?>" name="landline_phone" placeholder="تلفن ثابت">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قدرالسهم</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text"      disabled   value="<?php echo $property['share_amount'] ?>" name="share_amount" placeholder="قدرالسهم">
                    </div>
                </div>
                <div class="mb-3 row feature villa villa land pick store">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ زمین (متر مربع)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="land_size"      disabled   value="<?php echo $property['land_size'] ?> " placeholder="متراژ زمین (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row feature hidden shop">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ کف مغازه (متر مربع)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="shop_size"      disabled   value="<?php echo $property['shop_size'] ?>" placeholder="متراژ زمین (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row feature villa yard hidden pick store">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ بنا (متر مربع)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="building_size"      disabled   value="<?php echo $property['building_size'] ?>" placeholder="متراژ بنا (متر مربع)">
                    </div>
                </div>

                <div class="mb-3 row feature villa hidden yard">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تعداد اتاق</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="room_number"      disabled   value="<?php echo $property['room_number'] ?>" placeholder="تعداد اتاق">
                    </div>
                </div>
                <div class="mb-3 row feature hidden shop">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">طبقه</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="floor" type="text"      disabled   value="<?php echo $property['floor'] ?>" placeholder="طبقه">
                    </div>
                </div>
                <div class="mb-3 row feature villa hidden">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">بالکن (متر مربع)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="balcony" type="text"      disabled   value="<?php echo $property['balcony'] ?>" placeholder="بالکن (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row feature  hidden">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">انبار</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="store" type="text"      disabled   value="<?php echo $property['store'] ?>" placeholder="انبار">
                    </div>
                </div>
                <div class="mb-3 row feature villa hidden yard">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">عمر بنا (سال)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="lifetime" type="text"      disabled   value="<?php echo $property['lifetime'] ?>" placeholder="عمر بنا (سال)">
                    </div>
                </div>
                <div class="mb-3 row  ">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قیمت هر متر (تومان)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="meter_price"      disabled   value="<?php echo $property['meter_price'] ?> " placeholder="قیمت هر متر (تومان)">
                    </div>
                </div>
                <div class="mb-3 row   ">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قیمت کل (تومان)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="total_price" type="text"      disabled   value="<?php echo $property['total_price'] ?>" placeholder="قیمت کل (تومان)">
                    </div>
                </div>
                <div class="mb-3 row ">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">نام محله یا خیابان اصلی</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="neighborhood" type="text"      disabled   value="<?php echo $property['neighborhood'] ?>" placeholder="نام محله یا خیابان اصلی">
                    </div>
                </div>
                <div class="mb-3 row  ">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">آدرس دقیق</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="address" type="text"      disabled   value="<?php echo $property['address'] ?>" placeholder="آدرس دقیق">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">موقعیت ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" <?php echo $property['position'] == 'داخل کوچه' ? 'checked' : '' ?> name="position"      disabled   value="داخل کوچه">
                            <span class="checkmark">داخل کوچه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" <?php echo $property['position'] == 'بر اصلی' ? 'checked' : '' ?> name="position"      disabled   value="بر اصلی">
                            <span class="checkmark">بر اصلی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row feature hidden">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">جهت واحد</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="direction" <?php echo $property['direction'] == 'شمالی' ? 'checked' : '' ?>      disabled   value="شمالی">
                            <span class="checkmark">شمالی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="direction" <?php echo $property['direction'] == 'جنوبی' ? 'checked' : '' ?>      disabled   value="جنوبی">
                            <span class="checkmark">جنوبی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row feature hidden villa yard shop pick">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">مشخصه ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo in_array('دوبلکس', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]"      disabled   value="دوبلکس">
                            <span class="checkmark">دوبلکس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo in_array('پینت هاوس', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]"      disabled   value="پینت هاوس">
                            <span class="checkmark">پینت هاوس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo in_array('فول امکانات', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]"      disabled   value="فول امکانات">
                            <span class="checkmark">فول امکانات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo in_array('تریبلکس', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]"      disabled   value="تریبلکس">
                            <span class="checkmark">تریبلکس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo in_array('ساحلی', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]"      disabled   value="ساحلی">
                            <span class="checkmark">ساحلی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo in_array('اختلاف سطح', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]"      disabled   value="اختلاف سطح">
                            <span class="checkmark">اختلاف سطح</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo in_array('بازسازی شده', json_decode($property['characteristic'], true))  ? 'checked' : '' ?> name="characteristic[]"      disabled   value="بازسازی شده">
                            <span class="checkmark">بازسازی شده</span>
                        </label>

                    </div>
                </div>




                <div class="mb-3 row feature hidden land pick">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع زمین</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'مسکونی' ? 'checked' : '' ?> name="land_type"      disabled   value="مسکونی">
                            <span class="checkmark">مسکونی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'تجاری' ? 'checked' : '' ?> name="land_type"      disabled   value="تجاری">
                            <span class="checkmark">تجاری</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'باغ' ? 'checked' : '' ?> name="land_type"      disabled   value="باغ">
                            <span class="checkmark">باغ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'خدماتی' ? 'checked' : '' ?> name="land_type"      disabled   value="خدماتی">
                            <span class="checkmark">خدماتی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'فرهنگی' ? 'checked' : '' ?> name="land_type"      disabled   value="فرهنگی">
                            <span class="checkmark">فرهنگی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'مزروعی' ? 'checked' : '' ?> name="land_type"      disabled   value="مزروعی">
                            <span class="checkmark">مزروعی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'صنعتی' ? 'checked' : '' ?> name="land_type"      disabled   value="صنعتی">
                            <span class="checkmark">صنعتی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['شهری'] == 'مسکونی' ? 'checked' : '' ?> name="land_type"      disabled   value="شهری">
                            <span class="checkmark">شهری</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['شهرکی'] == 'مسکونی' ? 'checked' : '' ?> name="land_type"      disabled   value="شهرکی">
                            <span class="checkmark">شهرکی</span>
                        </label>
                    </div>
                </div>
                <div class="mb-3 row feature hidden land">
                    <label class="col-sm-3 col-form-label" for="inputEmail3"></label>

                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'ساحلی' ? 'checked' : '' ?> name="land_type"      disabled   value="ساحلی">
                            <span class="checkmark">ساحلی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'داخل بافت' ? 'checked' : '' ?> name="land_type"      disabled   value="داخل بافت">
                            <span class="checkmark">داخل بافت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" <?php echo $property['land_type'] == 'خارج بافت' ? 'checked' : '' ?> name="land_type"      disabled   value="خارج بافت">
                            <span class="checkmark">خارج بافت</span>
                        </label>

                    </div>
                </div>



                <div class="mb-3 row feature hidden villa yard">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نمای ساختمان</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'چوب' ? 'checked' : '' ?>      disabled   value="چوب">
                            <span class="checkmark">چوب</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'کلاسیک' ? 'checked' : '' ?>      disabled   value="کلاسیک">
                            <span class="checkmark">کلاسیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'مدرن' ? 'checked' : '' ?>     disabled   value="مدرن">
                            <span class="checkmark">مدرن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'سنگ' ? 'checked' : '' ?>      disabled   value="سنگ">
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'سیمان' ? 'checked' : '' ?>      disabled   value="سیمان">
                            <span class="checkmark">سیمان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'آجر' ? 'checked' : '' ?>      disabled   value="آجر">
                            <span class="checkmark">آجر</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'کامپوزیت' ? 'checked' : '' ?>      disabled   value="کامپوزیت">
                            <span class="checkmark">کامپوزیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'شیشه' ? 'checked' : '' ?>      disabled   value="شیشه">
                            <span class="checkmark">شیشه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" <?php echo $property['building_facade'] == 'ترکیبی' ? 'checked' : '' ?>     disabled   value="ترکیبی">
                            <span class="checkmark">ترکیبی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row feature hidden villa">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">مشاعات</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('آسانسور', json_decode($property['joints'], true))  ? 'checked' : '' ?>      disabled   value="آسانسور">
                            <span class="checkmark">آسانسور</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('لابی', json_decode($property['joints'], true))  ? 'checked' : '' ?>      disabled   value="لابی">
                            <span class="checkmark">لابی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('روف گاردن', json_decode($property['joints'], true))  ? 'checked' : '' ?>      disabled   value="روف گاردن">
                            <span class="checkmark">روف گاردن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('کارواش', json_decode($property['joints'], true))  ? 'checked' : '' ?>      disabled   value="کارواش">
                            <span class="checkmark">کارواش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('سالن اجتماعات', json_decode($property['joints'], true))  ? 'checked' : '' ?>      disabled   value="سالن اجتماعات">
                            <span class="checkmark">سالن اجتماعات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('سالن ورزشی', json_decode($property['joints'], true))  ? 'checked' : '' ?>      disabled   value="سالن ورزشی">
                            <span class="checkmark">سالن ورزشی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('استخر', json_decode($property['joints'], true))  ? 'checked' : '' ?>      disabled   value="استخر">
                            <span class="checkmark">استخر</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('سونا', json_decode($property['joints'], true))  ? 'checked' : '' ?>      disabled   value="سونا">
                            <span class="checkmark">سونا</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" <?php echo in_array('جکوزی', json_decode($property['joints'], true))  ? 'checked' : '' ?>     disabled   value="جکوزی">
                            <span class="checkmark">جکوزی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row feature hidden villa yard">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">تاسیسات گرمایشی و سرمایشی</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['facilities'] == 'اسپلیت' ? 'checked' : '' ?>      disabled   value="اسپلیت">
                            <span class="checkmark">اسپلیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['داکت اسپلیت'] == 'اسپلیت' ? 'checked' : '' ?>      disabled   value="داکت اسپلیت">
                            <span class="checkmark">داکت اسپلیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['facilities'] == 'کولر آبی' ? 'checked' : '' ?>     disabled   value="کولر آبی">
                            <span class="checkmark">کولر آبی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['facilities'] == 'پکیج و رادیاتور' ? 'checked' : '' ?>     disabled   value="پکیج و رادیاتور">
                            <span class="checkmark">پکیج و رادیاتور</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['facilities'] == 'گرمایش از کف' ? 'checked' : '' ?>     disabled   value="گرمایش از کف">
                            <span class="checkmark">گرمایش از کف</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['facilities'] == 'بخاری' ? 'checked' : '' ?>     disabled   value="بخاری">
                            <span class="checkmark">بخاری</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['facilities'] == 'هواساز' ? 'checked' : '' ?>     disabled   value="هواساز">
                            <span class="checkmark">هواساز</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['facilities'] == 'موتورخانه مرکزی' ? 'checked' : '' ?>     disabled   value="موتورخانه مرکزی">
                            <span class="checkmark">موتورخانه مرکزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" <?php echo $property['facilities'] == 'چیلر' ? 'checked' : '' ?>     disabled   value="چیلر">
                            <span class="checkmark">چیلر</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row feature hidden villa yard">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">پوشش از کف</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'سرامیک' ? 'checked' : '' ?>      disabled   value="سرامیک">
                            <span class="checkmark">سرامیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'پارکت' ? 'checked' : '' ?>      disabled   value="پارکت">
                            <span class="checkmark">پارکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'موکت' ? 'checked' : '' ?>      disabled   value="موکت">
                            <span class="checkmark">موکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'سنگ' ? 'checked' : '' ?>      disabled   value="سنگ">
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'موزاییک' ? 'checked' : '' ?>      disabled   value="موزاییک">
                            <span class="checkmark">موزاییک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'سیمان' ? 'checked' : '' ?>      disabled   value="سیمان">
                            <span class="checkmark">سیمان</span>
                        </label>

                    </div>

                </div>
                <div class="mb-3 row feature hidden villa yard">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">آشپزخانه</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" <?php echo $property['kitchen'] == 'MDF' ? 'checked' : '' ?>      disabled   value="MDF">
                            <span class="checkmark">MDF</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="چوب" <?php echo $property['kitchen'] == 'چوب' ? 'checked' : '' ?>>
                            <span class="checkmark">چوب</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="فلزی" <?php echo $property['kitchen'] == 'فلزی' ? 'checked' : '' ?>>
                            <span class="checkmark">فلزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="جزیره" <?php echo $property['kitchen'] == 'جزیره' ? 'checked' : '' ?>>
                            <span class="checkmark">جزیره</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="مدرن" <?php echo $property['kitchen'] == 'مدرن' ? 'checked' : '' ?>>
                            <span class="checkmark">مدرن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="کلاسیک" <?php echo $property['kitchen'] == 'کلاسیک' ? 'checked' : '' ?>>
                            <span class="checkmark">کلاسیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="صفحه سنگ" <?php echo $property['kitchen'] == 'صفحه سنگ' ? 'checked' : '' ?>>
                            <span class="checkmark">صفحه سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="صفحه کورین" <?php echo $property['kitchen'] == 'صفحه کورین' ? 'checked' : '' ?>>
                            <span class="checkmark">صفحه کورین</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="صفحه چوب" <?php echo $property['kitchen'] == 'صفحه چوب' ? 'checked' : '' ?>>
                            <span class="checkmark">صفحه چوب</span>
                        </label>

                    </div>



                </div>
                <div class="mb-3 row feature hidden villa">
                    <label class="col-sm-3 col-form-label" for="inputEmail3"></label>


                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="اپن" <?php echo $property['kitchen'] == 'اپن' ? 'checked' : '' ?>>
                            <span class="checkmark">اپن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="لاندری" <?php echo $property['kitchen'] == 'لاندری' ? 'checked' : '' ?>>
                            <span class="checkmark">لاندری</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="فول فرنیش" <?php echo $property['kitchen'] == 'فول فرنیش' ? 'checked' : '' ?>>
                            <span class="checkmark">فول فرنیش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="هود" <?php echo $property['kitchen'] == 'هود' ? 'checked' : '' ?>>
                            <span class="checkmark">هود</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="گاز رو میزی" <?php echo $property['kitchen'] == 'گاز رو میزی' ? 'checked' : '' ?>>
                            <span class="checkmark">گاز رو میزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen"      disabled   value="مطبخ" <?php echo $property['kitchen'] == 'مطبخ' ? 'checked' : '' ?>>
                            <span class="checkmark">مطبخ</span>
                        </label>

                    </div>
                </div>


                <div class="mb-3 row feature hidden villa yard shop">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">سرویس بهداشتی و حمام</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="bathroom"      disabled   value="ایرانی" <?php echo $property['bathroom'] == 'ایرانی' ? 'checked' : '' ?>>
                            <span class="checkmark">ایرانی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="bathroom"      disabled   value="فرنگی" <?php echo $property['bathroom'] == 'فرنگی' ? 'checked' : '' ?>>
                            <span class="checkmark">فرنگی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="bathroom"      disabled   value="وان" <?php echo $property['bathroom'] == 'وان' ? 'checked' : '' ?>=>
                            <span class="checkmark">وان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="bathroom"      disabled   value="جکوزی" <?php echo $property['bathroom'] == 'جکوزی' ? 'checked' : '' ?>>
                            <span class="checkmark">جکوزی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row feature hidden villa yard shop">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع دیوار</label>

                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio"      disabled   value="نقاشی" name="wall" <?php echo $property['wall'] == 'نقاشی' ? 'checked' : '' ?>> <span class="checkmark">نقاشی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio"      disabled   value="گچ" name="wall" <?php echo $property['wall'] == 'گچ' ? 'checked' : '' ?>>
                            <span class="checkmark">گچ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio"      disabled   value="سنگ" <?php echo $property['wall'] == 'سنگ' ? 'checked' : '' ?>>
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio"      disabled   value="پارچه کوبی" <?php echo $property['wall'] == 'پارچه کوبی' ? 'checked' : '' ?> name="wall">
                            <span class="checkmark">پارچه کوبی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio"      disabled   value="چوبکاری" name="wall" <?php echo $property['wall'] == 'چوبکاری' ? 'checked' : '' ?>>
                            <span class="checkmark">چوبکاری</span>
                        </label>

                    </div>




                </div>
                <?php
                $files = [];
                foreach (json_decode($property['files'], true) as $filePath) {
                    $name = explode(DIRECTORY_SEPARATOR, $filePath);
                    $files[] = $name[array_key_last($name)];
                }
                $files = implode(',', $files) ?? null;
                ?>
                <?php if (!empty($files)) : ?>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label" for="inputPassword3">فایل ها</label>
                        <div class="col-sm-9">
                            <a href="./download.php?files=<?php echo $files == null ? '' : $files ?>" class="btn btn-primary"><?php echo $files == null ? 'فایلی موجود نمیباشید' : 'دانلود فایل های پیوست' ?></a>
                        </div>
                    </div>
                <?php endif; ?>


            </form>
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
                        (this. value === "آپارتمان" && features[i].classList.contains('feature')) ||
                        (this. value === "ویلا" && features[i].classList.contains('villa')) ||
                        (this. value === "خانه حیاط دار" && features[i].classList.contains('yard')) ||
                        (this. value === "زمین" && features[i].classList.contains('land')) ||
                        (this. value === "دفتر کار" && features[i].classList.contains('feature')) ||
                        (this. value === "مغازه" && features[i].classList.contains('shop')) ||
                        (this. value === "مستغلات" && features[i].classList.contains('feature')) ||
                        (this. value === "کلنگی" && features[i].classList.contains('pick')) ||
                        (this. value === "انبار" && features[i].classList.contains('store'))




                    ) {
                        features[i].classList.remove('hidden');
                    }
                }
            }
        });
    });
</script>
<?php partial('footer') ?>
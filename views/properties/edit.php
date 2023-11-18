<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php $property = $queryBuilder
    ->select('*')
    ->from('properties')
    ->where('id = ' .  $_GET['id'])->fetchAssociative(); ?>

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>ویرایش ملک</h3>
            </div>

        </div>
    </div>
</div>
<!-- Container-fluid starts -->
<div class="container-fluid">

    <div class="card">

        <div class="card-body">
            <form method="post" action="../../properties/update.php?id=<?php echo $property['id'] ?>" class="theme-form">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع معامله</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="transaction_type" value="فروش" <?php echo $property['transaction_type'] == 'فروش' ? 'checked' : '' ?>>
                            <span class="checkmark">فروش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="transaction_type" value="مشارکت" <?php echo $property['transaction_type'] == 'مشارکت' ? 'checked' : '' ?>>
                            <span class="checkmark">مشارکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="transaction_type" value="اجاره" <?php echo $property['transaction_type'] == 'اجاره' ? 'checked' : '' ?>>
                            <span class="checkmark">اجاره</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="transaction_type" value="پیش فروش" <?php echo $property['transaction_type'] == 'پیش فروش' ? 'checked' : '' ?>>
                            <span class="checkmark">پیش فروش</span>
                        </label>

                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'اپارتمان' ? 'checked' : '' ?> value="اپارتمان">
                            <span class="checkmark">اپارتمان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'ویلا' ? 'checked' : '' ?> value="ویلا">
                            <span class="checkmark">ویلا</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'خانه حیاط دار' ? 'checked' : '' ?> value="خانه حیاط دار">
                            <span class="checkmark">خانه حیاط دار</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'زمین' ? 'checked' : '' ?> value="زمین">
                            <span class="checkmark">زمین</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'دفتر کار' ? 'checked' : '' ?> value="دفتر کار">
                            <span class="checkmark">دفتر کار</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'مغازه' ? 'checked' : '' ?> value="مغازه">
                            <span class="checkmark">مغازه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'مستغلات' ? 'checked' : '' ?> value="مستغلات">
                            <span class="checkmark">مستغلات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'کلنگی' ? 'checked' : '' ?> value="کلنگی">
                            <span class="checkmark">کلنگی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="property_type" <?php echo $property['property_type'] == 'انبار' ? 'checked' : '' ?> value="انبار">
                            <span class="checkmark">انبار</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">شناسه فایل</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="inputnumber" value="<?php echo $property['file_id'] ?>" name="file_id" type="text" placeholder="شناسه فایل">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">نام مالک</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="text" name="owner" value="<?php echo $property['owner'] ?>" type="text" placeholder="نام مالک">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">شماره همراه</label>
                    <div class="col-sm-9">
                        <input required class="form-control" type="text" id="Website" value="<?php echo $property['phone_number'] ?>" name="phone_number" placeholder="شماره همراه">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تلفن ثابت</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" value="<?php echo $property['landline_phone'] ?>" type="text" name="landline_phone" placeholder="تلفن ثابت">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ زمین (متر مربع)</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" type="text" value="<?php echo $property['land_size'] ?>" name="land_size" placeholder="متراژ زمین (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ بنا (متر مربع)</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" type="text" name="building_size" value="<?php echo $property['building_size'] ?>" placeholder="متراژ بنا (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قدرالسهم</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" type="text" value="<?php echo $property['share_amount'] ?>" name="share_amount" placeholder="قدرالسهم">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تعداد اتاق</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" type="text" name="room_number" value="<?php echo $property['room_number'] ?>" placeholder="تعداد اتاق">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">طبقه</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" name="floor" value="<?php echo $property['floor'] ?>" type="text" placeholder="طبقه">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">بالکن (متر مربع)</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" name="balcony" value="<?php echo $property['balcony'] ?>" type="text" placeholder="بالکن (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">انبار</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" name="store" value="<?php echo $property['store'] ?>" type="text" placeholder="انبار">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">عمر بنا (سال)</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" name="lifetime" value="<?php echo $property['lifetime'] ?>" type="text" placeholder="عمر بنا (سال)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قیمت هر متر (تومان)</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" type="text" value="<?php echo $property['meter_price'] ?>" name="meter_price" placeholder="قیمت هر متر (تومان)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قیمت کل (تومان)</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" name="total_price" type="text" value="<?php echo $property['total_price'] ?>" placeholder="قیمت کل (تومان)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">نام محله یا خیابان اصلی</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" name="neighborhood" type="text" value="<?php echo $property['neighborhood'] ?>" placeholder="نام محله یا خیابان اصلی">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">آدرس دقیق</label>
                    <div class="col-sm-9">
                        <input required class="form-control" id="Website" name="address" type="text" value="<?php echo $property['address'] ?>" placeholder="آدرس دقیق">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">موقعیت ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['position'] == 'داخل کوچه' ? 'checked' : '' ?> name="position" value="داخل کوچه">
                            <span class="checkmark">داخل کوچه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['position'] == 'بر اصلی' ? 'checked' : '' ?> name="position" value="بر اصلی">
                            <span class="checkmark">بر اصلی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">جهت واحد</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['direction'] == 'شمالی' ? 'checked' : '' ?> name="direction" value="شمالی">
                            <span class="checkmark">شمالی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['direction'] == 'بر اصلی' ? 'جنوبی' : '' ?> name="direction" value="جنوبی">
                            <span class="checkmark">جنوبی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">مشخصه ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" name="characteristic[]" <?php echo in_array('دوبلکس', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> value="دوبلکس">
                            <span class="checkmark">دوبلکس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" name="characteristic[]" <?php echo in_array('پینت هاوس', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> value="پینت هاوس">
                            <span class="checkmark">پینت هاوس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('فول امکانات', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="characteristic[]" value="فول امکانات">
                            <span class="checkmark">فول امکانات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" name="characteristic[]" <?php echo in_array('تریبلکس', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> value="تریبلکس">
                            <span class="checkmark">تریبلکس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('ساحلی', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="characteristic[]" value="ساحلی">
                            <span class="checkmark">ساحلی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('اختلاف سطح', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="characteristic[]" value="اختلاف سطح">
                            <span class="checkmark">اختلاف سطح</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('بازسازی شده', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="characteristic[]" value="بازسازی شده">
                            <span class="checkmark">بازسازی شده</span>
                        </label>

                    </div>
                </div>



                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نمای ساختمان</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['building_facade'] == 'چوب' ? 'checked' : '' ?> name="building_facade" value="چوب">
                            <span class="checkmark">چوب</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['building_facade'] == 'کلاسیک' ? 'checked' : '' ?> name="building_facade" value="کلاسیک">
                            <span class="checkmark">کلاسیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['building_facade'] == 'مدرن' ? 'checked' : '' ?> name="building_facade" value="مدرن">
                            <span class="checkmark">مدرن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['building_facade'] == 'سنگ' ? 'checked' : '' ?> name="building_facade" value="سنگ">
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['building_facade'] == 'سیمان' ? 'checked' : '' ?> name="building_facade" value="سیمان">
                            <span class="checkmark">سیمان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['building_facade'] == 'آجر' ? 'checked' : '' ?> name="building_facade" value="آجر">
                            <span class="checkmark">آجر</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="building_facade" <?php echo $property['building_facade'] == 'کامپوزیت' ? 'checked' : '' ?> value="کامپوزیت">
                            <span class="checkmark">کامپوزیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['building_facade'] == 'شیشه' ? 'checked' : '' ?> name="building_facade" value="شیشه">
                            <span class="checkmark">شیشه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['building_facade'] == 'ترکیبی' ? 'checked' : '' ?> name="building_facade" value="ترکیبی">
                            <span class="checkmark">ترکیبی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">مشاعات</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('آسانسور', json_decode($property['joints'], true)) ? 'checked' : '' ?> name="joints[]" value="آسانسور">
                            <span class="checkmark">آسانسور</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" name="joints[]" <?php echo in_array('لابی', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> value="لابی">
                            <span class="checkmark">لابی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('روف گاردن', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="joints[]" value="روف گاردن">
                            <span class="checkmark">روف گاردن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('کارواش', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="joints[]" value="کارواش">
                            <span class="checkmark">کارواش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('سالن اجتماعات', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="joints[]" value="سالن اجتماعات">
                            <span class="checkmark">سالن اجتماعات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" name="joints[]" <?php echo in_array('سالن ورزشی', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> value="سالن ورزشی">
                            <span class="checkmark">سالن ورزشی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('استخر', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="joints[]" value="استخر">
                            <span class="checkmark">استخر</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('سونا', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="joints[]" value="سونا">
                            <span class="checkmark">سونا</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="checkbox" <?php echo in_array('جکوزی', json_decode($property['characteristic'], true)) ? 'checked' : '' ?> name="joints[]" value="جکوزی">
                            <span class="checkmark">جکوزی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">تاسیسات گرمایشی و سرمایشی</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'اسپلیت' ? 'checked' : '' ?> name="facilities" value="اسپلیت">
                            <span class="checkmark">اسپلیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'داکت اسپلیت' ? 'checked' : '' ?> name="facilities" value="داکت اسپلیت">
                            <span class="checkmark">داکت اسپلیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'کولر آبی' ? 'checked' : '' ?> name="facilities" value="کولر آبی">
                            <span class="checkmark">کولر آبی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'پکیج و رادیاتور' ? 'checked' : '' ?> name="facilities" value="پکیج و رادیاتور">
                            <span class="checkmark">پکیج و رادیاتور</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'گرمایش از کف' ? 'checked' : '' ?> name="facilities" value="گرمایش از کف">
                            <span class="checkmark">گرمایش از کف</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'بخاری' ? 'checked' : '' ?> name="facilities" value="بخاری">
                            <span class="checkmark">بخاری</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'هواساز' ? 'checked' : '' ?> name="facilities" value="هواساز">
                            <span class="checkmark">هواساز</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'موتورخانه مرکزی' ? 'checked' : '' ?> name="facilities" value="موتورخانه مرکزی">
                            <span class="checkmark">موتورخانه مرکزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['facilities'] == 'چیلر' ? 'checked' : '' ?> name="facilities" value="چیلر">
                            <span class="checkmark">چیلر</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">پوشش از کف</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['floor_covering'] == 'سرامیک' ? 'checked' : '' ?> name="floor_covering" value="سرامیک">
                            <span class="checkmark">سرامیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['floor_covering'] == 'پارکت' ? 'checked' : '' ?> name="floor_covering" value="پارکت">
                            <span class="checkmark">پارکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="floor_covering" <?php echo $property['floor_covering'] == 'موکت' ? 'checked' : '' ?> value="موکت">
                            <span class="checkmark">موکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['floor_covering'] == 'سنگ' ? 'checked' : '' ?> name="floor_covering" value="سنگ">
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['floor_covering'] == 'موزاییک' ? 'checked' : '' ?> name="floor_covering" value="موزاییک">
                            <span class="checkmark">موزاییک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['floor_covering'] == 'سیمان' ? 'checked' : '' ?> name="floor_covering" value="سیمان">
                            <span class="checkmark">سیمان</span>
                        </label>

                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">آشپزخانه</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'MDF' ? 'checked' : '' ?> name="kitchen" value="MDF">
                            <span class="checkmark">MDF</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'چوب' ? 'checked' : '' ?> name="kitchen" value="چوب">
                            <span class="checkmark">چوب</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'فلزی' ? 'checked' : '' ?> name="kitchen" value="فلزی">
                            <span class="checkmark">فلزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'جزیره' ? 'checked' : '' ?> name="kitchen" value="جزیره">
                            <span class="checkmark">جزیره</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'مدرن' ? 'checked' : '' ?> name="kitchen" value="مدرن">
                            <span class="checkmark">مدرن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" name="kitchen" <?php echo $property['kitchen'] == 'کلاسیک' ? 'checked' : '' ?> value="کلاسیک">
                            <span class="checkmark">کلاسیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'صفحه سنگ' ? 'checked' : '' ?> name="kitchen" value="صفحه سنگ">
                            <span class="checkmark">صفحه سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'صفحه کورین' ? 'checked' : '' ?> name="kitchen" value="صفحه کورین">
                            <span class="checkmark">صفحه کورین</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'صفحه چوب' ? 'checked' : '' ?> name="kitchen" value="صفحه چوب">
                            <span class="checkmark">صفحه چوب</span>
                        </label>

                    </div>



                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3"></label>


                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'اپن' ? 'checked' : '' ?> name="kitchen" value="اپن">
                            <span class="checkmark">اپن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'لاندری' ? 'checked' : '' ?> name="kitchen" value="لاندری">
                            <span class="checkmark">لاندری</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'فول فرنیش' ? 'checked' : '' ?> name="kitchen" value="فول فرنیش">
                            <span class="checkmark">فول فرنیش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'هود' ? 'checked' : '' ?> name="kitchen" value="هود">
                            <span class="checkmark">هود</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'گاز رو میزی' ? 'checked' : '' ?> name="kitchen" value="گاز رو میزی">
                            <span class="checkmark">گاز رو میزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'مطبخ' ? 'checked' : '' ?> name="kitchen" value="مطبخ">
                            <span class="checkmark">مطبخ</span>
                        </label>

                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">سرویس بهداشتی و حمام</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['bathroom'] == 'ایرانی' ? 'checked' : '' ?> name="bathroom" value="ایرانی">
                            <span class="checkmark">ایرانی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'فرنگی' ? 'checked' : '' ?> name="bathroom" value="فرنگی">
                            <span class="checkmark">فرنگی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'وان' ? 'checked' : '' ?> name="bathroom" value="وان">
                            <span class="checkmark">وان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['kitchen'] == 'جکوزی' ? 'checked' : '' ?> name="bathroom" value="جکوزی">
                            <span class="checkmark">جکوزی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع دیوار</label>

                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['wall'] == 'نقاشی' ? 'checked' : '' ?> name="wall" value="نقاشی">
                            <span class="checkmark">نقاشی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['wall'] == 'گچ' ? 'checked' : '' ?> name="wall" value="گچ">
                            <span class="checkmark">گچ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['wall'] == 'سنگ' ? 'checked' : '' ?> value="سنگ">
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['wall'] == 'پارچه کوبی' ? 'checked' : '' ?> name="wall" value="پارچه کوبی">
                            <span class="checkmark">پارچه کوبی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input required type="radio" <?php echo $property['wall'] == 'چوبکاری' ? 'checked' : '' ?> name="wall" value="چوبکاری">
                            <span class="checkmark">چوبکاری</span>
                        </label>

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
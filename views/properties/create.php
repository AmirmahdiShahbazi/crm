<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>فرم های پیش فرض</h3>
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
<!-- Container-fluid starts -->
<div class="container-fluid">

    <div class="card">

        <div class="card-body">
            <form method="post" action="../../properties/create.php" class="theme-form">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع معامله</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="transaction_type" value="فروش">
                            <span class="checkmark">فروش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="transaction_type" value="مشارکت">
                            <span class="checkmark">مشارکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="transaction_type" value="اجاره">
                            <span class="checkmark">اجاره</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="transaction_type" value="پیش فروش">
                            <span class="checkmark">پیش فروش</span>
                        </label>

                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="اپارتمان">
                            <span class="checkmark">اپارتمان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="ویلا">
                            <span class="checkmark">ویلا</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="خانه حیاط دار">
                            <span class="checkmark">خانه حیاط دار</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="زمین">
                            <span class="checkmark">زمین</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="دفتر کار">
                            <span class="checkmark">دفتر کار</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="مغازه">
                            <span class="checkmark">مغازه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="مستغلات">
                            <span class="checkmark">مستغلات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="کلنگی">
                            <span class="checkmark">کلنگی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="property_type" value="انبار">
                            <span class="checkmark">انبار</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">شناسه فایل</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="inputnumber" name="file_id" type="text" placeholder="شناسه فایل">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">نام مالک</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="text" name="owner" type="text" placeholder="نام مالک">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">شماره همراه</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" id="Website" name="phone_number" placeholder="شماره همراه">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تلفن ثابت</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="landline_phone" placeholder="تلفن ثابت">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ زمین (متر مربع)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="land_size" placeholder="متراژ زمین (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">متراژ بنا (متر مربع)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="building_size" placeholder="متراژ بنا (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قدرالسهم</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="share_amount" placeholder="قدرالسهم">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">تعداد اتاق</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="room_number" placeholder="تعداد اتاق">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">طبقه</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="floor" type="text" placeholder="طبقه">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">بالکن (متر مربع)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="balcony" type="text" placeholder="بالکن (متر مربع)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">انبار</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="store" type="text" placeholder="انبار">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">عمر بنا (سال)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="lifetime" type="text" placeholder="عمر بنا (سال)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قیمت هر متر (تومان)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" type="text" name="meter_price" placeholder="قیمت هر متر (تومان)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">قیمت کل (تومان)</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="total_price" type="text" placeholder="قیمت کل (تومان)">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">نام محله یا خیابان اصلی</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="neighborhood" type="text" placeholder="نام محله یا خیابان اصلی">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputPassword3">آدرس دقیق</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="Website" name="address" type="text" placeholder="آدرس دقیق">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">موقعیت ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="position" value="داخل کوچه">
                            <span class="checkmark">داخل کوچه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="position" value="بر اصلی">
                            <span class="checkmark">بر اصلی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">جهت واحد</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="direction" value="شمالی">
                            <span class="checkmark">شمالی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="direction" value="جنوبی">
                            <span class="checkmark">جنوبی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">مشخصه ملک</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="characteristic[]" value="دوبلکس">
                            <span class="checkmark">دوبلکس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="characteristic[]" value="پینت هاوس">
                            <span class="checkmark">پینت هاوس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="characteristic[]" value="فول امکانات">
                            <span class="checkmark">فول امکانات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="characteristic[]" value="تریبلکس">
                            <span class="checkmark">تریبلکس</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="characteristic[]" value="ساحلی">
                            <span class="checkmark">ساحلی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="characteristic[]" value="اختلاف سطح">
                            <span class="checkmark">اختلاف سطح</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="characteristic[]" value="بازسازی شده">
                            <span class="checkmark">بازسازی شده</span>
                        </label>

                    </div>
                </div>



                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نمای ساختمان</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="چوب">
                            <span class="checkmark">چوب</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="کلاسیک">
                            <span class="checkmark">کلاسیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="مدرن">
                            <span class="checkmark">مدرن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="سنگ">
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="سیمان">
                            <span class="checkmark">سیمان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="آجر">
                            <span class="checkmark">آجر</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="کامپوزیت">
                            <span class="checkmark">کامپوزیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="شیشه">
                            <span class="checkmark">شیشه</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="building_facade" value="ترکیبی">
                            <span class="checkmark">ترکیبی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">مشاعات</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="آسانسور">
                            <span class="checkmark">آسانسور</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="لابی">
                            <span class="checkmark">لابی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="روف گاردن">
                            <span class="checkmark">روف گاردن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="کارواش">
                            <span class="checkmark">کارواش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="سالن اجتماعات">
                            <span class="checkmark">سالن اجتماعات</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="سالن ورزشی">
                            <span class="checkmark">سالن ورزشی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="استخر">
                            <span class="checkmark">استخر</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="سونا">
                            <span class="checkmark">سونا</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="checkbox" name="joints[]" value="جکوزی">
                            <span class="checkmark">جکوزی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">تاسیسات گرمایشی و سرمایشی</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="اسپلیت">
                            <span class="checkmark">اسپلیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="داکت اسپلیت">
                            <span class="checkmark">داکت اسپلیت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="کولر آبی">
                            <span class="checkmark">کولر آبی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="پکیج و رادیاتور">
                            <span class="checkmark">پکیج و رادیاتور</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="گرمایش از کف">
                            <span class="checkmark">گرمایش از کف</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="بخاری">
                            <span class="checkmark">بخاری</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="هواساز">
                            <span class="checkmark">هواساز</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="موتورخانه مرکزی">
                            <span class="checkmark">موتورخانه مرکزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="facilities" value="چیلر">
                            <span class="checkmark">چیلر</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">پوشش از کف</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" value="سرامیک">
                            <span class="checkmark">سرامیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" value="پارکت">
                            <span class="checkmark">پارکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" value="موکت">
                            <span class="checkmark">موکت</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" value="سنگ">
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" value="موزاییک">
                            <span class="checkmark">موزاییک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="floor_covering" value="سیمان">
                            <span class="checkmark">سیمان</span>
                        </label>

                    </div>

                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">آشپزخانه</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="MDF">
                            <span class="checkmark">MDF</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="چوب">
                            <span class="checkmark">چوب</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="فلزی">
                            <span class="checkmark">فلزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="جزیره">
                            <span class="checkmark">جزیره</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="مدرن">
                            <span class="checkmark">مدرن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="کلاسیک">
                            <span class="checkmark">کلاسیک</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="صفحه سنگ">
                            <span class="checkmark">صفحه سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="صفحه کورین">
                            <span class="checkmark">صفحه کورین</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="صفحه چوب">
                            <span class="checkmark">صفحه چوب</span>
                        </label>

                    </div>



                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3"></label>


                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="اپن">
                            <span class="checkmark">اپن</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="لاندری">
                            <span class="checkmark">لاندری</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="فول فرنیش">
                            <span class="checkmark">فول فرنیش</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="هود">
                            <span class="checkmark">هود</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="گاز رو میزی">
                            <span class="checkmark">گاز رو میزی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="kitchen" value="مطبخ">
                            <span class="checkmark">مطبخ</span>
                        </label>

                    </div>
                </div>


                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">سرویس بهداشتی و حمام</label>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="bathroom" value="ایرانی">
                            <span class="checkmark">ایرانی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="bathroom" value="فرنگی">
                            <span class="checkmark">فرنگی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="bathroom" value="وان">
                            <span class="checkmark">وان</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="bathroom" value="جکوزی">
                            <span class="checkmark">جکوزی</span>
                        </label>

                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">نوع دیوار</label>

                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="wall" value="نقاشی">
                            <span class="checkmark">نقاشی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="wall" value="گچ">
                            <span class="checkmark">گچ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" value="سنگ">
                            <span class="checkmark">سنگ</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="wall" value="پارچه کوبی">
                            <span class="checkmark">پارچه کوبی</span>
                        </label>

                    </div>
                    <div class="col-sm-1 ">
                        <label class="custom-checkbox">
                            <input type="radio" name="wall" value="چوبکاری">
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
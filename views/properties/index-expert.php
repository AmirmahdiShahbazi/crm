<?php partial('header'); ?>

<?php partial('sidebar'); ?>

<?php




$sql = 'SELECT * FROM `properties`';
$stmt = $conn->prepare($sql);
$properties = $stmt->execute()->fetchAllAssociative();

$sql = 'SELECT * FROM `experts`';
$stmt = $conn->prepare($sql);
$experts = $stmt->execute()->fetchAllAssociative();



if (isset($_GET['s'])) {
    if (isset($_GET['s'])) {
        $searchTerm = '%' . $_GET['s'] . '%';
        $sql = 'SELECT * FROM properties WHERE address LIKE :searchTerm OR neighborhood LIKE :searchTerm';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':searchTerm', $searchTerm);
        $properties = $stmt->execute()->fetchAllAssociative();
    }
}
?>





<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>ملک ها</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">املاک</li>
                    <li class="breadcrumb-item active">ملک ها</li>
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
<!-- Container-fluid starts-->
<div class="container-fluid product-wrapper">
    <div class="product-grid">
        <div class="feature-products">
            <div class="row m-b-10">
                <div class="col-md-3 col-sm-2 products-total">
                    <div class="square-product-setting d-inline-block"><a class="icon-grid grid-layout-view" href="javascript:void(0)" data-original-title="" title=""><i data-feather="grid"></i></a></div>
                    <div class="square-product-setting d-inline-block"><a class="icon-grid m-0 list-layout-view" href="javascript:void(0)" data-original-title="" title=""><i data-feather="list"></i></a></div>
                    <div class="d-none-productlist filter-toggle">
                        <h6 class="mb-0">فیلترها<span class="ms-2"><i class="toggle-data" data-feather="chevron-down"></i></span></h6>
                    </div>
                    <div class="grid-options d-inline-block">
                        <ul>
                            <li><a class="product-2-layout-view" href="javascript:void(0)" data-original-title="" title=""><span class="line-grid line-grid-1 bg-primary"></span><span class="line-grid line-grid-2 bg-primary"></span></a></li>
                            <li><a class="product-3-layout-view" href="javascript:void(0)" data-original-title="" title=""><span class="line-grid line-grid-3 bg-primary"></span><span class="line-grid line-grid-4 bg-primary"></span><span class="line-grid line-grid-5 bg-primary"></span></a></li>
                            <li><a class="product-4-layout-view" href="javascript:void(0)" data-original-title="" title=""><span class="line-grid line-grid-6 bg-primary"></span><span class="line-grid line-grid-7 bg-primary"></span><span class="line-grid line-grid-8 bg-primary"></span><span class="line-grid line-grid-9 bg-primary"></span></a></li>
                            <li><a class="product-6-layout-view" href="javascript:void(0)" data-original-title="" title=""><span class="line-grid line-grid-10 bg-primary"></span><span class="line-grid line-grid-11 bg-primary"></span><span class="line-grid line-grid-12 bg-primary"></span><span class="line-grid line-grid-13 bg-primary"></span><span class="line-grid line-grid-14 bg-primary"></span><span class="line-grid line-grid-15 bg-primary"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 col-sm-10 text-end">
                    <div class="select2-drpdwn-product select-options d-inline-block">
                        <select class="form-control btn-square" name="select">
                            <option value="opt1">ویژگی ها</option>
                            <option value="opt2">کمترین قیمت</option>
                            <option value="opt3">بیشترین قیمت</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="pro-filter-sec">
                        <div class="product-sidebar">
                            <div class="filter-section">
                                <div class="card">
                                    <div class="card-header">
                                        <h6 class="mb-0 f-w-600">فیلترها<span class="pull-right"><i class="fa fa-chevron-down toggle-data"></i></span></h6>
                                    </div>
                                    <div class="left-filter">
                                        <div class="card-body filter-cards-view animate-chk">
                                            <div class="product-filter">
                                                <h6 class="f-w-600">دسته بندی</h6>
                                                <div class="checkbox-animated mt-0">
                                                    <label class="d-block" for="edo-ani5">
                                                        <input class="checkbox_animated" id="edo-ani5" type="checkbox" data-original-title="" title="">پیراهن مردانه
                                                    </label>
                                                    <label class="d-block" for="edo-ani6">
                                                        <input class="checkbox_animated" id="edo-ani6" type="checkbox" data-original-title="" title="">شلوار لی مردانه
                                                    </label>
                                                    <label class="d-block" for="edo-ani7">
                                                        <input class="checkbox_animated" id="edo-ani7" type="checkbox" data-original-title="" title="">تاپ زنانه
                                                    </label>
                                                    <label class="d-block" for="edo-ani8">
                                                        <input class="checkbox_animated" id="edo-ani8" type="checkbox" data-original-title="" title="">شلوار لی زنانه
                                                    </label>
                                                    <label class="d-block" for="edo-ani9">
                                                        <input class="checkbox_animated" id="edo-ani9" type="checkbox" data-original-title="" title="">تیشرت مردانه
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="product-filter">
                                                <h6 class="f-w-600">برند</h6>
                                                <div class="checkbox-animated mt-0">
                                                    <label class="d-block" for="chk-ani">
                                                        <input class="checkbox_animated" id="chk-ani" type="checkbox" data-original-title="" title=""> لویز
                                                    </label>
                                                    <label class="d-block" for="chk-ani1">
                                                        <input class="checkbox_animated" id="chk-ani1" type="checkbox" data-original-title="" title="">دیزل
                                                    </label>
                                                    <label class="d-block" for="chk-ani2">
                                                        <input class="checkbox_animated" id="chk-ani2" type="checkbox" data-original-title="" title="">لی
                                                    </label>
                                                    <label class="d-block" for="chk-ani3">
                                                        <input class="checkbox_animated" id="chk-ani3" type="checkbox" data-original-title="" title="">هادسون
                                                    </label>
                                                    <label class="d-block" for="chk-ani4">
                                                        <input class="checkbox_animated" id="chk-ani4" type="checkbox" data-original-title="" title="">دنیزن
                                                    </label>
                                                    <label class="d-block" for="chk-ani5">
                                                        <input class="checkbox_animated" id="chk-ani5" type="checkbox" data-original-title="" title="">اسپایکار
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="product-filter slider-product">
                                                <h6 class="f-w-600">رنگ بندی</h6>
                                                <div class="color-selector">
                                                    <ul>
                                                        <li class="white"></li>
                                                        <li class="bg-primary"> </li>
                                                        <li class="bg-secondary"></li>
                                                        <li class="bg-success"></li>
                                                        <li class="bg-warning"></li>
                                                        <li class="bg-danger"></li>
                                                        <li class="blue"></li>
                                                        <li class="red"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-filter pb-0">
                                                <h6 class="f-w-600">قیمت</h6>
                                                <input id="u-range-03" type="text">
                                                <h6 class="f-w-600">محصولات جدید</h6>
                                            </div>
                                            <div class="product-filter pb-0 new-products">
                                                <div class="owl-carousel owl-theme" id="testimonial">
                                                    <div class="item">
                                                        <div class="product-box">
                                                            <div class="media">
                                                                <div class="product-img me-3"><img class="img-fluid" src="../assets/images/ecommerce/01.jpg" alt="" data-original-title="" title=""></div>
                                                                <div class="media-body">
                                                                    <div class="product-details">
                                                                        <div>
                                                                            <ul>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                            </ul>
                                                                            <p class="mb-0 f-w-700">پیراهن فانتزی</p>
                                                                            <div class="p f-w-500">1,500,000 تومان</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-box">
                                                            <div class="media">
                                                                <div class="product-img me-3"><img class="img-fluid" src="../assets/images/ecommerce/02.jpg" alt="" data-original-title="" title=""></div>
                                                                <div class="media-body">
                                                                    <div class="product-details">
                                                                        <div>
                                                                            <ul>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                            </ul>
                                                                            <p class="mb-0 f-w-700">پیراهن فانتزی</p>
                                                                            <div class="p f-w-500">1,500,000 تومان</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-box">
                                                            <div class="media">
                                                                <div class="product-img me-3"><img class="img-fluid" src="../assets/images/ecommerce/03.jpg" alt="" data-original-title="" title=""></div>
                                                                <div class="media-body">
                                                                    <div class="product-details">
                                                                        <div>
                                                                            <ul>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                            </ul>
                                                                            <p class="mb-0 f-w-700">پیراهن فانتزی</p>
                                                                            <div class="p f-w-500">1,500,000 تومان</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="item">
                                                        <div class="product-box">
                                                            <div class="media">
                                                                <div class="product-img me-3"><img class="img-fluid" src="../assets/images/ecommerce/01.jpg" alt="" data-original-title="" title=""></div>
                                                                <div class="media-body">
                                                                    <div class="product-details">
                                                                        <div>
                                                                            <ul>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                            </ul>
                                                                            <p class="mb-0 f-w-700">پیراهن فانتزی</p>
                                                                            <div class="p f-w-500">1,500,000 تومان</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-box">
                                                            <div class="media">
                                                                <div class="product-img me-3"><img class="img-fluid" src="../assets/images/ecommerce/02.jpg" alt="" data-original-title="" title=""></div>
                                                                <div class="media-body">
                                                                    <div class="product-details">
                                                                        <div>
                                                                            <ul>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                            </ul>
                                                                            <p class="mb-0 f-w-700">پیراهن فانتزی</p>
                                                                            <div class="p f-w-500">1,500,000 تومان</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-box">
                                                            <div class="media">
                                                                <div class="product-img me-3"><img class="img-fluid" src="../assets/images/ecommerce/03.jpg" alt="" data-original-title="" title=""></div>
                                                                <div class="media-body">
                                                                    <div class="product-details">
                                                                        <div>
                                                                            <ul>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                                <li><i class="fa fa-star font-warning"></i></li>
                                                                            </ul>
                                                                            <p class="mb-0 f-w-700">پیراهن فانتزی</p>
                                                                            <div class="p f-w-500">1,500,000 تومان</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-filter text-center"><img class="img-fluid banner-product" src="../assets/images/ecommerce/banner.jpg" alt="" data-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-search">
                            <form>
                                <div class="form-group m-0">
                                    <input class="form-control" type="search" value="<?php echo $_GET['s'] ?>" placeholder="جستجو ..." data-original-title="" name="s" title=""><i class="fa fa-search"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-wrapper-grid">
            <div class="row">
                <?php foreach ($properties as $property) : ?>
                    <div class="col-xl-3 col-sm-6 xl-4">
                        <div class="card">
                            <div class="product-box">
                                <div class="product-img">
                                    <?php if ($property['files'] == 'none') : ?>
                                        <img class="img-fluid" src="https://www.bhg.com/thmb/H9VV9JNnKl-H1faFXnPlQfNprYw=/1799x0/filters:no_upscale():strip_icc()/white-modern-house-curved-patio-archway-c0a4a3b3-aa51b24d14d0464ea15d36e05aa85ac9.jpg" alt="">

                                    <?php else : ?>
                                        <img class="img-fluid" src="<?php echo "./../../files/" . json_decode($property['files'], true)[0] ?>" alt="">
                                    <?php endif; ?>
                                    <div class="product-hover">
                                        <ul>
                                            <li><a data-bs-toggle="modal" data-bs-target="#exampleModalCenter<?php echo $property['id'] ?>"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="./../../properties/update.php?id=<?php echo $property['id'] ?>"><i class="fa fa-edit"></i></a></li>
                                            <li><a style="cursor:pointer;" class="fa fa-trash text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $property['id'] ?><?php echo $property['id'] ?>"></a></li>
                                            <li> <a style="cursor:pointer;" class="fa fa-user text-secondary" data-bs-toggle="modal" data-bs-target="#showModal<?php echo $property['id'] ?>"></a>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal fade" id="deleteModal<?php echo $property['id'] ?><?php echo $property['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal<?php echo $property['id'] ?><?php echo $property['id'] ?>" aria-hidden="true">
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
                                <div class="modal fade" id="exampleModalCenter<?php echo $property['id'] ?>">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="product-box row">
                                                    <div class="product-img col-lg-6">

                                                        <?php if ($property['files'] == 'none') : ?>
                                                            <img class="img-fluid" src="https://www.bhg.com/thmb/H9VV9JNnKl-H1faFXnPlQfNprYw=/1799x0/filters:no_upscale():strip_icc()/white-modern-house-curved-patio-archway-c0a4a3b3-aa51b24d14d0464ea15d36e05aa85ac9.jpg" alt="">

                                                        <?php else : ?>
                                                            <img class="img-fluid" src="./../../files/<?php echo json_decode($property['files'], true)[0] ?>" alt="">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="product-details col-lg-6 text-start"><a href="product-page.html">
                                                            <h4><?php echo $property['neighborhood'] ?></h4>
                                                        </a>
                                                        <div class="product-price"><?php echo $property['property_type'] ?>
                                                        </div>
                                                        <div class="product-view">
                                                            <h6 class="f-w-600">آدرس</h6>
                                                            <p class="mb-0"><?php echo $property['address'] ?></p>
                                                        </div>

                                                        <div class="product-qnty mt-3">

                                                            <div class="addcart-btn"><a class="btn btn-primary" href="./../../properties/show.php?id=<?php echo $property['id'] ?>">مشاهده
                                                                    جزئیات</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="showModal<?php echo $property['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="showModal<?php echo $property['id'] ?>" aria-hidden="true">
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
                                                            <form method="post" enctype="multipart/form-data" action="./../../expert_property/create.php" class="theme-form">
                                                                <input class="form-control" value="<?php echo $property['id'] ?>" name="property" type="hidden" required placeholder="دسته بندی ">

                                                                <div class="mb-3 row">
                                                                    <label class="col-sm-3 col-form-label" for="inputPassword3">کارشناس</label>
                                                                    <div class="col-sm-9">

                                                                        <select name="expert" class="js-example-basic-single form-control">
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
                                <div class="product-details">
                                    <h4><?php echo $property['neighborhood'] ?></h4>
                                    </a>
                                    <p><?php echo $property['property_type'] ?></p>
                                    <div class="product-price">
                                        <?php echo $property['transaction_type'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="card page-bottom b-r-0">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="info-block">
                        <ul class="pagination pagination-primary">
                            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php partial('footer') ?>
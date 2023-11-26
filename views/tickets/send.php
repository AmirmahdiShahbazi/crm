<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php
$sql = 'SELECT * FROM `experts`';
$stmt = $conn->prepare($sql);
$experts = $stmt->execute()->fetchAllAssociative(); 
?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>ارسال تیکت</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">تیکت</li>
                    <li class="breadcrumb-item active">ارسال تیکت</li>
                </ol>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['failed'])) : ?>
        <div class="alert alert-danger"><?php echo $_SESSION['failed'];
                                        unset($_SESSION['failed']); ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success"><?php echo $_SESSION['success'];
                                        unset($_SESSION['success']); ?></div>
    <?php endif; ?>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="email-wrap">
            <div class="row">

                <div class="col-xl-12 box-col-12 col-md-12 xl-70">
                    <div class="email-right-aside">
                        <div class="card email-body">
                            <div class="email-profile">
                                <div class="email-body">
                                    <div class="email-compose">

                                        <div class="email-wrapper">
                                            <form class="theme-form" method="post" enctype="multipart/form-data" action="../../tickets/send.php">
                                                <div class="form-group">
                                                    <label class="col-form-label pt-0" for="exampleInputEmail1">به</label>
                                                    <select name="receiver" class="js-example-basic-single form-control" name="state">
                                                        <option value="">ارسال به...</option>
                                                        <?php foreach ($experts as $expert) : ?>
                                                            <option value="<?php echo $expert['id'] ?>"><?php echo $expert['name'] ?></option>
                                                            <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">موضوع</label>
                                                    <input name="title" class="form-control" id="exampleInputPassword1" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">فایل</label>
                                                    <input name="files[]" class="form-control" id="exampleInputPassword1" type="file" multiple>
                                                </div>
                                                <div class="form-group">
                                                    <label>پیام</label>
                                                    <textarea name="message" id="text-box" name="text-box" cols="10" rows="2"></textarea>
                                                </div>

                                                <ul class="actions">
                                                    <input class="btn btn-secondary text-secondary" value="ارسال" type="submit" href="javascript:void(0)"></li>
                                                </ul>
                                            </form>
                                            <div class="action-wrapper">

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

<?php partial('footer') ?>
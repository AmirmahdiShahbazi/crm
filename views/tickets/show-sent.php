<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php

$sent = $queryBuilder->select('*')->from('tickets', 't')->where('t.id = ' . intval($_GET['id']))->fetchAssociative();

?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>تیکت ارسال شده</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">تیکت</li>
                    <li class="breadcrumb-item active">تیکت ارسال شده</li>
                </ol>
            </div>
        </div>
    </div>

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
                                                    <input name="title" value="<?php
                                                                                echo $queryBuilder->select('name')
                                                                                    ->from('experts')
                                                                                    ->where('experts.id = :id')
                                                                                    ->setParameter('id', $sent['sender_id'])
                                                                                    ->execute()
                                                                                    ->fetchOne();
                                                                                ?>" disabled class="form-control" id="exampleInputPassword1" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">موضوع</label>
                                                    <input name="title" value="<?php echo $sent['title'] ?>" disabled class="form-control" id="exampleInputPassword1" type="text">
                                                </div>

                                                <div class="form-group">
                                                    <label>پیام</label>
                                                    <textarea disabled name="message" id="text-box" name="text-box" cols="10" rows="2"><?php echo $sent['message'] ?></textarea>
                                                </div>

                                            </form>
                                            <?php if (!empty($files)) : ?>

                                                <a href="./download.php?files=<?php echo $files ?>" class="btn btn-primary">دانلود فایل های پیوست</a>

                                            <?php endif; ?>
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
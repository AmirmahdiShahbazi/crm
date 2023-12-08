<?php partial('header'); ?>

<?php partial('sidebar'); ?>
<?php

$received = $queryBuilder->select('*')->from('tickets', 't')->where('t.id = ' . intval($_GET['id']))->fetchAssociative();
$received = $queryBuilder->select('*')->from('tickets', 't')->where('t.id = ' . intval($_GET['id']))->fetchAssociative();
$sql = "SELECT * FROM messages WHERE ticket_id = " . $_GET['id'] . " ORDER BY date ASC";
$stmt = $queryBuilder->getConnection()->executeQuery($sql);
$messages = $stmt->fetchAllAssociative();
?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>اپلیکیشن گفتگو</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">گفتگو</li>
                    <li class="breadcrumb-item active"> اپلیکیشن گفتگو</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['failed'])) : ?>
    <div class="alert alert-danger"><?php echo $_SESSION['failed']; unset($_SESSION['failed']) ?></div>
<?php endif; ?>
<?php if (isset($_SESSION['success'])) : ?>
    <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']) ?></div>
<?php endif; ?>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">

        <div class="col call-chat-body">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row chat-box">
                        <!-- Chat right side start-->
                        <div class="col chat-right-aside">
                            <!-- chat start-->
                            <div class="chat">
                                <!-- chat-header start-->
                                <div class="media chat-header clearfix"> 
                                    <div class="media-body">
                                        <div class="about">
                                            <!-- <div class="name">پریسا توکلی  <span class="font-primary f-12">در حال نوشتن ...</span>
                                            </div>
                                            <div class="status digits">آخرین بازدید در 3:55 عصر</div> -->
                                        </div>
                                    </div>
                                    <ul class="list-inline float-start float-sm-end chat-menu-icons">
                                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="icon-search"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="icon-clip"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="icon-headphone-alt"></i></a></li>
                                        <li class="list-inline-item"><a href="javascript:void(0)"><i class="icon-video-camera"></i></a></li>
                                        <li class="list-inline-item toogle-bar"><a href="javascript:void(0)"><i class="icon-menu"></i></a></li>
                                    </ul>
                                </div>
                                <!-- chat-header end-->
                                <div class="chat-history chat-msg-box custom-scrollbar">
                                    <ul>
                                        <?php foreach ($messages as $message) : ?>

                                            <li class="clearfix">
                                                <div class="message  my-message <?php echo intval($message['sender_id']) == intval($_SESSION['user']['id']) ?
                                                                                    'pull-left' : 'pull-right' ?>"><img class="rounded-circle float-start chat-user-img img-30">
                                                    <div class="message-data <?php echo intval($message['sender_id']) == intval($_SESSION['user']['id']) ?
                                                                                    'text-end' : 'text-start' ?>"><span style="display: block;" class="message-data-time"><?php echo $message['date'] ?></span>
                                                        <?php if ($message['type'] == 'file') : ?>
                                                            <?php
                                                            $files = [];
                                                            foreach (json_decode($message['message'], true) as $filePath) {
                                                                $name = explode(DIRECTORY_SEPARATOR, $filePath);
                                                                $files[] = $name[array_key_last($name)];
                                                            }
                                                            $files = implode(',', $files) ?? null;
                                                            ?>
                                                            <?php if (!empty($files)) : ?>
                                                                <a href="./download.php?files=<?php echo $files == null ? '' : $files ?>" class="btn btn-primary"><?php echo $files == null ? 'فایلی موجود نمیباشید' : 'دانلود فایل های پیوست' ?></a>
                                                            <?php endif; ?>
                                                        <?php else : ?>
                                                            <?php echo $message['message'] ?>

                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>



                                    </ul>
                                </div>
                                <!-- end chat-history-->
                                <form method="post" enctype="multipart/form-data" action="./../../tickets/show-sent.php?id=<?php echo $_GET['id'] ?>">
                                    <input type="hidden" name="receiver" value="<?php echo $received['receiver_id'] ?>">
                                    <div class="chat-message clearfix">
                                        <div class="row">
                                            <div class="col-xl-12 d-flex">
                                                <div class="smiley-box bg-primary">
                                                    <div class="picker"><input type="file" multiple name="files[]"></div>
                                                </div>
                                                <div class="input-group text-box">
                                                    <input class="form-control input-txt-bx" id="message-to-send" type="text" name="message" placeholder="یک پیام بنویسید .......">
                                                    <button class="btn btn-primary input-group-text" type="submit">ارسال</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <!-- end chat-message-->
                                <!-- chat end-->
                                <!-- Chat right side ends-->
                            </div>
                        </div>
                        <div class="col chat-menu">
                            <ul class="nav nav-tabs border-tab nav-primary" id="info-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="info-home-tab" data-bs-toggle="tab" href="#info-home" role="tab" aria-selected="true">تماس</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="profile-info-tab" data-bs-toggle="tab" href="#info-profile" role="tab" aria-selected="false">وضعیت</a>
                                    <div class="material-border"></div>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="contact-info-tab" data-bs-toggle="tab" href="#info-contact" role="tab" aria-selected="false">پروفایل</a>
                                    <div class="material-border"></div>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <!-- Container-fluid Ends-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?php partial('footer') ?>
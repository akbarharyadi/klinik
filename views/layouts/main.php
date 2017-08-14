<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;
use webvimark\modules\UserManagement\UserManagementModule;

$bundle = yiister\gentelella\assets\Asset::register($this);


?>
<?php 
                        $name = app\models\Pegawai::find()->where(['user_id' => \Yii::$app->user->identity->id])->one()->nama;
                        if (empty($name)) {
                            $name = \Yii::$app->user->identity->username;
                        }
                        ?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-md">
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <?= Html::a('<i class="fa fa-hospital-o"></i> <span>KLINIK</span>', \yii\helpers\Url::to('/'), ['class'=>"site_title"]) ?>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <!-- <div class="profile">
                    <div class="profile_pic">
                        <img src="https://3.bp.blogspot.com/-eTPEHqY36LU/WQGEliEWHvI/AAAAAAAABpw/qxI7VKUGHacXlSIixNM725UvZCHh0yizQCLcB/s1600/atomix_user31.png" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        
                        <h2><?= $name ?></h2>
                    </div>
                </div> -->
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Home", "url" => ["/"], "icon" => "home"],
                                    ["label" => "Pendaftaran Pasien", "url" => ["pasien/index"], "icon" => "user"],
                                    ["label" => "Pemeriksaan Pasien", "url" => ["/"], "icon" => "files-o"],
                                    ["label" => "Penebusan Obat", "url" => ["/"], "icon" => "th"],
                                    [
                                        "label" => "Master",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                'label' => UserManagementModule::t('back', 'User'),
                                                'url' => ['/user-management/user/index']
                                            ],
                                            [
                                                'label' => 'Pegawai',
                                                'url' => ['/pegawai/index']
                                            ],
                                            [
                                                'label' => 'Poli',
                                                'url' => ['/poli/index']
                                            ],
                                            
                                            // [
                                            //     'label' => 'Profile', 
                                            //     'url' => ['/user-profile/index']
                                            // ],
                                            // [
                                            //     'label' => UserManagementModule::t('back', 'Roles'), 
                                            //     'url' => ['/user-management/role/index']
                                            // ],
                                            // [
                                            //     'label' => UserManagementModule::t('back', 'Permissions'), 
                                            //     'url' => ['/user-management/permission/index']
                                            // ],
                                            // [
                                            //     'label' => UserManagementModule::t('back', 'Permission groups'), 
                                            //     'url' => ['/user-management/auth-item-group/index']
                                            // ],
                                            [
                                                'label' => UserManagementModule::t('back', 'Visit log'),
                                                'url' => ['/user-management/user-visit-log/index']
                                            ],
                                        ],
                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://placehold.it/128x128" alt=""><?= $name ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li><?= Html::a('<i class="fa fa-sign-out pull-right"></i> Logout', \yii\helpers\Url::to(['/user-management/auth/logout'])) ?>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])) : ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <!-- <footer>
            <div class="pull-right">
                Klikik Application - 2017<br />
                By Lutfi Nurhidayat
            </div>
            <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>

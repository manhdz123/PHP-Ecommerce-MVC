<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        $i = 0;//khai bao bien i = 0
                        foreach ($_SESSION['data_banner'] as $key =>$value){?>
                            <li data-target="#slider-carousel" data-slide-to="<?php echo $i?>"
                                class ="
                                    <?php if($i== 0) // neu data-slide-to = 0 thi class ="active'
                                    echo 'active';
                                ?>"
                            ></li>
                            <?php $i++;}?>
                    </ol>
                    <!-- tang bien dem i++ tiep tuc foreach -->
                    <!-- content slide -->
                    <div class="carousel-inner">
                        <?php
                        $i = 0; // khai bao bien i
                        foreach ($_SESSION['data_banner'] as $key =>$value) {?> <!-- lay du lieu tu file index_controller.php -->
                            <div class="
                            <?php
                            if($i== 0) // data-slide-to = 0 thi class ="item active'
                                echo 'item active';
                            else
                                echo 'item'; // class ='item'
                            ?>">
                                <div class="col-sm-6">
                                    <h1><span>3L</span>-CNT11</h1>
                                    <h2><?php echo $value['title2']?></h2>
                                    <p><?php echo $value['content']?> </p>
                                    <button type="button" class="btn btn-default get">CNTT1</button>
                                </div>
                                <div class="col-sm-6">
                                    <img src="<?php echo URL_FRONT_END_IMAGES ?>/<?php echo $value['image']?>" class="girl img-responsive" alt="" />

                                </div>
                            </div>
                            <?php $i++;}?>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
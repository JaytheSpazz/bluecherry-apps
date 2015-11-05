<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo MMAP_HEADER; ?>
    
        <ol class="breadcrumb">
            <li><a href="/ajax/devices.php" class="ajax-content"><?php echo ALL_DEVICES; ?></a></li>
            <li class="active"><?php echo EDITING_MMAP; ?> <b><?php echo (empty($camera->info['device_name']) ? $camera->info['id'] : $camera->info['device_name']); ?></b></li>
        </ol>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-12">
            <button class="btn btn-success pull-right send-req-form" type="submit" data-form-id="motion-submit" data-func="getMotionMap"><i class="fa fa-check fa-fw"></i> <?php echo SAVE_CHANGES; ?></button>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-12">
        
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo BUFFER_TITLE; ?></div>
                <div class="panel-body">
                
                    <div class="form-group">
                        <label class="col-lg-3 control-label"><?php echo PRE_REC_BUFFER; ?></label>

                        <div class="col-lg-3">
                            <form action="/ajax/update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $camera->info['id']; ?>" />
                                <input type="hidden" name="type" value="Devices" />
                                <input type="hidden" name="mode" value="update" />

                                <?php echo arrayToSelect($GLOBALS['buffer']['pre'], $camera->info['buffer_prerecording'], 'buffer_prerecording', 'send-req-form-select'); ?>
                            </form>
                        </div>

                        <label class="col-lg-3 control-label"><?php echo POST_REC_BUFFER; ?></label>

                        <div class="col-lg-3">
                            <form action="/ajax/update.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $camera->info['id']; ?>" />
                                <input type="hidden" name="type" value="Devices" />
                                <input type="hidden" name="mode" value="update" />

                                <?php echo arrayToSelect($GLOBALS['buffer']['post'], $camera->info['buffer_postrecording'], 'buffer_postrecording', 'send-req-form-select'); ?>
                            </form>
                        </div>
                    </div>

                </div>
        </div>


    <form action="/ajax/update.php" method="post" class="form-horizontal" id="motion-submit">

        <input type="hidden" name="id" value="<?php echo $camera->info['id']; ?>" />
        <input type="hidden" name="motion_map" id="motion-map" value="<?php echo $camera->info['motion_map']; ?>" />
        <input type="hidden" name="type" value="Devices" />
        <input type="hidden" name="mode" value="update" />

        <div class="panel panel-default">
            <div class="panel-heading"><?php echo MOTION_ALGORITHM_TITLE; ?></div>
            <div class="panel-body">

                <div class="form-group">
                    <label class="col-lg-4 col-md-4 control-label"><?php echo MOTION_ALGORITHM; ?></label>

                    <div class="col-lg-8 col-md-6">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default <?php echo $camera->info['default_motion_algorithm'] == 1 ? 'active' : '' ?> ">
                        		<input type="radio" name="default_motion_algorithm" value="1" style="width: 30px;"
                                <?php echo $camera->info['default_motion_algorithm'] == 1 ? ' checked="checked"' : '' ?> />
                        		<?php echo MOTION_DEFAULT; ?>
                            </label>

                            <label class="btn btn-default <?php echo $camera->info['default_motion_algorithm'] == '0' ? 'active' : '' ?> ">
                        		<input type="radio" name="default_motion_algorithm" value="0" style="width: 30px;"
                                <?php echo $camera->info['default_motion_algorithm'] == 0 ? ' checked="checked"' : '' ?> />
                                <?php echo MOTION_EXPERIMENTAL ?>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 col-md-4 control-label"><?php echo 'Frame downscale factor'; ?></label>

                    <div class="col-lg-6 col-md-6">
                        <?php echo arrayToSelect(Array('0.1' => '0.1', '0.2' => '0.2', '0.3' => '0.3', '0.4' => '0.4', '0.5' => '0.5', '0.6' => '0.6', '0.7' => '0.7', '0.8' => '0.8', '0.9' => '0.9', '1.0' => '1.0'), $camera->info['frame_downscale_factor'], 'frame_downscale_factor'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-4 col-md-4 control-label"><?php echo 'Min. motion area %:'; ?></label>

                    <div class="col-lg-6 col-md-6">
                        <div class="bfh-slider" data-name="min_motion_area" data-value="<?php echo $camera->info['min_motion_area']; ?>"></div>
                    </div>
                </div>

            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading"><?php echo MMAP_SELECTOR_TITLE; ?></div>
                <div class="panel-body">
                
                    <div class="form-group motion-sens-bl">
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-default btn-block motion-btn-sens click-event disabled" data-class="motionGrid.off()">Off</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-success btn-block motion-btn-sens click-event disabled" data-class="motionGrid.minimal()">Minimal</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-info btn-block motion-btn-sens click-event disabled" data-class="motionGrid.low()">Low</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-primary btn-block motion-btn-sens click-event" data-class="motionGrid.average()" data-active="primary">Average</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-warning btn-block motion-btn-sens click-event disabled" data-class="motionGrid.high()">High</button>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <button type="button" class="btn btn-danger btn-block motion-btn-sens click-event disabled" data-class="motionGrid.veryHigh()">Very High</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 col-md-12">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 col-md-12">
                            <button type="button" class="btn btn-default click-event" data-class="motionGrid.clearAll()">Clear All</button>
                            <button type="button" class="btn btn-grey click-event" data-class="motionGrid.fillAll()">Fill All</button>
                        </div>
                    </div>

                </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-lg-7 col-md-7">
                    <div style="width: 352px;" class="grid-bl">
                        <span class="glyphicon glyphicon-refresh spinning"></span>
                        <img width="352" src="/media/mjpeg.php?id=<?php echo $camera->info['id']; ?>" />


                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="javascript:void(0);" class="btn btn-default click-event" data-class="motionGrid.showHideImage()"><?php echo HIDE_IMG; ?></a>
                </div>
            </div>
        </div>
                


    </form>

    </div>
</div>
<?php 

addJs("
    $(function() {
        var mg = new motionGrid(null);
        mg.initDrawGrid();

        $('div.bfh-slider').each(function () {
            var \$slider;
            \$slider = $(this);
            \$slider.bfhslider(\$slider.data());
        });
    });
");

?>

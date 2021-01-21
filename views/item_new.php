<?php
require 'backendheader.php';
?>
    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i>Item Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="<?php echo  $GLOBALS['view_path']?>item_add" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Photo </label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="photo_id" name="photo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_id" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-10">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Unit Price</a>
                                        <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Discount Price</a>
                                    </div>
                                </nav>
                                <br>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <input type="text" name="uprice" class="form-control">
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <input type="text" name="dprice" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Description </label>
                            <div class="col-sm-10">
                                <textarea class="form-control" cols="2" name="description"></textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Brand </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="brandid">
                                    <option>Chose Brand</option>
                                    <?php
                                    foreach ($brands as $brand) {

                                        ?>
                                        <option value="<?php echo $brand['id']?>" >
                                            <?php echo $brand['name']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"> Subcategory </label>
                            <div class="col-sm-10">
                                <select class="form-control" name="subcategoryid">
                                    <option>Chose subcategory</option>
                                    <?php
                                    foreach ($subcategories as $subcategory) {

                                        ?>
                                        <option value="<?php echo $subcategory['id']?>" >
                                            <?php echo $subcategory['name']; ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icofont-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
require 'backenfooter.php';
?>
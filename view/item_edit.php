<?php 

    require 'backendheader.php';

 ?>

 <div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i>Item Edit Form </h1>
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
            <form action="<?php echo $GLOBALS['view_part'] ?>item_update" method="POST" enctype="multipart/form-data">
                  
                  <input type="hidden" name="id" value="<?php echo $itemedit['id'] ?>">
                  <input type="hidden" name="oldphoto" value="<?php echo $itemedit['photo'] ?>">

                    <div class="form-group row">
                        <label for="code_id" class="col-sm-2 col-form-label"> Code Number </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="code_id" name="codeno" value="<?php echo $itemedit['codeno'] ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name_id" name="name" value="<?php echo $itemedit['name'] ?>">
                        </div>
                    </div>

                      <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                        <div class="col-sm-10">
                            <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                                    </div>
                                </nav>
                        <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <img src="<?php echo $GLOBALS['view_path'].$itemedit
                                        ['photo'] ?>" width="180px" height="140px">
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <br>
                                        <input type="file" id="photo_id" name="photo">
                                    </div>
                                </div>

                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="price_id" name="price" value="<?php echo $itemedit['price'] ?>">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="discount_id" class="col-sm-2 col-form-label"> Discount </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="discount_id" name="discount" value="<?php echo $itemedit['discount'] ?>">
                        </div>
                    </div>


                     <div class="form-group row">
                        <label for="description_id" class="col-sm-2 col-form-label"> Description </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="description_id" name="description" value="<?php echo $itemedit['description'] ?>">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="category_id" class="col-sm-2 col-form-label"> Subcategory </label>
                        <div class="col-sm-10">
                            <select class="form-cont" name="subcategoryid">
                                 <option>Choose Subcategory</option>

                                <?php 
                                    foreach ($subcategories as $subcategory) {
                                ?>
                                                            
                                <option value="<?php echo $subcategory['id'] ?>"  <?php if($subcategory['id'] == $itemedit['id'] ){echo 'selected="selected"';}?>>
                                <?php echo $subcategory['name']; ?>
                                </option>
                                        
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="brand_id" class="col-sm-2 col-form-label"> Brand </label>
                        <div class="col-sm-10">
                             <select class="form-cont" name="brandid">
                                 <option>Choose Brand</option>

                                <?php 
                                    foreach ($brands as $brand) {
                                        // $bid = $brand['bid'];
                                        // $cname = $subcategory['cname'];
                                ?>
                                                            
                                <option value="<?php echo $brand['id'] ?>"  <?php if($items['brand_id'] == $brand['name'] ){echo 'selected="selected"';}?>>
                                <?php echo $brand['name']; ?>
                                </option>
                                        
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

    require 'backendfooter.php';
  ?>
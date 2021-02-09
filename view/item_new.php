<?php 

	require 'backendheader.php';

 ?>

 <div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i>Item New Form </h1>
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
            <form action="<?php echo $GLOBALS['view_part'] ?>item_add" method="POST" enctype="multipart/form-data">

                  

                    <div class="form-group row">
                        <label for="code_id" class="col-sm-2 col-form-label"> Code Number </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="code_id" name="codeno">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name_id" name="name">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                        <div class="col-sm-10">
                          <input type="file" id="photo_id" name="photo">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="price_id" name="price">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="discount_id" class="col-sm-2 col-form-label"> Discount </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="discount_id" name="discount">
                        </div>
                    </div>


                     <div class="form-group row">
                        <label for="description_id" class="col-sm-2 col-form-label"> Description </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="description_id" name="description">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="category_id" class="col-sm-2 col-form-label"> Subcategory </label>
                        <div class="col-sm-10">
                            <select class="form-cont" name="categoryname">
                                <option>Choose Subcategory</option>
                                <?php 
                                    foreach ($subcategories as $subcategory) {
                                ?>

                                <option value="<?php echo $subcategory['id'] ?>">
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
                                ?>

                                <option value="<?php echo $brand['id'] ?>">
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
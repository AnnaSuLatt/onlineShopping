<?php 

	require 'backendheader.php';

 ?>

 <div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Sub-Category Form </h1>
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
            <form action="<?php echo $GLOBALS['view_part'] ?>subcategory_update" method="POST" enctype="multipart/form-data">
            	<input type="hidden" name="id" value="<?php echo $subcategoryedit['id'] ?>">

                    <div class="form-group row">
                        <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name_id" name="name" value="<?php echo $subcategoryedit['name'] ?>">
                        </div>
                    </div>

                     <div class="form-group row">
                        <label for="category_id" class="col-sm-2 col-form-label"> Category </label>
                        <div class="col-sm-10">
                            <select class="form-cont" name="categoryid">
                                <option>Choose Category</option>
                                <?php 
                                    foreach ($categories as $category) {
                                ?>

                                <option value="<?php echo $category['id'] ?>">
                                <?php echo $category['name']; ?>
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

 <!-- <div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Subcategory Form </h1>
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
            <form action="<?php echo $GLOBALS['view_part'] ?>subcategory_update" method="POST" enctype="multipart/form-data">

                  <input type="hidden" name="id" value="<?php echo $subcategoryedit['id'] ?>">
                  <input type="hidden" name="oldphoto" value="<?php echo $subcategoryedit['logo'] ?>">

                    <div class="form-group row">
                        <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name_id" name="name" value="<?php echo $subcategoryedit['name'] ?>">
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
                                       <img src="<?php echo $GLOBALS['view_path'].$subcategoryedit
                                        ['logo'] ?>">
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <br>
                                        <input type="file" id="photo_id" name="photo">
                                    </div>
                                </div>

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
</div> -->

 <?php 

 	require 'backendfooter.php';
  ?>
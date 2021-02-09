<?php 
	require 'backendheader.php';
 ?>
<div class="app-title">
<div>
    <h1> <i class="icofont-list"></i> Item </h1>
</div>
<ul class="app-breadcrumb breadcrumb side">
    <a href="<?php echo $GLOBALS['view_path'] ?>item_new" class="btn btn-outline-primary">
        <i class="icofont-plus"></i>
    </a>
</ul>
</div>
<div class="row">
<div class="col-md-12">
    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                          <th>#</th>
                          <th>codeno</th>
                          <th>Name</th>
                          <th>price</th>
                          <th>discount</th>
                          <th>description</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=1;
                  		    foreach ($items as $item) {
                                $id = $item['id'];
                                $name = $item['name'];
                                $photo = $GLOBALS['view_path'].$item['photo'];
                                $codeno = $item['codeno'];
                                $price = $item['price'];
                                $discount = $item['discount'];
                                $description = $item['description'];
                         ?>
                        <tr>
                            <td> <?php echo $i++; ?></td>
                            <td> <?php echo $codeno; ?></td>
                            <td> 
                                <img src="<?php echo $photo ?>" class="img-fluid" width="170px" height="100px">
                                <?php echo $name; ?>
                            </td>
                            <td> <?php echo $price; ?></td>
                            <td> <?php echo $discount; ?></td>
                            <td> <?php echo $description; ?></td>
                            <td>
                                 <a href="<?php echo $GLOBALS['view_path'] ?>item_edit?id=<?php echo $id ?>" class="btn btn-warning">
                                            <i class="icofont-ui-settings"></i>
                                        </a>

                               <form class="d-inline-block" action="<?php echo $GLOBALS['view_path'] ?>item_delete" method="POST" onsubmit="return confirm('Are you sure want to delete?')">

                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button class="btn btn-outline-danger">
                                                <i class="icofont-close"></i>
                                            </button>
                                </form> 
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

 <?php 
 	require 'backendfooter.php';
  ?>
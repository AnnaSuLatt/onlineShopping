<?php
	require "frontendheader.php";
?>

<!-- Subcategory Title -->
	<div class="jumbotron jumbotron-fluid subtitle">
  		<div class="container">
    		<h1 class="text-center text-white"> Your Shopping Cart </h1>
  		</div>
	</div>
	
	<!-- Content -->
	<div class="container mt-5">
		
		<!-- Shopping Cart Div -->
		<div class="row mt-5 shoppingcart_div">
			<div class="col-12">
				<a href="<?php echo $GLOBALS['view_path'] ?>" class="btn mainfullbtncolor btn-secondary float-right px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>
		</div>

		<div class="row mt-5 shoppingcart_div">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th colspan="3"> Product </th>
							<th colspan="3"> Qty </th>
							<th> Price </th>
							<th> Total </th>
						</tr>
					</thead>
					<tbody id="shoppingcart_table">
						 <?php 
                            $i=1;
                  		    foreach ($items as $item) {
                                $id = $item['id'];
                                $name = $item['name'];
                                $photo = $GLOBALS['view_path'].$item['photo'];
                                $codeno = $item['codeno'];
                                $price = $item['price'];
                                $discount = $item['discount'];
                               
                               	$itemList = array(
                               		'id'=>$id,
									'name'=>$name,
									'photo'=>$photo,
									'codeno'=>$codeno,
									'price'=>$price,
									'discount'=>$discount,
									);

							//$itemObj=localStorage.getItem("$itemList");
							// var_dump($itemList);

							// die();
                         ?>
                         <script type="text/javascript">
							$(document).ready(function(){
										// var name=$("#name").val();
									// var address=$("#address").val();
									// var age=$("#age").val();
									// var gender=$("input[name='gender']:checked").val();
									// console.log(gender);

									// var students = {
									// 	//name:<?php echo $id; ?>,
									// 	id:<?php echo $id; ?>,
									// 	name:<?php echo $name; ?>,
									// 	photo:<?php echo $photo; ?>,
									// 	codeno:<?php echo $codeno; ?>,
									// 	price:<?php echo $price; ?>,
									// 	discount:<?php echo $discount; ?>,
									// };

									var studentList=localStorage.getItem("<?php echo $itemList; ?>");
									//console.log(studentList);

									var studentArray;
									if(studentList==null){
										studentArray=[];
									}else{
										studentArray=JSON.parse(studentList);
									}			
									studentArray.push(students);
									// console.log(studentArray);

									//LocalStorage is only accept string 
									var studentString=JSON.stringify(studentArray);
									console.log(studentString);

									localStorage.setItem("students",studentString);


								  })
					
						</script>
						<tr>
							<td>
								<button class="btn btn-outline-danger remove btn-sm" style="border-radius: 50%"> 
									<i class="icofont-close-line"></i> 
								</button> 
							</td>
							<td> 
								<img src="<?php echo $photo ?>" class="cartImg">						
							</td>
							<td> 
								<p> <?php echo $name ?></p>
								<p> <?php echo $codeno ?></p>
							</td>
							<td>
								<button class="btn btn-outline-secondary plus_btn"> 
									<i class="icofont-plus"></i> 
								</button>
							</td>
							<td>
								<p> <?php echo $i ?> </p>
							</td>
							<td>
								<button class="btn btn-outline-secondary minus_btn"> 
									<i class="icofont-minus"></i>
								</button>
							</td>
							<td>
								<p class="item-price">
		                        	<?php 
		                        		if($discount > 0)
		                        		{
		                        	?>
		                        		<strike> <?php echo $price; ?> Ks </strike> 
		                        		<span class="d-block"> <?php echo $discount ?> Ks</span>

		                        	<?php } else{ ?>
		                        		<span class="d-block"> <?php echo $discount ?>  Ks</span>
		                        	<?php } ?>
		                        </p>
							</td>
							<td>
								230,000 Ks
							</td>
						</tr>
					<?php } ?>
					</tbody>
					<tfoot id="shoppingcart_tfoot">
						<tr>
							<td colspan="8">
								<h3 class="text-right"> Total : 46,000 Ks </h3>
							</td>
						</tr>
						<tr> 
							<td colspan="5"> 
								<textarea class="form-control" id="notes" placeholder="Any Request..."></textarea>
							</td>
							<td colspan="3">
								<button class="btn btn-secondary btn-block mainfullbtncolor checkoutbtn"> 
									Check Out 
								</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

		<!-- No Shopping Cart Div -->
		<div class="row mt-5 noneshoppingcart_div text-center">
			
			<div class="col-12">
				<h5 class="text-center"> There are no items in this cart </h5>
			</div>

			<div class="col-12 mt-5 ">
				<a href="categories" class="btn btn-secondary mainfullbtncolor px-3" > 
					<i class="icofont-shopping-cart"></i>
					Continue Shopping 
				</a>
			</div>

		</div>
		

	</div>

<?php
	require "frontendfooter.php";
?>
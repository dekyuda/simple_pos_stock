<div class="tbody" counter="<?php echo $i ?>">
						<div class="cell cell1">
							<select name="product_name[]" counter="<?php echo $i ?>" class="product_name counter<?php echo $i ?>">
								<option value=""></option>
								<?php foreach($product->result() as $p){
									echo "
										<option value='$p->id_product'>
											$p->product_name
										</option>
									";
								}?>
							</select>
						</div>
						<div class="cell cell2">
						<input type="text" readonly counter="<?php echo $i ?>" name="product_category[]" class="category counter<?php echo $i ?>">
						</div>
						<div class="cell cell3">
						<input type="number" counter="<?php echo $i ?>" name="product_cost[]" min="0" class="cost counter<?php echo $i ?>">
						</div>
						<div class="cell cell4">
							<input type="number" counter="<?php echo $i ?>" name="product_qty[]" min="0" class="qty counter<?php echo $i ?>">
						</div>
						<div class="cell cell5">
							<input type="text" readonly counter="<?php echo $i ?>" name="product_unit[]" class="unit counter<?php echo $i ?>">
						</div>
						<div class="cell cell6">
							<input type="text" readonly counter="<?php echo $i ?>" name="sub_total[]" class="sub_total counter<?php echo $i ?>">
						</div>
						<div class="cell cell7">
							<input type="number" counter="<?php echo $i ?>" name="product_disc[]" class="disc counter<?php echo $i ?>" min=0 max=100>
						</div>
						<div class="cell cell8" align="center">
							<input type="checkbox" counter="<?php echo $i ?>" name="tax[]" class="tax counter<?php echo $i ?>">
						</div>
						<div class="cell cell9">
							<input type="text" readonly counter="<?php echo $i ?>" name="total[]" class="total counter<?php echo $i ?>">
						</div>
						<div class="cell cell10  counter<?php echo $i ?>" counter="<?php echo $i ?>" align="center"><b class="counter<?php echo $i ?>">x</b></div>
					</div>
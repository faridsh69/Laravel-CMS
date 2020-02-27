<div class="container text-center">
	<h5>This is the place for invoice</h5>
	<div class="row">
		<div class="col-md-6 offset-md-3">
				<div class="col-12">
					<div class="card card-success">
						<div class="card-header">
							Factor 
						</div>
				    	<div class="card-body">
				    		<div class="row">
					    		<div class="col-sm-6">
						    		<label>Number:</label> 29
									<div class="one-third-seperate"></div>
									<label>Shipping:</label> 
									<div class="one-third-seperate"></div>
									<label>
									Date: 
									</label> 
									02/27/2020
								</div>
								<div class="col-sm-6">
									California, livermore
								</div>
							</div>	
							<div class="row">
								<div class="col-sm-6">
									<table class="table table-striped table-hover">
									<thead>
									<tr>
										<th>
											Count	
										</th>
										<th>
											Name
										</th>
										<th>
											Fee
										</th>
										<th>
											Discount
										</th>
									</tr>
									</thead>
									<tbody>
									
									<tr>
										<td>
											1
										</td>
										<td>
											product #931
										</td>
										<td>
											1000
										</td>
										<td>
											900
										</td>
									</tr>

									</tbody>
									</table>
								</div>
								<div class="col-sm-6">
									<dl class="dl-horizontal">
									  	<dt class="big-size">Total</dt>
									  	<dd class="big-size">1320 $</dd>
									  	

										  	<div class="half-seperate"></div>
										  	<dt>Tax</dt>
										  	<dd>200 $</dd>
									  	

									  	<div class="seperate"></div>
									  	<div class="seperate"></div>
									  	<dt class="double-size">Total Price</dt>
									  	<dd class="double-size">
									  		1520 $</dd>
									</dl>
								</div>
							</div>
				    	</div>
				    </div>
				</div>
		</div>
	</div>
	<hr>
	<h5>This is the image of invoice</h5>
	<br>
	<br>
	<!-- <img src="{{ asset('images/front/general/sample-invoice-7.png') }}" class="factor-image-2" alt="invoice"> -->
	<img src="{{ asset('images/front/general/sample-invoice-8.png') }}" class="factor-image" alt="invoice">

</div>


@push('style')
<style>
.factor-image{
	max-width: 100% !important;
	width: 600px;
	margin: 0px auto;
}
.factor-image-2{
	max-width: 100% !important;
	width: 400px;
	margin: 0px auto;
}
</style>
@endpush
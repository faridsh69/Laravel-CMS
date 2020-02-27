<div class="container text-center">
	<h3>This is the place for invoice</h3>
	<div class="row">
		<div class="col-md-6 offset-md-3">
				<div class="col-12">
					<div class="card card-success">
						<div class="card-header">
							سفارش شما 
						</div>
				    	<div class="card-body">
				    		<div class="row">
					    		<div class="col-sm-6">
						    		<label>شماره فاکتور:</label> 29
									<div class="one-third-seperate"></div>
									<label>روش ارسال:</label> 
									<div class="one-third-seperate"></div>
									<label>
									تاریخ فاکتور: 
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
											تعداد	
										</th>
										<th>
											نام کالا
										</th>
										<th>
											قیمت
										</th>
										<th>
											با تخفیف
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
									  	<dt class="big-size">جمع قیمت ها</dt>
									  	<dd class="big-size">1320 تومان</dd>
									  	

										  	<div class="half-seperate"></div>
										  	<dt>Tax</dt>
										  	<dd>200 تومان</dd>
									  	

									  	<div class="seperate"></div>
									  	<div class="seperate"></div>
									  	<dt class="double-size">هزینه قابل پرداخت</dt>
									  	<dd class="double-size">
									  		1520 تومان</dd>
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
	<img src="{{ asset('images/front/general/sample-invoice-7.png') }}" class="factor-image" alt="invoice">

</div>


@push('style')
<style>
.factor-image{
	max-width: 100% !important;
	width: 600px;
	margin: 0px auto;
}
</style>
@endpush
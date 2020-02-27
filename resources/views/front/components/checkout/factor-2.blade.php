<div class="container text-center">
	<h5>This is the place for html invoice</h5>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="row">
				<img src="{{ asset('images/front/general/top-invoice.png') }}" style="width: 100%">
				<div class="col-12" style="height: 500px; background: linear-gradient(#f2f0f1, white);">
				<!-- baldvin ringsted -->
					<div class="row">
						<div class="col-10 offset-1">
							<div class="row">
								<div class="col-5">
									<img src="{{ asset('images/front/general/invoice-data.png') }}">
								</div>
								<div class="col-4 offset-3">
									<p style="font-size: 30px; color: #ccc">INVOICE</p>
									<span>DATE</span>
									<span>March 03, 2020</span>
									<span>INVOICE#</span>
									<span>INV302</span>
								</div>
								<div class="col-12">
									<hr style="background: rgb(175, 198, 229); height: 2px;">
								</div>
								<div class="col-6">
									<span class="invoice-label">Bill To:</span>
									216 Duffield St, Brooklyn, NY 11201, United States
								</div>
								<div class="col-6">
									<span class="invoice-label">Ship To:</span>
									216 Duffield St, Brooklyn, NY 11201, United States
								</div>
								<div class="col-12">
									<table class="table mt-5">
										<thead>
											<th>
												Product ID
											</th>
											<th>
												Description
											</th>
											<th>
												Quantity
											</th>
											<th>
												Unit Price
											</th>
											<th>
												Line Total
											</th>
										</thead>
										<tbody>
											<tr>
												<td>
													P145
												</td>
												<td>
													Art Work Fall
												</td>
												<td>
													1
												</td>
												<td>
													9700.00
												</td>
												<td>
													9700.00
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<h5>This is the image of sample invoice</h5>
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
.invoice-label{
	display: inline-block;
	color: white;
	padding: 5px;
	border-radius: 3px;
	background: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
}
</style>
@endpush
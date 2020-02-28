<div class="container">
	<h5 class="text-center m-4">This is the place for html invoice</h5>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="row">
				<img src="{{ asset('images/front/general/top-invoice.png') }}" style="width: 100%">
				<div class="col-12" style="height: 600px; background: linear-gradient(#f2f0f1, white);">
				<!-- baldvin ringsted -->
					<div class="row">
						<div class="col-10 offset-1">
							<div class="row">
								<div class="col-5">
									<img src="{{ asset('images/front/general/invoice-data.png') }}">
								</div>
								<div class="col-5 offset-2">
									<p style="font-size: 30px; color: rgb(215, 215, 215); font-weight: bold; line-height: 40px;">INVOICE</p>
									<div class="row">
										<div class="col-4">
											<span class="invoice-label-title">DATE</span>
											<span class="invoice-label-title">INVOICE#</span>
										</div>
										<div class="col-8">
											<span class="invoice-label-data">March 03, 2020</span>
											<span class="invoice-label-data">INV302</span>
										</div>
									</div>
								</div>
								<div class="col-12">
									<hr style="background: rgb(175, 198, 229); height: 2px;">
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-3">
											<span class="invoice-label">Bill To:</span>
										</div>
										<div class="col-9">
											<span class="invoice-address">
											216 Duffield St, Brooklyn, NY 11201, United States, 11530
											</span>
										</div>
									</div>
								</div>
								<div class="col-6">
									<div class="row">
										<div class="col-3">
											<span class="invoice-label">Ship To:</span>
										</div>
										<div class="col-9" style="margin-left: -10px;">
											<span class="invoice-address">
											216 Duffield St, Brooklyn, NY 11201, United States 11530
											</span>
										</div>
									</div>
								</div>
								<div class="col-12">
									<table class="table table-striped mt-5 invoice-table">
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
											@foreach([1,2,3,4,5,6] as $row)
											<tr>
												<td>
													
												</td>
												<td>
													
												</td>
												<td>
													
												</td>
												<td>
													
												</td>
												<td>
													
												</td>
											</tr>
											@endforeach
											@foreach([1,2,3,4,5,6] as $row)
											<tr>
												<td></td>
												<td></td>
												<td colspan="2">
													TOTAL DUE
												</td>
												<td>
													14,622.03
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<img src="{{ asset('images/front/general/footer-invoice.png') }}" style="width: 100%">
			</div>
		</div>
	</div>
	<hr>
	<h5 class="text-center m-4">This is the image of sample invoice</h5>
	<br>
	<br>
	<div class="text-center">
		<!-- <img src="{{ asset('images/front/general/sample-invoice-7.png') }}" class="factor-image-2" alt="invoice"> -->
		<img src="{{ asset('images/front/general/sample-invoice-8.png') }}" class="factor-image" alt="invoice">
	</div>
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
	padding: 3px 7px;
	border-radius: 3px;
	background: radial-gradient(rgb(64, 153, 211), rgb(16, 77, 144));
	font-size: 10px;
	margin-right: -10px;
	font-weight: 400;
}
.invoice-label-title{
	color: rgb(31, 81, 154);
	font-size: 11px;
	font-weight: bold;
	display: block;
}
.invoice-label-data{
	font-size: 11px;
	color: #333;
	font-weight: bold;
	display: block;
}
.invoice-address{
	font-size: 12px;
}
.invoice-table thead{
	background: radial-gradient(rgb(64, 153, 211), rgb(16, 77, 144));
	height: 20px;
	color: white;
}
.invoice-table th{
	font-size: 12px; 
	font-weight: normal;
	text-align: center;
	padding: 3px;
	border: 2px solid rgb(26, 87, 174);
}
.invoice-table td{
	color: black;
	font-size: 12px; 
	padding: 3px;
	height: 23px;
	border-right: 2px solid rgb(64, 153, 211);
	border-left: 2px solid rgb(64, 153, 211);
}
.invoice-table{
	border: 2px solid rgb(26, 87, 174);
	empty-cells: show
}
</style>
@endpush
@extends('backend.layouts.app')
@section('content')
<div class="content-page">

	<!-- Start content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
						<h2 class="main-title float-left">Sale Management</h2>
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Home</li>
							<li class="breadcrumb-item">Sale Product</li>
						</ol>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!-- end row -->

			<div class="container fullbody">
				<div class="col-md-12" style="margin-top: -16px;">
					<div class="card">
						{{-- <div class="card-header">
							<h5>{{(@$editData) ? ("Update Sale") : "Add Sale"}}
								<a class="btn btn-sm btn-success float-right" href=""><i class="fa fa-list"></i> Sale List</a>
							</h5>
						</div> --}}

						<!-- Form Start-->
						
						<div class="card-body">
							<div class="form-row">
								<div class="form-group col-md-3">
									<label class="control-label">Customer Name <span style="color: red;">*</span></label>
									<input type="text" name="name" id="name" class="form-control form-control-sm" value="{{@$editData->name}}" placeholder="Customer Name" required autocomplete="off">
								</div>
								<div class="form-group col-md-3">
									<label class="control-label">Mobile <span style="color: red;">*</span></label>
									<input type="text" name="phone" id="phone" class="form-control form-control-sm phone" value="{{@$editData->phone}}" placeholder="Mobile No" required autocomplete="off">
								</div>
								<div class="form-group col-md-3">
									<label class="control-label">Email</label>
									<input type="text" name="email" id="email" class="form-control form-control-sm email" value="{{@$editData->email}}" placeholder="Email" autocomplete="off">
								</div>
								<div class=" col-sm-3">
									<label>Address</label><br>
									<textarea class="textarea_width address" id="address" name="address" autocomplete="off">{{ !empty($editData['address'])? $editData['address'] : '' }} </textarea> @error('address')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span> @enderror
								</div>

								<div class="form-group col-md-3">
									<label class="control-label">Invoice Date</label>
									<input type="text" name="transaction_date" id="transaction_date" class="form-control form-control-sm singledatepicker transaction_date" value="{{ Date('d-m-Y') }}" placeholder="YYYY-MM-DD" autocomplete="off" disabled>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label">Payment Type <span style="color: red;">*</span></label>
									<select name="payment_type_id" id="payment_type" class="form-control form-control-sm select2 payment_type">
										<option value="">Select Payment Type</option>
										@foreach($payment_types as $key => $value)
										<option value="{{ $value['id'] }}">{{ $value->name }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group col-md-3 " id="mobile_div" style="display: none;">
									<label class="control-label number_lavel"> <span style="color: red;">*</span></label>
									<input type="text" name="number" id="number" class="form-control form-control-sm number_input" value="{{@$editData->number}}" placeholder="Number" autocomplete="off">
								</div>

								<div class="form-group col-md-3 bank_name" style="display: none;">
									<label class="control-label ">Bank Name<span style="color: red;">*</span></label>
									<input type="text" name="bank_name" id="bank_name" class="form-control form-control-sm" value="{{@$editData->bank_name}}" placeholder="Bank Name" autocomplete="off">
								</div>
								<div class="form-group col-md-3 check_no" style="display: none;">
									<label class="control-label ">Check No. <span style="color: red;">*</span></label>
									<input type="text" name="check_no" id="check_no" class="form-control form-control-sm" value="{{@$editData->check_no}}" placeholder="Check No." autocomplete="off">
								</div>
								<div class="form-group col-md-3 check_date" style="display: none;">
									<label class="control-label">Check Date<span style="color: red;">*</span></label>
									<input type="text" name="check_date" id="check_date" class="form-control form-control-sm singledatepicker" value="" placeholder="YYYY-MM-DD" autocomplete="off" >
								</div>
								<!-- <div class="form-group col-md-3 card_no" style="display: none;">
									<label class="control-label ">Card No. <span style="color: red;">*</span></label>
									<input type="text" name="card_no" id="card_no" class="form-control form-control-sm" value="{{@$editData->card_no}}" placeholder="Card No." autocomplete="off">
								</div> -->
								<div class="form-group col-md-3 card_owner" style="display: none;">
									<label class="control-label ">Card Owner <span style="color: red;">*</span></label>
									<input type="text" name="card_owner" id="card_owner" class="form-control form-control-sm" value="{{@$editData->card_owner}}" placeholder="Card Owner" autocomplete="off">
								</div>
								<hr style="width:100%;text-align:left;margin-left:0; border: 1px solid; border-color: lightgrey;">
								
								<div class="form-group col-md-3">
									<label class="control-label">Barcode <span style="color: red;">*</span></label>
									<input type="text" name="barcode" id="barcode" class="form-control form-control-sm barcode" value="{{@$editData->barcode}}" placeholder="Barcode" autocomplete="off">
									<input type="hidden" name="warranty" id="warranty" class="warranty" value="">
								</div>
								
								<div class="form-group col-md-4">
									<label class="control-label">Product</label>
									<select name="product_id" id="product_id" class="form-control form-control-sm select2 product_id">
										<option value="">Select Product</option>
										
									</select>
								</div>

								<div class="form-group col-md-3 ime_div" style="display: none;">
									<label class="control-label">IME/SL <span style="color: red;">*</span></label>
									<input type="text" name="ime" id="ime" class="form-control form-control-sm ime" value="{{@$editData->ime}}" placeholder="IME/SL" autocomplete="off">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3 all_quantity">
									<label class="control-label">Quantity <span style="color: red;">*</span></label>
									<input type="text" name="quantity" id="quantity" class="form-control form-control-sm quantity" value="" placeholder="Quantity" autocomplete="off">
								</div>
								<div class="form-group col-md-3 mobile_quantity" style="display: none;">
									<label class="control-label">Quantity <span style="color: red;">*</span></label>
									<input type="text"  id="m_quantity" class="form-control form-control-sm m_quantity" value="1" placeholder="Quantity" readonly>
								</div>
								<div class="form-group col-md-3">
									<label class="control-label">Unit Price <span style="color: red;">*</span></label>
									<input type="text" name="unit_price" id="unit_price" class="form-control form-control-sm unit_price" value="{{@$editData->unit_price}}" placeholder="Unit Price" autocomplete="off">
								</div>
								<div class="form-group col-md-3">
									<label class="control-label">Discount</label>
									<input type="text" name="discount" id="discount" class="form-control form-control-sm discount" value="{{(@$editData->discount)}}" placeholder="Discount" autocomplete="off">
								</div>



								<div class="form-group col-md-1" style="margin-top: 29px;margin-left: 21px;">
									<a class="btn btn-info btn-m addeventmore" ><i class="fa fa-plus-circle"></i> Add</a>
								</div>
							</div>
							
						</div>

						<div class="card-body">
							<form method="post" action="{{ route('sale-management.sale.product.store') }}" id="myForm">
								{{csrf_field()}}
								<table class="table-sm table-bordered" width="100%">
									<thead>
										<tr>
											<th>SL</th>
											<th width="25%">Product Info</th>
											<th>IME/SL</th>
											<th>Warranty</th>
											<th>Quantity</th>
											<th>Unit Price</th>
											<th>Discount</th>
											<th width="15%">Total Price</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody id="addRow" class="addRow">

									</tbody>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td colspan="7" style="text-align: right;"><b>Net Amout</b></td>
											<td>
												<input type="text" name="total_net_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly style="background-color: #D8FDBA">
												<input type="hidden" class="form-control form-control-sm text-right total_discount" name="total_discount_amount"  value="">
												<input type="hidden" class="form-control form-control-sm text-right total_quantity" name="total_quantity"  value="">

												
											</td>
											<td></td>
										</tr>
									</tbody>
								</table>
								<input id="name_io" type="hidden" name="name">
								<input id="phone_io" type="hidden" name="phone">
								<input id="email_io" type="hidden" name="email">
								<input id="address_io" type="hidden" name="address">
								<input id="transaction_date_io" type="hidden" name="transaction_date">
								<input id="payment_type_io" type="hidden" name="pay_type">
								<input id="number_io" type="hidden" name="mobile_no">
								<input id="bank_name_io" type="hidden" name="bank_name">
								<input id="check_no_io" type="hidden" name="check_no">
								<input id="check_date_io" type="hidden" name="check_date">
								<!-- <input id="card_no_io" type="hidden" name="card_no"> -->
								<input id="card_owner_io" type="hidden" name="card_owner">
								<br>
								<div class="form-group">
									<button type="submit" class="btn btn-m btn-info sale_btn" id="sale_btn">Sale</button>
								</div>
							</form>
						</div>
						
						<!--Form End-->

					</div>
				</div>
			</div>

		</div>
		<!-- END container-fluid -->

	</div>
	<!-- END content -->
	<!-- Button trigger modal -->
	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Launch demo modal
	</button> -->

	<!-- Modal -->
	@if(Session::has('print'))
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Invoice Print</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					For invoice print please click on print button. Thank you!
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a type="button" href="{{route('sale-management.sale.product.pdf').'?invoice_no='.session::get('print')}}" class="btn btn-primary" target="_blank">Print</a>
				</div>
			</div>
		</div>
	</div>
	@endif

</div>
<!-- END content-page -->

<!-- Extra HTML for If exist Event -->
<script id="document-template" type="text/x-handlebars-template">
	<tr class="delete_add_more_item" id="delete_add_more_item">
		<input type="hidden" name="product_id[]"  value="@{{ product_id }}">
		<input type="hidden" name="ime[]"  value="@{{ ime }}">

		<td>
			@{{ counter }}
		</td>
		<td>
			@{{product_name}}
			
		</td>
		<td>
			@{{ime}}
			
		</td>	
		<td>
			@{{ warranty }}
		</td>
		<td>
			<input type="number" class="form-control form-control-sm text-right t_quantity" name="quantity[]"  value="@{{ quantity }}" readonly>
		</td>
		<td>
			<input class="form-control form-control-sm text-right unit_price" name="unit_price[]"  value="@{{ unit_price }}">
		</td>
		
		<td>
			<input class="form-control form-control-sm text-right discount" name="discount[]"  value="@{{ discount }}">
		</td>
		<td>
			<input class="form-control form-control-sm text-right total_price" name="total_price[]"  value="@{{ total_price }}">

			

		</td>
		<td><i class="btn btn-danger fa fa-close removeeventmore">remove </i></td>

	</tr>
	
</script>


<!-- extra_add_exist_item -->
<script type="text/javascript">
	$(document).ready(function () {
		$('#exampleModal').modal('show');
		var counter = 1;
		$(document).on("click",".addeventmore", function () {

			var ime  = $('#ime').val();
			var product_id  = $('#product_id').val();
			var warranty  = $('#warranty').val();
			var product_name = $('#product_id').find('option:selected').text();
			var barcode  = $('#barcode').val();
			var quantity  = $('#quantity').val();
			// var m_quantity  = $('#m_quantity').val();
			var unit_price  = $('#unit_price').val();
			var discount  = $('#discount').val();
			var res = product_name.split("-");
			var n = res[0].localeCompare('Mobile');
			// alert(n);
			if(n != 1)
			{
				ime = '';
			}
			if(quantity != '')
			{
				var total_price = (unit_price * quantity) - discount;
			}
			
			if(barcode==''){
				$.notify("Barcode is required", {globalPosition: 'top right',className: 'error'});
				return false;
			}
			if(product_id=='' || product_id == null){
				$.notify("Valid product is required", {globalPosition: 'top right',className: 'error'});
				return false;
			}
			if(n == 1 && ime == ''){
				$.notify("IME is required", {globalPosition: 'top right',className: 'error'});
				return false;
			}
			if(quantity=='' || quantity == 0){
				$.notify("Quantity is required", {globalPosition: 'top right',className: 'error'});
				return false;
			}
			if(unit_price=='' || unit_price<=0){
				$.notify("Unit Price is required", {globalPosition: 'top right',className: 'error'});
				return false;
			}
			$.ajax({
				url: "{{route('sale-management.sale.product.quantity.check')}}",
				type: "GET",
				data: { quantity: quantity,product_id:product_id,ime:ime },
				success: function (data) {
					if(data['stock'] == 'stock_fail')
					{
						// console.log(data);
						$.notify("Quantity higher than stock", {globalPosition: 'top right',className: 'error'});
						return false;
					}
					if(data['ime'] == 'ime_fail')
					{
						$.notify("IME invalid.", {globalPosition: 'top right',className: 'error'});
						return false;
					}
					if(n == 1 && data['ime'] == 'ime_success' && data['stock'] == 'stock_success')
					{
						var source = $("#document-template").html();
						var template = Handlebars.compile(source);
						var data= {product_id:product_id,product_name:product_name,barcode:barcode,quantity:quantity,unit_price:unit_price,discount:discount,counter:counter,ime:ime,warranty:warranty,total_price:total_price};
						var html = template(data);
						$("#addRow").append(html);
						counter ++;
						$('#ime').val('');
						$('#warranty').val('');
						$('#barcode').val('');
						$('.ime_div').hide();
						$('#quantity').val('');
						$('.mobile_quantity').hide();
						$('.all_quantity').show();
						$('#unit_price').val('');
						$('#discount').val('');
						$(".product_id").html('');
						totalAmountPrice();
					}
					if(n != 1  && data['stock'] == 'stock_success')
					{
						var source = $("#document-template").html();
						var template = Handlebars.compile(source);
						var data= {product_id:product_id,product_name:product_name,barcode:barcode,quantity:quantity,unit_price:unit_price,discount:discount,counter:counter,ime:ime,warranty:warranty,total_price:total_price};
						var html = template(data);
						$("#addRow").append(html);
						counter ++;
						$('#ime').val('');
						$('#warranty').val('');
						$('#barcode').val('');
						$('.ime_div').hide();
						$('#quantity').val('');
						$('.mobile_quantity').hide();
						$('.all_quantity').show();
						$('#unit_price').val('');
						$('#discount').val('');
						$(".product_id").html('');
						totalAmountPrice();
					}

				},
			});

			
			
			
			

		});

		$(document).on("click", ".removeeventmore", function (event) {
			$(this).closest(".delete_add_more_item").remove();
			totalAmountPrice();     
		});
		$(document).on('click','.sale_btn',function(){
			var transaction_date = $('#transaction_date').val();
			var name = $('#name').val();
			var phone = $('#phone').val();
			var email = $('#email').val();
			var address = $('#address').val();
			var payment_type = $('#payment_type').val();
			var number = $('#number').val();
			var bank_name = $('#bank_name').val();
			var check_no = $('#check_no').val();
			var check_date = $('#check_date').val();
			// var card_no = $('#card_no').val();
			var card_owner = $('#card_owner').val();
			var supplier = $('#supplier_select_id').val();
			var v = $('#payment_type').find('option:selected').text();
			var netamount = $('#estimated_amount').val();
			

			if(name==''){
				$.notify("Customer name is required.", {globalPosition: 'top right',className: 'error'});
				return false;
			}
			if(phone==''){
				$.notify("Customer mobile is required.", {globalPosition: 'top right',className: 'error'});
				return false;
			}

			if(v == 'Bank Check')
			{
				if(bank_name==''){
					$.notify("Bank name is required.", {globalPosition: 'top right',className: 'error'});
					return false;
				}
				if(check_no==''){
					$.notify("Check no is required.", {globalPosition: 'top right',className: 'error'});
					return false;
				}
				if(check_date==''){
					$.notify("Check date is required.", {globalPosition: 'top right',className: 'error'});
					return false;
				}
			}
			if(v == 'Bkash')
			{
				if(number==''){
					$.notify("Bkash number is required.", {globalPosition: 'top right',className: 'error'});
					return false;
				}
			}
			if(v == 'Rocket')
			{
				if(number==''){
					$.notify("Rocket number is required.", {globalPosition: 'top right',className: 'error'});
					return false;
				}

			}
			if(v == 'Nagad')
			{
				if(number==''){
					$.notify("Nagad number is required.", {globalPosition: 'top right',className: 'error'});
					return false;
				}
			}
			if(v == 'Card')
			{
				// if(card_no==''){
				// 	$.notify("Card no is required.", {globalPosition: 'top right',className: 'error'});
				// 	return false;
				// }
				// if(card_owner==''){
				// 	$.notify("Card owner is required.", {globalPosition: 'top right',className: 'error'});
				// 	return false;
				// }
			}
			if(v == 'Select Payment Type'){
				$.notify("Payment Type is required.", {globalPosition: 'top right',className: 'error'});
				return false;
			}
			if(netamount <= 0){
				$.notify("Product is required", {globalPosition: 'top right',className: 'error'});
				return false;
			}


			$('#name_io').val(name);
			$('#phone_io').val(phone);
			$('#email_io').val(email);
			$('#address_io').val(address);
			$('#transaction_date_io').val(transaction_date);
			$('#payment_type_io').val(payment_type);
			$('#number_io').val(number);
			$('#bank_name_io').val(bank_name);
			$('#check_no_io').val(check_no);
			$('#check_date_io').val(check_date);
			// $('#card_no_io').val(card_no);
			$('#card_owner_io').val(card_owner);
			
			// window.open("{{route('sale-management.invoice.print')}}");

		});
		
		$(document).on('keyup click','.unit_price,.t_quantity,.discount,.total_price',function(){
			var unit_price 	= $(this).closest("tr").find("input.unit_price").val();
			var qty 		= $(this).closest("tr").find("input.t_quantity").val();
			var discount 		= $(this).closest("tr").find("input.discount").val();
			var total_price 		= $(this).closest("tr").find("input.total_price").val();
			var total 		= (unit_price * qty) - discount;
			$(this).closest("tr").find("input.total_price").val(total);
			totalDiscount();
			totalAmountPrice();
			totalQuantity();
		});
		
		//calculate sum of amount in invoice
		function totalAmountPrice(){
			var sum=0;
			$(".total_price").each(function(){
				var value = $(this).val();			    		
				if(!isNaN(value) && value.length != 0) {
					sum += parseFloat(value);			        
				}
			});
			$('#estimated_amount').val(sum);
		}
		function totalDiscount(){
			var qt=0;
			$(".discount").each(function(){
				var value = $(this).val();			    		
				if(!isNaN(value) && value.length != 0) {
					qt += parseFloat(value);			        
				}
			});
			// alert(qt);
			$('.total_discount').val(qt);
		}
		function totalQuantity(){
			var qt=0;
			$(".t_quantity").each(function(){
				var value = $(this).val();			    		
				if(!isNaN(value) && value.length != 0) {
					qt += parseFloat(value);			        
				}
			});
			// alert(qt);
			$('.total_quantity').val(qt);
		}
	});
</script>

{{-- <script type="text/javascript">
	$(function(){
		$(document).on('change','#supplier_id',function(){
			var supplier_id = $(this).val();
			$.ajax({
				url:"",
				type:"GET",
				data:{supplier_id:supplier_id},
				success:function(data){
					var html = '<option value="">Select Category</option>';
					$.each( data, function( key, v ) {
						html +='<option value="'+v.category_id+'">'+v.category.name+'</option>';
					});
					$('#category_id').html(html);
					var category_id = "{{@$editData->category_id}}";
					if(category_id !=''){
						$('#category_id').val(category_id).trigger('change');
					}
				}
			});
		});
	});
</script> --}}

{{-- <script type="text/javascript">
	$(function(){
		$(document).on('change','.category_id',function(){
			var category_id = $('.category_id').val();
			$.ajax({
				url:"",
				type:"GET",
				data:{category_id:category_id},
				success:function(data){
					var html = '<option value="">Select Product</option>';
					$.each( data, function( key, v ) {
						html +='<option value="'+v.id+'">'+v.name+'</option>';
					});
					$('#product_id').html(html);
					var product_id = "{{@$editData->product_id}}";
					if(product_id !=''){
						$('#product_id').val(product_id);
					}
				}
			});
		});
	});
</script> --}}

<script type="text/javascript">
	$(function(){
		var supplier_id = "{{@$editData->supplier_id}}";
		if(supplier_id){
			$('#supplier_id').val(supplier_id).trigger('change');
		}
	});
</script>
{{-- 
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myForm').validate({
				ignore:[],
				errorPlacement: function(error, element){
					if (element.attr("name") == "supplier_id" ){ error.insertAfter(element.next()); }
					else if (element.attr("name") == "category_id" ){error.insertAfter(element.next()); }
					else if (element.attr("name") == "product_id" ){error.insertAfter(element.next()); }
					else{error.insertAfter(element);}
				},
				errorClass:'text-danger',
				validClass:'text-success',
				rules : {
					date : {
						required : true,
					},
					purchase_no : {
						required : true,
					},
					supplier_id : {
						required : true,
					},
					category_id : {
						required : true,
					},
					product_id : {
						required : true,
					},
					buying_qty : {
						required : true,
					},
					unit_price : {
						required : true,
					},
					unit_price : {
						required : true,
					},
				},
				messages : {

				}
			});
		});
	</script> --}}
	<script type="text/javascript">
		$(function(){
			$(document).on("input", ".barcode", function () {
				let barcode = $(this).val();
			// var this_div = $(this).parent().parent();
			// var qty = $(this).parent().parent().find(".quantity").val();
            // alert(qty);
            
            $(".product_id").html('');

            $.ajax({
            	url: "{{route('purchase-management.get.product')}}",
            	type: "GET",
            	data: { barcode: barcode },
            	success: function (data) {
            		if(data.category.name == 'Mobile')
            		{

            			$('.ime_div').show();
            			$('.all_quantity').hide();
            			$('.mobile_quantity').show();
            			$('.quantity').val(1);
            		}
            		else
            		{
                    	// alert('test');
                    	$('.ime_div').hide();
                    	$('.all_quantity').show();
                    	$('.mobile_quantity').hide();
                    	// $(".m_quantity").val('');

                    }
                    $(".product_id").html(data.dt);
                    $(".warranty").val(data.warranty);
                    

                    var unit_price = data.price;
                    // let total = getTotal(qty, unit_price);
                    // this_div.find(".total_price").val(total);
                },
            });
        });
			$(document).on('change','.payment_type',function(){
				var v = $(this).find('option:selected').text();
				if(v == 'Bank Check')
				{
					$('#mobile_div').hide();
					$('.bank_name').show();
					$('.check_no').show();
					$('.check_date').show();
					// $('.card_no').hide();
					$('.card_owner').hide();
					$('.number_input').val('');
				}
				else if(v == 'Cash')
				{
					$('#mobile_div').hide();
					$('.bank_name').hide();
					$('.check_no').hide();
					$('.check_date').hide();
					// $('.card_no').hide();
					$('.card_owner').hide();
				}
				else if(v == 'Bkash')
				{
					$('#mobile_div').show();
					$('.number_lavel').html('Bkash Number');
					$('.bank_name').hide();
					$('.check_no').hide();
					$('.check_date').hide();
					// $('.card_no').hide();
					$('.card_owner').hide();
				}
				else if(v == 'Rocket')
				{
					$('#mobile_div').show();
					$('.number_lavel').html('Rocket Number');
					$('.bank_name').hide();
					$('.check_no').hide();
					$('.check_date').hide();
					// $('.card_no').hide();
					$('.card_owner').hide();

				}
				else if(v == 'Nagad')
				{
					$('#mobile_div').show();
					$('.number_lavel').html('Nagad Number');
					$('.bank_name').hide();
					$('.check_no').hide();
					$('.check_date').hide();
					// $('.card_no').hide();
					$('.card_owner').hide();
				}
				else if(v == 'Card')
				{
					$('#mobile_div').hide();
					$('.bank_name').hide();
					$('.check_no').hide();
					$('.check_date').hide();
					// $('.card_no').show();
					$('.card_owner').show();


				}

			});
		});

	</script>

	@endsection
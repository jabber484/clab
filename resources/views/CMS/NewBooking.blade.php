@extends('master')

@section('style')
<link href="{{asset("css/catalog.css")}}" rel="stylesheet">
<link href="{{asset("css/form.css")}}" rel="stylesheet">
@endsection	
	
@section('content')
<section class="project">
	<div class="container">
		<div class="content-title">
			New Booking
		</div>

		<div class="col-xs-12">
			<div class="row">
				<div class="col-md-6">
					<div class="field">
						<div class="subtitle">Shopping Cart</div>
						<div class="cart-wrapper">
							<div class="cart-empty" style="display: none;">No Item</div>
							<div class="cart-item-wrapper">
							</div>
						</div>
					</div>

					<div class="field">
						<div class="subtitle">Duration</div>
						<div class="duration-wrapper field">
							<div class="col-xs-12 col-sm-6">
								{{-- From --}}
								<div class="subtitle">From</div>
								<div class="field">
									<select id="fYear">
										@for ($i = $year; $i <= 2047; $i++)
										<option value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
									<select id="fMonth">
										@for ($i = 1; $i <= 12; $i++)
										<option @if($i == $month) selected @endif value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
										@endfor
									</select>
									<select id="fDay">
										@for ($i = 1; $i <= 31; $i++)
										<option @if($i == $day) selected @endif value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
										@endfor
									</select>
								</div>
							</div>
							
							<div class="col-xs-12 col-sm-6">
								{{-- To --}}
								<div class="subtitle">To</div>
								<div class="field">
									<select id="tYear">
										@for ($i = $year; $i <= 2047; $i++)
										<option value="{{$i}}">{{$i}}</option>
										@endfor
									</select>
									<select id="tMonth">
										@for ($i = 1; $i <= 12; $i++)
										<option @if($i == $month) selected @endif value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
										@endfor
									</select>
									<select id="tDay">
										@for ($i = 1; $i <= 31; $i++)
										<option @if($i == $day) selected @endif value="{{$i<10?'0'.$i:$i}}">{{$i<10?'0'.$i:$i}}</option>
										@endfor
									</select>
								</div>
							</div>							
						</div>
					</div>

					<div class="field submit-btn submit-btn-catalog btn-sub">
						<button class="btn btn-success btn-sub">Submit</button>
						<button style="display: none" type="button" class="btn btn-success btn-loading">Loading...</button>
					</div>
					<div class="field submit-btn-catalog btn-loading" style="display: none">
						<button type="button" class="btn btn-success ">Loading...</button>
					</div>
					
					<div class="field">
						<div class="subtitle">Current Booking</div>
						<div class="field">
						@include("parts.calendar")
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="field">
						<div class="subtitle">Catalog</div>
						<div class="catalog-wrapper">
						@include("parts.catalogShowcase")
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</section>



<script>
var cart = [];
var prescripted = '{{$prescripted}}';

function renderCart(){
	var name;
	var allX = true;

	$(".cart-item-wrapper").html("");
	$.each(cart, function(key,value){
		if(value != 'X'){
			allX = false;
		} else 
			return;

		name = $("#"+value+".item-title").html();
		$(".cart-item-wrapper").append("<div class='cart-item-spacer'></div>");
		$(".cart-item-spacer:last").append("<div class='cart-item'>" + name + "</div>");
		$(".cart-item-spacer:last").append("<button class='btn cart-item-delete' value='" + value + "'>" + "Delete" + "</button>");
	});

	if(allX){
		$(".cart-empty").show();
		return 0;
	} else {
		$(".cart-empty").hide();
	}
}

//add item
$('.item-add').click(function(){
	var item_id = $(this).attr('id');

	if(!cart.includes(item_id)){
		cart.push(item_id);
		renderCart();
	}
});

//delete item
$("body").on('click', '.cart-item-delete', function(event) {
	var item_id = event['target']['value'];
	cart[cart.indexOf(item_id)] = "X";
	console.log(cart);
	renderCart();
});

$(function(){
	if(prescripted != 'X')
		$("#"+prescripted+".item-add").click();
	renderCart();

	$('.submit-btn').click(function(){
		//validate....
		
		$(".btn-loading").show();
		$(".btn-sub").hide();
		// return;
		var final_cart = [];
		$.each(cart, function(key,value){
			if(value != "X"){
				final_cart.push(value);
			}
		});
		if(final_cart.length == 0){
			alert("No item in kart!")
			$(".btn-sub").show();
			$(".btn-loading").hide();
			return false; 
		}

		$.post("/booking/create" ,{ 
			item : JSON.stringify(final_cart),
			from : $("#fYear").val() + "-" + $("#fMonth").val() + "-" + $("#fDay").val(),
			to : $("#tYear").val() + "-" + $("#tMonth").val() + "-" + $("#tDay").val(),
		})
		.fail(function(xhr, ajaxOptions, thrownError) {
		    console.log(xhr.responseText);
		    console.log(thrownError);
		    console.log('Ajax Error');
		}).done(function(xhr, ajaxOptions, thrownError) {
			var result = xhr;

			if(result['success']){
				// alert("Booking was perfromed!");
				window.location.replace("/book/success");
			} else {
				if(result['code'] == 0){
					var message = "The following item is not avalibale during you submitted period:\n";
					$.each(result['item_NA_des'], function(key,item){
						message = message + item['name'] + ": not avalible till " + item['to'] + "\n";
					});
					alert(message);
				} else if (result['code'] == 1){
					alert(result['message']);
				}
			}
			$(".btn-sub").show();
			$(".btn-loading").hide();
		});
	});
});


</script>
@endsection
@extends('layouts.index')
@section('content')




@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">

		<div class="container"><br><br><br><br>
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div  class="wrap-slick3-dots"></div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                @foreach ($product->images->take(3) as $image)
                                    <div class="item-slick3" data-thumb="{{ asset($image->image_path) }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img style="height:600px ;width:515px" src="{{ asset($image->image_path) }}" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                               href="{{ asset($image->image_path) }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>


				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            {{ $product->name }}
						</h4>

                        <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
						</p><br>

						<span class="mtext-106 cl2">
                            <strong>Starting Auction Price:</strong> ${{ number_format($product->starting_price, 2) }}
						</span> <br><br>

                        <span class="mtext-106 cl2">
                            <strong>Total Bids:</strong> {{ $product->priceOffers->count() }}
                        </span><br><br>

                        <span class="mtext-106 cl2">
                            <strong>Highest Bid:</strong>
                             @if($product->highestOffer)
                             ${{ number_format($product->highestOffer->offer_price, 2) }}
                             @else
                             No bids have been placed yet.
                             @endif
						</span><br><br>
                        <span class="mtext-106 cl2">
                            <strong>Time Remaining:</strong> {{ $remainingTime }}
                        </span>



						<div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                        <button id="btn-decrement" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" disabled>
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </button>

                                        <!-- Display the initial price -->
                                        <input id="num-product" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product"
                                            value="{{ number_format($displayedPrice, 2) }}" readonly>

                                        <button id="btn-increment" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </button>
                                    </div>

                                    <script>
                                        // Parse the displayed price and increment value from Blade
                                        const startingPrice = parseFloat("{{ $product->starting_price }}");
                                        const displayedPrice = parseFloat("{{ $displayedPrice }}");
                                        const incrementValue = parseFloat("{{ $incrementValue }}");

                                        const decrementBtn = document.getElementById('btn-decrement');
                                        const incrementBtn = document.getElementById('btn-increment');
                                        const numProductInput = document.getElementById('num-product');

                                        // Initialize the input value
                                        numProductInput.value = displayedPrice.toFixed(2);

                                        // Increment button functionality
                                        incrementBtn.addEventListener('click', () => {
                                            let currentValue = parseFloat(numProductInput.value);
                                            currentValue += incrementValue; // Increase by incrementValue
                                            numProductInput.value = currentValue.toFixed(2);

                                            // Enable decrement button if value goes above the starting price
                                            if (currentValue > startingPrice) {
                                                decrementBtn.disabled = false;
                                            }
                                        });

                                        // Decrement button functionality
                                        decrementBtn.addEventListener('click', () => {
                                            let currentValue = parseFloat(numProductInput.value);
                                            currentValue -= incrementValue; // Decrease by incrementValue
                                            numProductInput.value = currentValue.toFixed(2);

                                            // Disable decrement button if value reaches the displayed price
                                            if (currentValue <= displayedPrice) {
                                                decrementBtn.disabled = true;
                                            }
                                        });
                                    </script>

                                    <!-- Bid Button -->
                                    <form action="{{ route('product.placeBid', $product->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="bid_price" id="hidden-bid-price" value="{{ number_format($displayedPrice, 2) }}"><br>
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Bid
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Update the hidden bid price field whenever the input value changes
                            numProductInput.addEventListener('input', () => {
                                const hiddenBidPrice = document.getElementById('hidden-bid-price');
                                hiddenBidPrice.value = numProductInput.value;
                            });

                            // Ensure the hidden input is updated on increment and decrement
                            incrementBtn.addEventListener('click', () => {
                                document.getElementById('hidden-bid-price').value = numProductInput.value;
                            });

                            decrementBtn.addEventListener('click', () => {
                                document.getElementById('hidden-bid-price').value = numProductInput.value;
                            });
                        </script>

						<!--  -->
						<div class="flex-w flex-m p-l-100 p-t-40 respon7" style="visibility: hidden">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
								<i class="fa fa-twitter"></i>
							</a>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>


	</section>


	<!-- Related Products -->
	




	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								Lightweight Jacket
							</h4>

							<span class="mtext-106 cl2">
								$58.79
							</span>

							<p class="stext-102 cl3 p-t-23">
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.
							</p>

							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Size
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Size S</option>
												<option>Size M</option>
												<option>Size L</option>
												<option>Size XL</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Color
									</div>

									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="time">
												<option>Choose an option</option>
												<option>Red</option>
												<option>Blue</option>
												<option>White</option>
												<option>Grey</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button>
									</div>
								</div>
							</div>

							<!--  -->
							<div class="flex-w flex-m p-l-100 p-t-40 respon7">
								<div class="flex-m bor9 p-r-10 m-r-11">
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
										<i class="zmdi zmdi-favorite"></i>
									</a>
								</div>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
									<i class="fa fa-facebook"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
									<i class="fa fa-twitter"></i>
								</a>

								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
									<i class="fa fa-google-plus"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endsection



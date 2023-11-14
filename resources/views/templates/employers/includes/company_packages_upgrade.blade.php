@if($packages->count())
<div class="card widget-dashboard mb-3 w-100 shadow-sm">
    <div class="card-body">
		<div class="paypackages"> 
			<!---four-paln-->
			<div class="four-plan">
				<h3 class="title text-left">{{__('Upgrade Package')}}</h3>
				{{--<div class="our-packages">
					@php
						$language = \App::getLocale();
                        $currency = \App\Country::where('lang', $language)->first()->currency ?? 'vnd';
					@endphp
					<div class="row"> @foreach($packages as $package)
							@php
                                $curr = isset($package) ? $package->currency : $currency;
                                $price = $curr == 'vnd' ? number_format($package->package_price, 0, ',', '.') : number_format($package->package_price, 2, '.', ',');
                                $formatDate = $language == 'vi' ? 'd-m-Y' : 'd M, Y';
							@endphp
						<div class="col-md-4 col-sm-6 col-xs-12 item-package">
							<div class="package">
								<h3 class="package-title">{{$package->package_title}}</h3>
								<div class="price">
									{{$price}}<small>{{$curr}}</small>
								</div>
								<hr>
								<ul>
									<li>{{__('Can post jobs')}} : {{$package->package_num_listings}}</li>
									<li>{{__('Package Duration')}} : {{$package->package_num_days}} {{__('Days')}}</li>
								</ul>
								<a href="javascript:void(0)" data-toggle="modal" data-target="#buypack{{$package->id}}" class="btn btn-primary">{{__('Buy Now')}}</a>
							</div>
							
							<div class="modal modal-upgrade-package fade" id="buypack{{$package->id}}" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<i class="fa fa-times"></i>
										</button>
										<div class="invitereval">
											<h3>{{__('Please Choose Your Payment Method to Pay')}}</h3>
											<div class="totalpay">{{__('Total Amount to pay')}}: <strong>{{$package->package_price}}</strong></div>
												<ul class="btn2s">
												@if((bool)$siteSetting->is_paypal_active)
												<li class="order paypal"><a href="{{route('order.upgrade.package', $package->id)}}">{{__('Paypal')}}</a></li>
												@endif
												@if((bool)$siteSetting->is_stripe_active)
												<li class="order"><a href="{{route('stripe.order.form', [$package->id, 'upgrade'])}}">{{__('Stripe')}}</a></li>
												@endif
												@if((bool)$siteSetting->is_payu_active)
												<li class="order payu"><a href="{{route('payu.order.package', ['package_id='.$package->id, 'type=upgrade'])}}">{{__('PayU')}}</a></li>
												@endif
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach 
					</div>
				</div>--}}


				{{--
				<?php

				if((bool)config('company.is_company_package_active')){        

				$packages = App\Package::where('package_for', 'like', 'employer')->get();

				$package = Auth::guard('company')->user()->getPackage();
				?>
				<?php if(null !== $package){ ?>

				@include('templates.employers.includes.company_package_msg')

				@include('templates.employers.includes.company_packages_upgrade')

				<?php }elseif(null !== $packages){ ?>

				@include('templates.employers.includes.company_packages_new')

				<?php }} ?>--}}
			</div>
			<!---end four-paln--> 
		</div>
	</div>
</div>
@endif

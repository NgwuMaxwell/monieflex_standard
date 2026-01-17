
@include($activeTemplate.'partials.headers')

						  
<div class="content-body">
			<div class="container-fluid">
				<div class="row">
				<!--- Code Start --->
				
				
                <div class="row">
                <div class="col-xl-12">
                <div class="card">
                <div class="card-body">
                <div class="row">
                
                <div class="col-lg-12 order-lg-1">
                <h4 class="mb-3">   Deposit Confirm</h4><br/>
                

                
               <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->

<section class="content">

	

<center>
<div class="callout callout-info">
				
                                        <b class="text-success">{{showAmount($data['final_amo']) .' '.$data['method_currency'] }} </b> @lang('for successful payment')

                                    <h4 class="text-center mb-4">@lang('Please follow the instruction below')</h4>
				
						  </div>
						  


<form action="{{ route('user.deposit.manual.update') }}" method="POST" enctype="multipart/form-data">
@csrf

<p class="my-4 text-center">@php echo  $data->gateway->description @endphp</p>
<br/>
<x-viser-form identifier="id" identifierValue="{{ $gateway->form_id }}"></x-viser-form>
						  
<button type="submit" class="btn btn-primary">Complete Payment</button>
</form>
</center>

				</div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>

		<!-- /.content -->
	  </div>
  </div>


                
                </form>
                
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
				
				
				<!--- Code Ends --->
				</div>
			</div>
		</div>	 	


    <script src="/assets/global/js/jquery-3.6.0.min.js"></script>
    
  
  
@include('partials.notify')
@include($activeTemplate.'partials.footers')
  
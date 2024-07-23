@extends('layouts.app')

@section('content')
    <div class="container">
      <form id="payment-form" action="{{route('admin.payment.transition')}}" method="post">
        @csrf
        <!-- Putting the empty container you plan to pass to
          'braintree.dropin.create' inside a form will make layout and flow
          easier to manage -->
        <div id="dropin-container"></div>
        <input type="submit" />
        <input type="hidden" id="nonce" name="payment_method_nonce" />
        {{-- <input type="hidden" id="dataInput" name="device_data" > --}}
      </form>

      <script type="text/javascript">
      let clientToken = "{{$clientToken}}";
      let form = document.getElementById('payment-form');

        braintree.dropin.create({
          authorization: clientToken,
          container: '#dropin-container',
          // dataCollector: true
        }, (error, dropinInstance) => {
          if (error) console.error(error);
        
          form.addEventListener('submit', event => {
            event.preventDefault();
          
            dropinInstance.requestPaymentMethod((error, payload) => {
              if (error) console.error(error);
            
              // Step four: when the user is ready to complete their
              //   transaction, use the dropinInstance to get a payment
              //   method nonce for the user's selected payment method, then add
              //   it a the hidden field before submitting the complete form to
              //   a server-side integration
              document.getElementById('nonce').value = payload.nonce;
              // document.getElementById('dataInput').value = dataCollectorInstance.deviceData;
              form.submit();
            });
          });
        });
    </script>
    </div>
   
@endsection
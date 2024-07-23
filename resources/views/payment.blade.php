@extends('layouts.app')

@section('content')
  <script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.js"></script>

  <form id="payment-form" action="{{ route('send.payment') }}" method="post">

    @csrf
    <!-- @method('HEAD') -->

    <div id="dropin-container"></div>
    <button id="submit-button" class="button button--small button--green">Purchase</button>
    <input type="hidden" id="nonce" name="payment_method_nonce" />
    <input type="hidden" id="data" name="device_data" />
  </form>
  @dump($clientToken)
  
  <div class="token">{{$clientToken}}</div>

  <script>

    // let CLIENT_TOKEN_FROM_SERVER = $clientToken1
    // console.log(clientToken1)
    let button = document.querySelector('#submit-button');
    const CLIENT_TOKEN_FROM_SERVER = document.querySelector('.token').textContent
    const form = document.getElementById('payment-form');
    
    console.log(CLIENT_TOKEN_FROM_SERVER)

    braintree.dropin.create({
      // authorization: 'sandbox_7b3jrvq5_wvh37r4hkd8hjpgk',
      authorization: CLIENT_TOKEN_FROM_SERVER,
      selector: '#dropin-container'
    }, 
    function (err, instance, dataCollectorInstance) {
      form.addEventListener('submit', event => {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          // Submit payload.nonce to your server
          document.getElementById('nonce').value = payload.nonce;
          // console.log('nonce'+document.getElementById('nonce').value).
          console.log( payload.nonce)

          // document.getElementById('data').value = dataCollectorInstance.deviceData
          // if (err) {
          // Handle error in creation of data collector
          // return 'errore data';
          // }

          // deviceData.value = dataCollectorInstance.deviceData
          // console.log('device data  '+ dataCollectorInstance.deviceData)
          form.submit();
        });
      })
    },
    // function(err, dataCollectorInstance){
  
    //   if (err) {
    //   // Handle error in creation of data collector
    //   return 'errore data';
    //   }

    //   deviceData.value = dataCollectorInstance.deviceData
    // }
    );

    // braintree.dropin.create({
    //   // authorization: 'sandbox_7b3jrvq5_wvh37r4hkd8hjpgk',
    //   authorization: CLIENT_TOKEN_FROM_SERVER,
    //   selector: '#dropin-container'
    // }, 
    // function (createErr, instance) {
    //       button.addEventListener('click', function () {
    //         instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
    //           document.getElementById('data').value = payload.deviceData;
    //           document.getElementById('nonce').value = payload.nonce;
    //     });
    //   });
    // });


  </script>

<style lang="scss">
  .button {
    cursor: pointer;
    font-weight: 500;
    left: 3px;
    line-height: inherit;
    position: relative;
    text-decoration: none;
    text-align: center;
    border-style: solid;
    border-width: 1px;
    border-radius: 3px;
    -webkit-appearance: none;
    -moz-appearance: none;
    display: inline-block;
  }
  
  .button--small {
    padding: 10px 20px;
    font-size: 0.875rem;
  }
  
  .button--green {
    outline: none;
    background-color: #64d18a;
    border-color: #64d18a;
    color: white;
    transition: all 200ms ease;
  }
  
  .button--green:hover {
    background-color: #8bdda8;
    color: white;
  }
</style>
@endsection



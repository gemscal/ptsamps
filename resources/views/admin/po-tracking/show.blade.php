
@include('templates.header')

  <title>Po Request View Details | Asset Management and Procurement System</title>
</head>

<body>
  <div class="flex-container" style="width: 80%; margin: auto;">
      <div class="columns m-t-10">
          <div class="column">
            <h1 class="title">View PO Request</h1>
          </div>
      </div>
      <hr class="m-t-0">

    

       <div class="columns">
          <div class="column">

          <!-- ALERT SUCCESS -->
            @if(Session::has('success'))
              <div class="comment-success" id ="comment-success" style="margin-top: 25px">
                  <strong> {{ Session::get('success') }}</strong> 
              </div>
            @endif

          <!-- ALERT ERROR -->
            @if(Session::has('error'))
              <div class="comment-error" id ="comment-error" style="margin-top: 25px">
                  <strong> {{ Session::get('success') }}</strong> 
              </div>
            @endif

          <!-- DISPLAY ERRORS -->
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <br><strong>{{ $error }}</strong>
                  @endforeach
              </ul>
          </div>
          @endif



      <form method="POST" action="{{ route('po-tracking.update', $ids->group_id)}}">{{method_field('PUT')}} 
         {{csrf_field()}}

              
              <div class="manage-content">
                <table style="width: 100%; text-align: center;" >
                  <thead>
                    <tr>
                        <th style="display:none;">ID</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Description</th>
                        <th>Unit Price (₱)</th>
                        <th>Total Price (₱)</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  @foreach ($procures as $procure)
                    <tr>
                      <td style="display:none;">
                        <input type="text" name="idlists[]" value="{{$procure->id}}"></td>
                      <td>
                        <div class="input_fields_wrap">
                          @if($procure->status == 'Approved')
                            <input type="text" name="item[]" size="45" id="item-0" value="{{$procure->item}}" readonly>
                          @else
                            <input type="text" name="item[]" size="45" id="item-0" value="{{$procure->item}}" required>
                          @endif  
                        </div>
                      </td>
                      <td>
                        <div class="input_fields_wrap">
                          @if($procure->status == 'Approved')
                            <input type="text" class="quantity" class="quantity" name="quantity[]" size="5" id="quantity-0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$procure->quantity}}" readonly>
                          @else
                            <input type="text" class="quantity" class="quantity" name="quantity[]" size="5" id="quantity-0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$procure->quantity}}" required>
                          @endif  
                        </div>
                      </td>
                      <td>
                        <div class="input_fields_wrap">
                          @if($procure->status == 'Approved')
                            <input type="text" name="uom[]" id="uom-0" value="{{$procure->uom}}" readonly>
                          @else
                            <input type="text" name="uom[]" id="uom-0" value="{{$procure->uom}}" required>
                          @endif
                        </div>
                      </td>
                      <td>
                        <div class="input_fields_wrap">
                          @if($procure->status == 'Approved')
                            <input type="text" name="description[]" size="40" id="description-0" value="{{$procure->description}}" readonly>
                          @else
                            <input type="text" name="description[]" size="40" id="description-0" value="{{$procure->description}}" required>
                          @endif
                        </div>
                      </td>
                      <td>
                        <div class="input_fields_wrap">
                          @if($procure->status == 'Approved')
                            <input type="text" class="unitprice" name="unitprice[]" id="unitprice-0"  onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" value="{{$procure->unit_price}}" readonly>
                          @else
                            <input type="text" class="unitprice" name="unitprice[]" id="unitprice-0"  onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" value="{{$procure->unit_price}}" required>
                          @endif
                        </div>
                      </td>
                      <td>
                        <div class="input_fields_wrap">
                          @if($procure->status == 'Approved')
                            <input type="text" class="totalprice" name="totalprice[]" id="totalprice-0" placeholder="total" value="{{$procure->total_price}}" readonly>
                          @else
                            <input type="text" class="totalprice" name="totalprice[]" id="totalprice-0" placeholder="total" value="{{$procure->total_price}}" readonly>
                          @endif
                        </div>
                      </td>
                        <td>
                          @if($procure->status == 'Approved')
                            <input type="checkbox" name="itemid[]" value="{{$procure->id}}" disabled>
                          @else
                            <input type="checkbox" name="itemid[]" value="{{$procure->id}}">
                          @endif
                        </td>
                    </tr> 
                  @endforeach
                </table>
              </div>
  
              <div class="dboard-content-menu">
        
                <p><strong>PAYMENTS</strong></p><br>
                  <div class="fl">
                      <label for="remarks" class="label">Notes/Remarks/Comment:</label>
                      @if($procure->status == 'Approved')
                        <textarea name="remarks" id="remarks" rows="4" cols="30" readonly>{{$payments->remarks}}</textarea>
                      @else
                        <textarea name="remarks" id="remarks" rows="4" cols="30" >{{$payments->remarks}}</textarea>
                      @endif
                    <br>
                    <div class="field">
                      <label for="paymentterms" class="label">Payment Terms:</label>
                      @if($procure->status == 'Approved')
                        <input type="text" name="paymentterms" id="paymentterms" value="{{$payments->payment_terms}}" readonly>
                      @else
                        <input type="text" name="paymentterms" id="paymentterms" value="{{$payments->payment_terms}}">
                      @endif
                    </div>
                      <input type="hidden" name="poid" id="poid" value="{{$payments->group_id}}">
                      <br><br><br>
                      @if($procure->status == 'Approved')
                      <button class="submit-approver-acc" style="margin-top: 40px;" value="update" name="submit" disabled>Update</button>
                      <button class="submit-approver-acc" style="margin-top: 40px;" value="delete" name="submit" disabled>Delete</button>
                      @else
                      <button class="submit-approver-acc" style="margin-top: 40px;" value="update" name="submit">Update</button>
                      <button class="submit-approver-acc" style="margin-top: 40px;" value="delete" name="submit">Delete</button>
                      @endif
                      <br><br>
                  </div>
                  <div class="fr">
                      <div class="field">
                        <label class="label">VAT Inclusive:</label>
                        <input type="text" class="vatinclusive" name="vatinclusive" id="vatinclusive" value="{{$payments->vat_inc}}" readonly>
                    </div>
                    <div class="field">
                      <label class="label">VAT Exclusive:</label>
                      <input type="text" class="vatexclusive" name="vatexclusive" id="vatexclusive" value="{{$payments->vat_ex}}" readonly>
                    </div>
                    <div class="field">
                      <label class="label">Less Discount:</label>
                      @if($procure->status == 'Approved')
                        <input type="text" onkeypress="return event.charCode == 46 ||event.charCode == 37|| (event.charCode >= 48 && event.charCode <= 57)" class="lessdiscount" name="lessdiscount" id="lessdiscount" value="{{$payments->less_discount}}" readonly>
                      @else
                        <input type="text" onkeypress="return event.charCode == 46 ||event.charCode == 37|| (event.charCode >= 48 && event.charCode <= 57)" class="lessdiscount" name="lessdiscount" id="lessdiscount" value="{{$payments->less_discount}}">
                      @endif
                    </div>
                    <div class="field">
                      <label class="label">12% VAT:</label>
                      <input type="text" class="vat" name="vat" id="vat" value="{{$payments->vat}}" readonly>
                    </div>
                    <div class="field">
                      <label class="label">Total Price:</label>
                      <input type="text" class="total" name="total" id="total" value="{{$payments->total_price}}" readonly>
                    </div>
                    <a href="{{ route('po-tracking.index') }}">Back To Previous Page</a>
                </div>
              </div>
              
            </form>
          </div> <!-- end of .column -->

          <div class="columns">
            <div class="column">
                <hr/>
            </div>
          </div>
      </div>

@include('templates.footer')

<script type="text/javascript">

/*** CALCULATION ***/
function ComputePayments() {
  
  // CALCULATE VAT INC
  var sum = 0;
    $(".totalprice").each(function(){
        sum += parseFloat(+$(this).val());
    });
    $("#vatinclusive").val(parseFloat(sum).toFixed(2));

    // CALCULATE 12% VAT
    var inclusive = parseFloat($("#vatinclusive").val());
  $("#vat").val(parseFloat(inclusive*0.12).toFixed(2));

  // CALCULATE VAT EXC
  var vat = parseFloat($("#vat").val());
  $("#vatexclusive").val(parseFloat(inclusive - vat).toFixed(2));

  // CALCULATE TOTAL PRICE
  $("#total").val(parseFloat(inclusive).toFixed(2));

  if($('#lessdiscount').val() !== ''){
    /*** WITH LESS DISCOUNT ***/

    if ($('#lessdiscount').val().indexOf('%') >= 0) {
    /*** DISCOUNT IS PERCENTAGE***/
      var input = $('#lessdiscount').val();
      var percent = parseFloat(input) / 100.0;
          
          // CALCULATE TOTAL PRICE
        var inclusive = parseFloat($("#vatinclusive").val());
      var amountLess = parseFloat(inclusive * percent).toFixed(2);
      var deducted = parseFloat(inclusive - amountLess).toFixed(2)
      $("#total").val(parseFloat(deducted).toFixed(2));

      // CALCULATE 12% VAT
        var total = parseFloat($("#total").val());
      $("#vat").val(parseFloat(total*0.12).toFixed(2));

      // CALCULATE VAT EXC
      var vat = parseFloat($("#vat").val());
      $("#vatexclusive").val(parseFloat(total - vat).toFixed(2));

    } else {
    /*** DISCOUNT IS AMOUNT***/

        // CALCULATE TOTAL PRICE
        var inclusive = parseFloat($("#vatinclusive").val());
      var lessdiscount = parseFloat($("#lessdiscount").val());
      $("#total").val(parseFloat(inclusive - lessdiscount).toFixed(2));

      // CALCULATE 12% VAT
        var total = parseFloat($("#total").val());
      $("#vat").val(parseFloat(total*0.12).toFixed(2));

      // CALCULATE VAT EXC
      var vat = parseFloat($("#vat").val());
      $("#vatexclusive").val(parseFloat(total - vat).toFixed(2));
      }
  }
}


$(document).on("change", ".unitprice", function() {
  var $row = $(this).closest("tr");  
    var qty = parseFloat($row.find('.quantity').val());  
    var price = parseFloat($row.find(".unitprice").val());
    var total = (qty * price);
    var value = total.toFixed(2);
    if (isNaN(value)) {
        $row.find('.totalprice').val("");  
    }else {
        $row.find('.totalprice').val(value);  
    }

  ComputePayments();
});

$(document).on("change", ".quantity", function() {
  var $row = $(this).closest("tr");  
    var qty = parseFloat($row.find('.quantity').val());  
    var price = parseFloat($row.find(".unitprice").val());
    var total = (qty * price);
    var value = total.toFixed(2);
    if (isNaN(value)) {
        $row.find('.totalprice').val("");  
    }else {
        $row.find('.totalprice').val(value);  
    }
  ComputePayments();
});


$('#lessdiscount').on('change blur',function(){
/*  if($(this).val().trim().length === 0){
  $(this).val(0.00);
  }*/
  ComputePayments();
});

$(window).on('load', function() {
ComputePayments();
});


  /*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>

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



      <form method="POST" action="{{ route('pending-po.update', $ids->group_id)}}">{{method_field('PUT')}} 
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
                    </tr>
                  </thead>
                  @foreach ($procures as $procure)
                    <tr>
                      <td style="display:none;">
                      <input type="text" name="idlists[]" value="{{$procure->id}}"></td>
                      <td>{{$procure->item}}</td>
                      <td>{{$procure->quantity}}</td>
                      <td>{{$procure->uom}}</td>
                      <td>{{$procure->description}}</td>
                      <td>{{$procure->unit_price}}</td>
                      <td>{{$procure->total_price}}</td>
                    </tr> 
                  @endforeach
                </table>
              </div>
  
              <div class="dboard-content-menu">
        
                <p><strong>PAYMENTS</strong></p><br>
                  <div class="fl">
                      <br><strong><span>Notes/Remarks/Comment:</span></strong><br>
                      <label for="remarks" class="label">{{$payments->remarks}}</label>
                    <br>
                    <div class="field">
                      <br><strong><span>Payment Terms:</span></strong><br>
                      <label for="remarks" class="label">{{$payments->payment_terms}}</label>
                    </div>
                      <input type="hidden" name="poid" id="poid" value="{{$payments->group_id}}">
                      <br><br><br>
                      <br><strong><span>Comment:</span></strong><br>
                      <textarea name="comments" id="comments" rows="4" cols="30"></textarea><br>
                      <button class="submit-approver-acc" style="margin-top: 40px;" value="approved" name="submit">Approve</button>
                      <button class="submit-approver-acc" style="margin-top: 40px;" value="rejected" name="submit">Reject</button>
                      <br><br>
                  </div>
                  <div class="fr">
                    <input type="hidden" name="paymentid" value="{{$payments->id}}">
                      <div class="field">
                      <br><strong><span>VAT Inclusive:</span></strong><br>
                      <label for="remarks" class="label">{{$payments->vat_inc}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>VAT Exclusive:</span></strong><br>
                      <label for="remarks" class="label">{{$payments->vat_ex}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Less Discount:</span></strong><br>
                      <label for="remarks" class="label">{{$payments->less_discount}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>12% VAT</span></strong><br>
                      <label for="remarks" class="label">{{$payments->vat}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Total Price:</span></strong><br>
                      <label for="remarks" class="label">{{$payments->total_price}}</label>
                    </div><br><br>
                    <a href="{{ route('pending-po.index') }}">Back To Previous Page</a>
                    <br>
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


  /*** TIME-OUT SESSION ALERT ***/
setTimeout(function() {
    $('#comment-success').fadeOut('fast');
}, 5000);

</script>
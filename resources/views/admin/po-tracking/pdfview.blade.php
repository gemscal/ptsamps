
<style type="text/css">

* {
    padding: 0px;
    margin: 0px;
}

.pdf-cont-outer {
    width: 730px;
    margin: 0 auto;
    color: #000;
    font-family: Helvetica;
}

.header-top-content {
    text-align: center;
}

.comp-name {
    color: #23A9E1;
    margin-top: 50px;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: .5px;
}

.comp-addr, .comp-info {
    font-size: 11px;
    margin-top: 5px;
}

.po-rqt-date {
    margin-top: 40px;
    font-size: 12px;
}

.po-number {
    font-size: 12px;
    margin-top: 5px;
}

.po-number span {
    font-weight: bold;
    letter-spacing: 1px;
}

.po-from-info {
    margin-top: 20px;
    font-size: 13px; 
    margin-bottom: 5px;
    font-weight: bold;
    color: #23A9E1;
}

.fl {
    float: left;
}

.clr {
    clear: both;
}

.po-info-holder {
    line-height: 18px;
    font-size: 12px;
    letter-spacing: 1px;
}

.divider-po {
    margin-top: 20px;
    height: 1px;
    background-color: #e9f4ff;
}

.po-table {
    margin-top: 40px;
}

.po-table th {
    font-size: 12px;
    font-weight: bold;
    text-transform: uppercase;
    /*border: 1px solid #bfdfff;*/
    background-color: #bfdfff;
    padding: 5px;
}

.po-table td {
    font-size: 12px;
    text-transform: capitalize;
    border: 1px solid #bfdfff;
    padding: 5px;
}

.po-total-price {
    margin-top: 20px;
    font-size: 14px;
    text-transform: uppercase;
    font-weight: bold;
    color: #47525d;
}

</style>



<div class="pdf-cont-outer" {{-- style="border: 1px solid blue" --}}>
    <div class="header-top-content">
        <p class="comp-name">Project T International IT and Business Solutions</p>
        <p class="comp-addr">23rd flr. Bonifacio Stopover Corporate Center, 31st Street Corner 2nd Avenue Bonifacio Global City, Taguig City 1634</p>
        <p class="comp-info">Phone: (02)236-5999 | Fax: (02)236-5999 | Company TIN: 009-198-700-000 | www.projecttsolutions.com | billing@projecttsolutions.com</p>
    </div>

    <p class="po-rqt-date">Request Date: </p>
    <p class="po-number">PO Number: <span>{{$payments->pos->po_number}}</span></p>

    <p class="po-from-info">VENDOR</p>
    <div class="po-info-holder" {{-- style="border:  1px solid red" --}}>
        <div class="fl" style="width: 55%;">
            <p>Company name: {{$vendor->company_name}}</p>
            <p>Company Address: {{$vendor->company_address}}</p>
            <p>Contact Person: {{$vendor->contact_person}}</p>
            <p>Designation: {{$vendor->designation}}</p>
            <p>Email: {{$vendor->email_address}}</p>
        </div>
        <div class="fl" style="width: 45%;">
            <p>Contact Number: {{$vendor->contact_number}}</p>
            <p>Phone: {{$vendor->phone}}</p>
            <p>Fax: {{$vendor->fax}}</p>
            <p>VAT Reg. TIN: {{$vendor->vat_number}}</p>
        </div>
        <div class="clr"></div>
    </div>

    <div class="divider-po"></div>

    <p class="po-from-info">SHIP TO</p>
    <div class="po-info-holder" {{-- style="border:  1px solid red" --}}>
        <div class="fl" style="width: 55%;">
            <p>Company name: {{$requestor->company_name}}</p>
            <p>Company Address: {{$requestor->company_address}}</p>
            <p>Contact Person: {{$requestor->requestor_name}}</p>
            <p>Designation: {{$requestor->designation}}</p>
        </div>
        <div class="fl" style="width: 45%;">
            <p>Contact Number: {{$requestor->contact_number}}</p>
            <p>Phone: {{$requestor->phone}}</p>
            <p>Email: {{$requestor->email_address}}</p>
        </div>
        <div class="clr"></div>
    </div>

    <div class="po-table">
        <table style="width: 100%; text-align: center;">
            <thead>
                <tr>
                    <th style="display:none;">ID</th>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>UOM</th>
                    <th>Description</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            @foreach ($procures as $key => $procure)
                <tr>
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

    <p class="po-from-info" style="margin-top: 70px">PAYMENTS</p>
    <div class="po-info-holder" {{-- style="border:  1px solid red" --}}>
        <div class="fl" style="width: 55%;">
            <p>Notes/Remarks/Comment: {{$payments->remarks}}</p>
            <br>
            <p>Payment Terms: {{$payments->payment_terms}}</p>
        </div>
        <div class="fl" style="width: 45%;">
            <p>VAT Inclusive: {{$payments->vat_inc}}</p>
            <p>VAT Exclusive: {{$payments->vat_ex}}</p>
            <p>Less Discount: {{$payments->less_discount}}</p>
            <p>12% VAT: {{$payments->vat}}</p>
            <p class="po-total-price">Total Price: {{$payments->total_price}}</p>
        </div>
        <div class="clr"></div>
    </div>

    <div class="po-table" style="margin-top: 100px;">
        <table style="width: 100%; text-align: center;" >
            <thead>
                <tr>
                    <th>Requested by</th>
                    <th>Prepared by</th>
                    <th>Approved by</th>
                </tr>
            </thead>
            <tr style="line-height: 20px;">
                <td>
                    {{$requestor->requestor_name}}
                    <br>
                    <strong>{{$requestor->designation}}</strong>
                </td>
                <td>
                    Anne Sharmain Lacap
                    <br>
                    <strong>Procurement and Marketing Officer</strong
                </td>
                <td>
                    Alvin Terrence Hong
                    <br>
                    <strong>CEO</strong>
                </td>
            </tr> 
        </table>
    </div>
        
</div>
























{{-- 
<div class="container" style="width: 730px; margin:0 auto; color: red;">
		  <p></p>
      <p><strong>PO NUMBER: </strong><p><strong>{{$payments->pos->po_number}}</strong>

			<div class="dboard-content-menu">
                <p><strong>VENDOR</strong></p>
                  <div class="fl">
                      <br><strong><span>Company Name: </span></strong>
                      <label for="remarks" class="label">{{$vendor->company_name}}</label>
                    <br>
                    <div class="field">
                      <br><strong><span>Contact Person:</span></strong>
                      <label for="remarks" class="label">{{$vendor->contact_person}}</label>
                    </div>
                  </div>
                  <div class="fr">
                      <div class="field">
                      <br><strong><span>Designation: </span></strong>
                      <label for="remarks" class="label">{{$vendor->designation}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Email Address: </span></strong>
                      <label for="remarks" class="label">{{$vendor->email_address}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Contact Number: </span></strong>
                      <label for="remarks" class="label">{{$vendor->contact_number}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Company Address: </span></strong>
                      <label for="remarks" class="label">{{$vendor->company_address}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Phone: </span></strong>
                      <label for="remarks" class="label">{{$vendor->phone}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Fax: </span></strong>
                      <label for="remarks" class="label">{{$vendor->fax}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>VAT Reg. TIN: </span></strong>
                      <label for="remarks" class="label">{{$vendor->vat_number}}</label>
                    </div><br>
                </div>
              </div>

              <div class="dboard-content-menu">
                <p><strong>SHIP TO</strong></p>
                  <div class="fl">
                      <br><strong><span>Company Name: </span></strong>
                      <label for="remarks" class="label">{{$requestor->company_name}}</label>
                    <br>
                    <div class="field">
                      <br><strong><span>Contact Person: </span></strong>
                      <label for="remarks" class="label">{{$requestor->contact_person}}</label>
                    </div>
                  </div>
                  <div class="fr">
                      <div class="field">
                      <br><strong><span>Designation: </span></strong>
                      <label for="remarks" class="label">{{$requestor->designation}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Email Address: </span></strong>
                      <label for="remarks" class="label">{{$requestor->email_address}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Contact Number: </span></strong>
                      <label for="remarks" class="label">{{$requestor->contact_number}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Company Address: </span></strong>
                      <label for="remarks" class="label">{{$requestor->company_address}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Phone: </span></strong>
                      <label for="remarks" class="label">{{$requestor->phone}}</label>
                    </div><br>
                </div>
              </div>

		    
			<div class="manage-content">
                <table style="width: 100%; text-align: center;" >
                  <thead>
                    <tr>
                        <th style="display:none;">ID</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>UOM</th>
                        <th>Description</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                    </tr>
                  </thead>
                  @foreach ($procures as $key => $procure)
                    <tr>
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
                      <br><strong><span>Notes/Remarks/Comment: </span></strong>
                      <label for="remarks" class="label">{{$payments->remarks}}</label>
                    <br>
                    <div class="field">
                      <br><strong><span>Payment Terms: </span></strong>
                      <label for="remarks" class="label">{{$payments->payment_terms}}</label>
                    </div>
                  </div>
                  <div class="fr">
                      <div class="field">
                      <br><strong><span>VAT Inclusive: </span></strong>
                      <label for="remarks" class="label">{{$payments->vat_inc}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>VAT Exclusive: </span></strong>
                      <label for="remarks" class="label">{{$payments->vat_ex}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Less Discount: </span></strong>
                      <label for="remarks" class="label">{{$payments->less_discount}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>12% VAT: </span></strong>
                      <label for="remarks" class="label">{{$payments->vat}}</label>
                    </div>
                    <div class="field">
                      <br><strong><span>Total Price: </span></strong>
                      <label for="remarks" class="label">{{$payments->total_price}}</label>
                    </div>
                </div>
              </div>

				<br><br>
               <table style="width: 100%; text-align: center;" >
                  <thead>
                    <tr>
                        <th>Requested by</th>
                        <th>Prepared by</th>
                        <th>Approved by</th>
                    </tr>
                  </thead>
                    <tr>
                      <td><strong>{{$requestor->requestor_name}}</strong>
                      	<br>{{$requestor->designation}}
                      </td>
                      <td><strong>Ann</strong>
                      	<br>IT Procurement and Asset Officer
                      </td>
                      <td><strong>Alvin Terrence Hong </strong>
                      	<br>CEO
                      </td>
                    </tr> 
                </table>

</div> --}}
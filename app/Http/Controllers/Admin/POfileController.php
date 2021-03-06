<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Payment;
use App\Model\Procure;
use App\Model\Vendor;
use App\Model\Requestor;
use DB;
use PDF;

class POfileController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
	public function pdfview(Request $request, $id)
    {

		$payments = Payment::where('po_id', $id)->first();
        $procures = Procure::where('po_id', $payments->po_id)->get();
        $vendorid = Procure::select('vendor_id')->where('po_id', $id)->groupBy('vendor_id')->first();
        $requestorid = Procure::select('requestor_id')->where('po_id', $id)->groupBy('requestor_id')->first();
        $requestDate = Procure::select('request_date')->where('po_id', $id)->groupBy('request_date')->first();
        $vendor = Vendor::where('id', $vendorid->vendor_id)->first();
        $requestor = Requestor::where('id', $requestorid->requestor_id)->first();
        $officers =  Procure::select('prepared_by', 'approver_id')->where('po_id', $id)->groupBy('prepared_by', 'approver_id')->first();
        

        view()->share('procures', $procures);
        view()->share('payments', $payments);
        view()->share('vendor', $vendor);
        view()->share('requestor', $requestor);
        view()->share('requestDate', $requestDate);
        view()->share('officers', $officers);
        
 		// $pdf = PDF::loadView('admin.po-tracking.pdfview');
        //return $pdf->download('admin.po-tracking.pdfview.pdf');
        
        return view('admin.po-tracking.pdfview');
    }

    public function pdfdownload(Request $request, $id)
    {

        $payments = Payment::where('po_id', $id)->first();
        $procures = Procure::where('po_id', $payments->po_id)->get();
        $vendorid = Procure::select('vendor_id')->where('po_id', $id)->groupBy('vendor_id')->first();
        $requestorid = Procure::select('requestor_id')->where('po_id', $id)->groupBy('requestor_id')->first();
        $requestDate = Procure::select('request_date')->where('po_id', $id)->groupBy('request_date')->first();
        $vendor = Vendor::where('id', $vendorid->vendor_id)->first();
        $requestor = Requestor::where('id', $requestorid->requestor_id)->first();
        

        view()->share('procures', $procures);
        view()->share('payments', $payments);
        view()->share('vendor', $vendor);
        view()->share('requestor', $requestor);
        view()->share('requestDate', $requestDate);
        
        $pdf = PDF::loadView('admin.po-tracking.pdfview');
        return $pdf->download('admin.po-tracking.pdfview.pdf');
        
    }

}
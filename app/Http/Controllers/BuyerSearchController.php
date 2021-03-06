<?php

/* * **********************************
 * Purpose : Member , Individual , MarketPlace Registrations
 * Author : Nikhil Kishore
 * Company : Logistiks
 * Description : In the controller we are implementing Buyer Search Functionality
 * Created At : 06th Aug 2016
 * 
 *
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
//use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Console\IlluminateCaster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BuyerSearch;
use App\Components\BuyerSearchComponent;
use App\Components\SellerPostComponent;
use App\Components\EmailHelper;
use App\Components\EmailSender;
use App\Components\Helper;
use Validator;


class BuyerSearchController extends BaseController {
   
    /*
     * Method Name :Construct
     * Purpose : Configuring Model 
     * 
     */
    
    public function __construct(BuyerSearch $BuyerSearch){
        
        $this->buyer = $BuyerSearch;
    }
    /*
     * Method Name :Index
     * Purpose : Redirection to Buyer Search View
     * 
     */
    public function index() {
        
        $data = SellerPostComponent::GetData();
        $message ="";
		$inputData=array();
        return view('buyers.search', ['data' => $data,'message'=>$message,'inputData'=>$inputData]);
       
    }
    
    /*
     * Method Name :SearchBuyer
     * Purpose : Buyer Search results with required elements
     * 
     */

    public function buyerSearch() {
        try {           
            $inputData = Input::all();
			$data = SellerPostComponent::GetData();
			$validator = Validator::make($inputData,[
						'from_loc' => 'required',
						'to_loc' => 'required',
						'dispatch_dt' => 'required',
						'delivery_dt' => 'required',
						'load_type' => 'required',
						'veh_type' => 'required'
					
			]);
			if ($validator->fails ()) {
				//echo "ur in validator page";
				
				   	 return Redirect::to('buyer/search' )->withErrors($validator)->withInput();
					
            } else {
                    $data['searchType'] = "noramlSearch";
                    $BuyerSearchResult = BuyerSearchComponent::SellerPosts($inputData);
                    if(is_array(BuyerSearchResult))	{			
                    return view('buyers.ftlSearchList',['searchResults'=>$BuyerSearchResult,'data'=>$inputData]);
					} else{
					return view('buyers.ftlSearchList',['searchResults'=>$BuyerSearchResult,'data'=>$inputData]);	
					}
            }
		
        } catch (Exception $ex) {
             echo "in the exception";
			 die();
            return Redirect::to ( 'buyer/search' )->withInput(['data',$data])->withErrors(array('message' => 'Some thing went wrong. Please try again!!'));
        }
    }
    

     public function buyerFtlFilter() {

        $filterInputs = Input::all();
        
        $filterInputs['searchType'] = "advancedFilter";
        
        $buyerSearchResult = BuyerSearchComponent::SellerPosts($filterInputs);
        
        return $buyerSearchResult;
    }
 
    /*
     * Method Name :BookNow
     * Purpose : Redirect to BuyerBookNow View page
     * 
     */
    
    public function bookNow($seller_user_id,$post_id){
        try{
            
            $buyer_id = '1' ;
            
            $seller_post_details   = $this->buyer->getPostdata($post_id);
            
            $buyer_booknow_details = $this->buyer->buyerBooknow($seller_user_id);
            
            return view('Buyers.booknow',['data'=>$seller_post_details,'buyer_booknow_details'=>$buyer_booknow_details,'buyer_user_id'=>$buyer_id,'seller_user_id'=>$seller_user_id,'post_id'=>$post_id]);
            
        
        } catch (Exception $ex) {
            
           return $ex->getMessage();
        }
    }
    
    public function Cart($buyer_user_id,$seller_id,$post_id){
        try{
            
            $buyerCartDetails = Input::all();
            
            $getCart = $this->buyer->getcartDetails($buyer_user_id,$buyerCartDetails,$seller_id,$post_id);
            
            $total_sum = 0;
                            
            foreach($getCart as $value){
                
                $total_sum = $total_sum + $value->price;
                                            
            }       
            
            return view('Buyers.cart',['cart_data'=>$getCart,'total_sum'=>$total_sum,'seller_id'=>$seller_id,'buyer_id'=>$buyer_user_id]);
        
        }
        catch(Exception $ex){
            
            return $ex->getMessage();
        
        }
    }
    
    public function buyerGsa($buyer_id,$seller_id){
        try{
            
            $getGsadetails = $this->buyer->getGsadetails($buyer_id,$seller_id);

            return view('Buyers.buyergsa',['buyer_gsa'=>$getGsadetails]);
            
        }
        catch(Exception $ex){
            
            return $ex->getMessage();
        }
    }

    public function buyerConfirmation($buyer_id){
        try{

            $buyerconfirmorders = $this->buyer->getOrders($buyer_id);

            $total_sum = 0;
            
            foreach($buyerconfirmorders as $value){
                
                $total_sum = $total_sum + $value->price;
                                            
            }      

            return view('Buyers.buyerconfirm',['orderConfirmation'=>$buyerconfirmorders,'total_sum'=>$total_sum]);

        }
        catch(Exception $ex){

            return $ex->getMessage();
        }
    }

    public function buyerBilling(){
        try{

            $billing_data = ['seller_name'   =>'nikhil kishore',
                              'from_loc'     =>'hyderabad',
                              'to_loc'       =>'bangalore',
                              'dispatch_dt'  =>'01/06/2016',
                              'delivery_dt'  =>'21/06/2016',
                              'load_type'    =>'Fertiliser',
                              'veh_type'     =>'LPT 9 MT',
                              'qty'          =>'1',
                              'no_of_loads'  =>'1',
                              'transit_days' =>'1',
                              'price'        =>'1000',
                              'tracking_type' =>'Real Time',
                              'payment_term'  =>'Advance',
                              'buyer_name'    =>'suresh',
                              'order_status'  =>'billing completed' 
                            ];
                         
            return view('Buyers.buyerbilling',['data'=>$billing_data]);
        }
        catch(Exception $ex){

            return $ex->getMessage();
        
        }
    }
	
	   public function getUserDeatils(Request $request) {
        $inputs = $request->all();
        
        return $this->user->getUserDetails($inputs);
    }
    
    public function newMail() {
        $inputs = Input::all();
        $inputs['datetime'] = date("Y-m-d h:i:sa");
        $inputs['buyer_seller_flag'] = 1;
        
        //$inputs['message_from'] = Auth::user()->id;
        $inputs['message_from'] = 2;
        if(count($inputs)>0) {
            $this->postIntraction->savePostIntractions($inputs);
            try{
                $this->emailsender->sendMailToSeller($inputs);
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }
    
}

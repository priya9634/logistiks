@extends('layouts.default')
@section('content')
<div class="menu">
  <div class="wrapper-1">
    <div class="tbl-1">
      <div class="row-1">
        <div class="cell-1">
          <div class="menu-nav-1">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Products</a></li>
            </ul>
          </div>
        </div>
        <div class="cell-1">
          <div class="menu-nav-2">
            <ul>
              <li><a href="#" class="select-1">Buyer</a></li>
              <li><a href="#">Help</a></li>
            <li><a href="#"><img src="/images/shoping-cart-1.png" alt="Shoping-cart"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-1">
<div class="tbl-1">
    <div class="row-1">
      
      <div class="cell-1">
        <div class="content-area-1">
          <div class="bread-crumb-1">
            <div class="tbl-1">
              <div class="row-1">
                <div class="cell-1"> Seller &gt; Services &gt;  Book Now </div>
                <div class="cell-1"> </div>
              </div>
            </div>
          </div>
          <!--Content Start-->
          <div class="bg-sec1">
            <div class="column-1">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="post-table-4">
                <tbody><tr>
                  <td width="12%">VENDOR</td>
                  <td width="12%">ROUTES</td>
                  <td width="12%">DESPATCH DATE</td>
                  <td width="12%">DELIVERY DATE</td>
                  <td width="12%">LOAD TYPE</td>
                  <td width="12%">VEHICLE TYPE</td>
                  <td width="12%">QUANTITY</td>
                  <td align="right">Views 7</td>
                </tr>
                @foreach($data as $value)  
                <tr>
                  <td height="30" valign="middle"><span>{{$value->user_name}}</span></td>
                  <td valign="middle"><span>{{$value->from_loc.'--'.$value->to_loc}}</span></td>
                  <td valign="middle"><span>{{$value->dispatch_dt}}</span></td>
                  <td valign="middle"><span>{{$value->delivery_dt}}</span></td>
                  <td valign="middle"><span>{{$value->load_type}}</span></td>
                  <td valign="middle"><span>{{$value->veh_type}}</span></td>
                  <td valign="middle"><span>{{$value->qty}}</span></td>
                  <td align="right" valign="middle">&nbsp;</td>
                </tr>
                
              </tbody></table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0" class="post-table-4">
                  <tbody><tr>
                    <td width="12%">No. of LOADS</td>
                    <td width="12%">TRANSIT DAYS</td>
                    <td width="12%">PRICING</td>
                    <td width="12%">TRACKING</td>
                    <td width="12%">PAYMENT TERM</td>
                    <td width="12%">T&amp;C</td>
                    <td style="width:5%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="30" valign="middle"><span>{{$value->load_commitment_per_day}}</span></td>
                    <td height="30" valign="middle"><span>{{$value->transit_days}}</span></td>
                    <td height="30" valign="middle"><span>{{$value->price}}</span></td>
                    <td height="30" valign="middle"><span>{{$value->tracking_type}}</span></td>
                    <td height="30" valign="middle"><span>{{$value->payment_term}}</span></td>
                    <td height="30" valign="middle">&nbsp;</td>
                    <td align="right" valign="top">&nbsp;</td>
                  </tr>
                  @endforeach
                </tbody></table>
            </div>

  {!! Form::open(array('url' => 'buyer/Cart'.'/'.$buyer_user_id.'/'.$seller_user_id.'/'.$post_id)) !!}  
    
    <div class="column-1 field-main">
              <div class="grid-3">
                <ul>
                  <li>
                  <div class="select-box1">
                      <select name="source_location_type" required="required">
                          <option value="">Source - Location Type *</option>
                          @foreach($buyer_booknow_details['location_types'] as $location_values)
                         <option value="{{$location_values->id}}">{{$location_values->pickup_location}}</option>
                        @endforeach
                      </select>
                    </div>
                  </li>
                  <li>
                  <div class="select-box1">
                     <select name="dest_location_type" required="required">
                          <option value="">Destination - Location Type *</option>
                          @foreach($buyer_booknow_details['location_types'] as $location_values)
                         <option value="{{$location_values->id}}">{{$location_values->pickup_location}}</option>
                        @endforeach
                      </select>
                    </div>
                  </li>
                  <li>
                  <div class="select-box1">
                   <select name="packaging_type" required="required">
                       <option value="">Packaging - Type *</option>
                          @foreach($buyer_booknow_details['packing_types'] as $pack_values)
                         <option value="{{$pack_values->id}}">{{$pack_values->packaging_type}}</option>
                        @endforeach
                      </select>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="grid-3">
                <ul>
                  <li>
                  <input type="text" class="datepicker" placeholder="Dispatch Date* (Flex dates option)"  id="dispatch_dt" name="dispatch_dt">
                  </li>
                  <li>
                  <div class="select-box1">
                      <select name="consignment_type" required="required">
                         <option value="">Consignment - Type *</option>
                         @foreach($buyer_booknow_details['consignment_types'] as $consignment_values)
                         <option value="{{$consignment_values->id}}">{{$consignment_values->type}}</option>
                        @endforeach
                      </select>
                    </div>
                 </li>
                  <li>
                  <div class="select-box1">
                      <select name="">
                        <option value="one">Consignment Value*</option>
                        <option value="two">two</option>
                        <option value="three">three</option>
                      </select>
                    </div>
                 </li>
                </ul>
              </div>
              
              <div class="grid-3 margin-top-1">
                <ul>
                  <li>
                 
                  </li>
                  <li>
                    
                  </li>
                  <li>
                    <input type="checkbox" name="checkbox_1" id="checkbox_1" class="css-checkbox">
                    <label for="checkbox_1" class="checkbox_label">Need Insurance</label>
                  </li>
                </ul>
              </div>
            </div>
      
            <div class="column-2">
      <h4>Consignor Details</h4>
                
                @foreach($buyer_booknow_details['user_details'] as $user_details)
                <div class="grid-3">
                <ul>
                  <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="seller_name" name="seller_name" value="{{$user_details->name}}" readonly>
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Name*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                            <input class="animated-field animated-field-logistiks" type="text" id="seller_mobile_number" name="seller_mobile_number" value="{{$user_details->mobile_number}}" readonly>
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Mobile Number*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="seller_email_id" name="seller_email_id" value="{{$user_details->email_id}}" readonly>
                    
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks"></span>EmailId* </label>
                    </span></li>
                </ul>
              </div>
              
              <div class="grid-3">
                <ul>
                  <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="seller_address1" name="seller_address1"  value="{{$user_details->address_line1}}" readonly>
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Address1*</span> </label>
                    </span></li>
                    
          <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="seller_address2" name="seller_address2" value="{{$user_details->address_line2}}" readonly>
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Address2*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="seller_address3" name="seller_address3" readonly>
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Address 3</span> </label>
                    </span></li>
                </ul>
              </div>
              
              <div class="grid-3">
                <ul>
                  <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="seller_pincode" name="seller_pincode" value="{{$user_details->pincode}}" readonly>
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Pincode*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="seller_city" name="seller_city" value="{{$user_details->city}}" readonly>
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">City*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="seller_state" name="seller_state" value="{{$user_details->state}}" readonly>
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">State*</span> </label>
                    </span></li>
                </ul>
              </div>
              
            </div>
            
           @endforeach 
            
           <br><div class="column-2">
              <h4>Consignee Details</h4>
                
                
                
                <div class="grid-3">
                <ul>
                  <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_name" name="buyer_name" required="required">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Name*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_mobile_number" name="buyer_mobile_number" required="required">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Mobile Number*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_email_id" name="buyer_email_id" required="required">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">E Mail*</span> </label>
                    </span></li>
                </ul>
              </div>
              
              <div class="grid-3">
                <ul>
                  <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_address1" name="buyer_address1" required="required">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Address 1*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_address2" name="buyer_address2">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Address 2</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_address3" name="buyer_address3">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Address 3</span> </label>
                    </span></li>
                </ul>
              </div>
              
              <div class="grid-3">
                <ul>
                  <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_pincode" name="buyer_pincode" required="required">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Pincode*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_city"  name="buyer_city" required="required">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">City*</span> </label>
                    </span></li>
                    
                    <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_state" name="buyer_state" required="required">
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">State*</span> </label>
                    </span></li>
                </ul>
              </div>
              
              <div class="grid-3">
                <ul>
                  <li><span class="input input-logistiks">
                    <input class="animated-field animated-field-logistiks" type="text" id="buyer_add_details" name="buyer_add_details" >
                    <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Additional Details</span> </label>
                    </span></li>
                    
                   
                </ul>
              </div>
              
            </div>
            
            
            <div class="column-2">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>
                  <td align="right" valign="middle"></td>
                  <td width="250" align="right" valign="middle">
                  <?php echo Form::submit('ADD TO CART',array('class' => 'button-red-1')); ?>
                  <a href="/buyer/buyerGsa/1/1" class="button-red-1">CHECK OUT</a>
                  </td>
                </tr>
              </tbody></table>
            </div>
      
      {!! Form::close() !!}
            <div class="display-none" id="showhide-content-2">
              <div class="column-1">
                <div class="grid-5">
                  <ul>
                    <li><span class="input input-logistiks">
                      <input class="animated-field animated-field-logistiks" type="text" id="input-4">
                      <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Name (Auto Fill)</span> </label>
                      </span></li>
                    <li><span class="input input-logistiks">
                      <input class="animated-field animated-field-logistiks" type="text" id="input-4">
                      <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Discount Type</span> </label>
                      </span></li>
                    <li><span class="input input-logistiks">
                      <input class="animated-field animated-field-logistiks" type="text" id="input-4">
                      <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Discount</span> </label>
                      </span></li>
                    <li><span class="input input-logistiks">
                      <input class="animated-field animated-field-logistiks" type="text" id="input-4">
                      <label class="animated-label animated-label-logistiks animated-label-logistiks-color-1" for="input-4"> <span class="animated-label-content animated-label-content-logistiks">Credit Days</span> </label>
                      </span></li>
                    <li></li>
                    <li>
                      <input type="button" value="ADD" class="button-gray-1 margin-top-1">
                    </li>
                  </ul>
                </div>
              </div>
              <div class="column-2" style="margin-top:20px;">
                <div class="table-1">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                      <th width="18%" align="left" valign="top">Name</th>
                      <th width="18%" align="left" valign="top">Discount Type</th>
                      <th width="185" align="left" valign="top">Discount</th>
                      <th width="18%" align="left" valign="top">Credit Days</th>
                      <th width="18%" align="left" valign="top">Net Price</th>
                      <th align="left" valign="top">&nbsp;</th>
                    </tr>
                    <tr>
                      <td align="left" valign="top">NFCL</td>
                      <td align="left" valign="top">Flat</td>
                      <td align="left" valign="top">500.00</td>
                      <td align="left" valign="top"></td>
                      <td align="left" valign="top">4500.00</td>
                      <td align="left" valign="top"><table border="0" align="left" cellpadding="0" cellspacing="0">
                          <tbody><tr>
                            <td align="left" valign="top"><a href="#" class="link-1">Edit</a></td>
                            <td width="10" align="left" valign="top"></td>
                            <td align="left" valign="top"><a href="#"><img src="/images/delete-1.png" alt="Delete"></a></td>
                          </tr>
                        </tbody></table></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">FERTIS</td>
                      <td align="left" valign="top">Percentage</td>
                      <td align="left" valign="top">1.5%</td>
                      <td align="left" valign="top">&nbsp;</td>
                      <td align="left" valign="top">4925.00</td>
                      <td align="left" valign="top"><table border="0" align="left" cellpadding="0" cellspacing="0">
                          <tbody><tr>
                            <td align="left" valign="top"><a href="#" class="link-1">Edit</a></td>
                            <td width="10" align="left" valign="top"></td>
                            <td align="left" valign="top"><a href=""><img src="/images/delete-1.png" alt="Delete"></a></td>
                          </tr>
                        </tbody></table></td>
                    </tr>
                    <tr>
                      <td align="left" valign="top">NFCL</td>
                      <td align="left" valign="top">Flat</td>
                      <td align="left" valign="top">500.00</td>
                      <td align="left" valign="top">&nbsp;</td>
                      <td align="left" valign="top">4500.00</td>
                      <td align="left" valign="top"><table border="0" align="left" cellpadding="0" cellspacing="0">
                          <tbody><tr>
                            <td align="left" valign="top"><a href="#" class="link-1">Edit</a></td>
                            <td width="10" align="left" valign="top"></td>
                            <td align="left" valign="top"><a href="#"><img src="/images/delete-1.png" alt="Delete"></a></td>
                          </tr>
                        </tbody></table></td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
            </div>
            
            
            
            
            
            
            
          </div>
        </div>
        <br>
      </div>
    </div>
  </div>
  
</div>
<script src="/js/text-filed-1-shartcode.js"></script> 
<script src="/js/main.js"></script>
@stop
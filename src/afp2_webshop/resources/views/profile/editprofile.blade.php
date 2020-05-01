@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
             <div class="col-sm-6 col-md-8">
                        <h2> Your Profile   
                        </h2>
                    <div class="table responsive">
                       <table> 
                       
                       <t>
                       <tr>Name: <input id="name" type="text" name="name"></tr>
                       </br>
                       <tr>Email: <input id="email" type="email" email="email"></tr>
                       </br>
                            <tr>Gender: <select id="genders">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                                </select>
                            </tr>
                       </br>
                       <tr>Date of birth: <input id="dateofbirth" type="date" date="dateofbirth"></tr>
                       </br>
                       <div id=billingaddress><tr>Billing address: <input id="billing" type="text" billing="billing"></tr></div><!--FOR TIBI-->
                       </br>
                        <div id=shippingaddress><tr>Shipping address: <input id="shipping" type="text" shipping="shipping"></tr></div><!--FOR TIBI-->
                       </t>
                       <?php
                        // WHY THE FUCK IS THIS SHIT NOT WORKING!?
                         function index(){ 
                            $affected = DB::update('update users  where name = ?', ['name']);
                         //$users = DB::select('select * from users where id = :id', ['id' => 1]);
                       //$results = DB::select('select * from users where id = :id', ['id' => 1]);
                       return view('user.index', ['users' => $users]);
                            }

                    ?>
                       </table>
                    </div>

                        </br>
                        <div class="btn-group">
                        <button type="button" class="btn-warning">
                      Save Profile Changes</button> <!--This button should save the data and redirect the user to it's profile-->
                </div>
            </div>
                
            
        </div>
    </div>
</div>
@endsection
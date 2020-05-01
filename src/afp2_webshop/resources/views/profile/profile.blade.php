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
                       <tr>Name: </tr>
                       </br>
                       <tr>Email: </tr>
                       </br>
                       <tr>Gender: </tr>
                       </br>
                       <tr>Date of birth: </tr>
                       </br>
                       <div id=billingaddress><tr>Billing address: </tr></div><!--FOR TIBI-->
                       </br>
                        <div id=shippingaddress><tr>Shipping address: </tr></div><!--FOR TIBI-->
                       </t>
                       <?php
                        // WHY THE FUCK IS THIS SHIT NOT WORKING!?
                         function index(){ 
                         $users = DB::select('select * from users where id = :id', ['id' => 1]);
                       //$results = DB::select('select * from users where id = :id', ['id' => 1]);
                       return view('user.index', ['users' => $users]);
                            }

                    ?>
                       </table>
                    </div>
                        <p>

                        <div class="btn">
                            <button type="button" class="btn btn-warning">Orders
                            </button><!--This should redirect the user to his/her orders and show said orders status and list the orders-->
                        </div>
                        </br>
                        <div class="btn-group">
                        <button type="button" class="btn-warning"> <!--This button looks different from the others for the purpose of the users not mixing them up-->
                        Edit Profile</button> <!--This button should enable the logged in user to edit his/her profile-->
                </div>
            </div>
                
            
        </div>
    </div>
</div>
@endsection
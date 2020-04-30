@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          
               
                   
                    <div class="col-sm-6 col-md-8">
                        <h4> Username
                            <!--USERNAME COMES HERE-->
                        </h4>
                        <p>
                        Actual name of the person
                        </p>

                        <small><cite title="address">Eger, HUN 
                        <!--ADDRESS COME HERE IF THE USER HAS GIVEN US AT ALL-->
                        </cite></small>
                        
                        <p>
                            <i class="email"></i> <!--EMAIL COMES HERE-->email@example.com
                            <br/>
                            
                        </p>
                       
                        <div class="">
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
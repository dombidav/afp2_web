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
                           <thead>
                           <tr>
                               <th>
                                   Name:
                               </th>
                               <th>
                               Email:
                               </th>
                               <th>
                               Gender:
                               </th>
                               <th>
                               Date Of Birth:
                               </th>
                               <th>
                               Billing:
                               </th>
                               <th>
                               Shipping:
                               </th>
                           </tr>
                           </thead>
                           <tbody>
                           <tr>
                               <td>
                                   {{ $user->name }}
                               </td>
                               <td>
                                   {{ $user->email }}
                               </td>
                               <td>
                                   {{ $user->gender }}
                               </td>
                               <td>
                                   {{ $user->date_of_birth }}
                               </td>
                               <td>
                                   {{ $user->billing }}
                               </td>
                               <td>
                                   {{ $user->shipping }}
                               </td>
                               
                           </tr>
                           </tbody>
                       </table>
                    </div>
                        <p>

                        <div class="btn">
                            <a href="{{ route('orders') }}" class="btn btn-warning">Orders
                            </a><!--This should redirect the user to his/her orders and show said orders status and list the orders-->
                        </div>
                        <br />
                        <div class="btn-group">
                        <a href="{{ route('profile.edit') }}" class="btn-warning"> <!--This button looks different from the others for the purpose of the users not mixing them up-->
                        Edit Profile</a> <!--This button should enable the logged in user to edit his/her profile-->
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

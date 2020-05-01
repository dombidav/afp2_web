@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
             <div class="col-sm-6 col-md-8">
                        <h2> Your Profile
                        </h2>
                  <form id="edit_form" method="post" action="{{ route("profile.update") }}">
                      @csrf
                          <table class="table responsive">

                              <thead>
                              <tr>
                              <th>Name: <input id="name" type="text" name="name"></th>
                              <th>Email: <input id="email" type="email" name="email"></th>
                              <th>Gender: <select id="genders">
                                      <option value="male">Male</option>
                                      <option value="female">Female</option>
                                      <option value="other">Other</option>
                                  </select>
                              </th>
                              <th>Date of birth: <input id="dateofbirth" type="date" name="dateofbirth"></th>
                              </tr>
                              </thead>
                              <tbody>
                              </tbody>
                          </table>

                      <div id=billingaddress>
                          <table>
                              <thead>
                              <tr><th>Billing address:</th></tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>
                                      City:
                                  </td>
                                  <td>
                                      <input type="text" name="billing_city" value="{{ $user->billing()->city }}">
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </div>

                      <div id=shippingaddress>
                          <table>
                              <thead>
                              <tr><th>Shipping address:</th></tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>
                                      City:
                                  </td>
                                  <td>
                                      <input type="text" name="shipping_city" value="{{ $user->shipping()->city }}">
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="btn-group">
                          <button type="submit" form="edit_form" class="btn-warning">Save Profile Changes</button> <!--This button should save the data and redirect the user to it's profile-->
                      </div>
                  </form>
            </div>


        </div>
    </div>
</div>
@endsection

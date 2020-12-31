@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

@extends('admin.nav')


     <!-- Navigation -->

     <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Profile</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
          <fieldset>
            <div class="form-group">
              <label class="control-label">Email</label>
              <input type="email" value="{{$user->email}}" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.email" readonly>
            </div>
            <div class="form-group">
              <label class="control-label">New Password</label>
              <input type="password" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.password" required="">
            </div>
            <div class="form-group">
                <label class="control-label">Number</label>
                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-valid-pattern ng-touched" ng-model="model.number" ng-pattern="/[0-9]/" required="">
                <p class="help-block hint-block">Numeric values from 0-***</p>
            </div>
            <div class="form-group">
                <label class="control-label">Terms & Conditions</label>
                <textarea type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" maxlength="2000" rows="10" cols="50" ></textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Privacy Policy</label>
                <textarea type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" required="" maxlength="2000" rows="10" cols="50" ></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="copy_layout">
      <p>Copyright © 2021 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">{{ env('APP_NAME') }}</a> </p>
   </div>


@endsection

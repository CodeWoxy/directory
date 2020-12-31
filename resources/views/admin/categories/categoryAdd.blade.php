@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

@extends('admin.nav')


     <!-- Navigation -->

     <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Add Category</h3>
  	    <div class="well1 white">
        <form method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
          <fieldset>
            <div class="form-group">
                @CSRF
              <label class="control-label">Name</label>
              <input  name="name"  class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.name" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="copy_layout">
      <p>Copyright © 2021 Modern. All Rights Reserved | Design by <a href="#" target="_blank">{{ env('APP_NAME') }}</a> </p>
   </div>

@endsection

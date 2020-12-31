@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

@extends('admin.nav')


     <!-- Navigation -->

     <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Add Company</h3>
  	    <div class="well1 white">
        <form method="POST" class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" novalidate="novalidate" ng-submit="submit()">
          <fieldset>
            @CSRF
            <div class="form-group">
                <label for="selector1" class="control-label">Select Category</label>
                <div style="padding-right: 0px; padding-left: 0px;" class="col-sm-12">
                    <select name="category" class="form-control1">
                        @foreach ($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="selector1" class="control-label">Select Category</label>
                <div style="padding-right: 0px; padding-left: 0px;" class="col-sm-12">
                    <select name="subcategory" class="form-control1">
                        <option value="">Select Sub Category</option>
                        <script>
                            $(document).ready(function(){
                                $('[name=category]').on('change', function(){
                                    console.log('change')
                                    let a = $('[name=category').val();
                                    $.ajax({
                                        url: '{{ url("api/getSubCategorybyCategory") }}/'+a,
                                        success: function(d){
                                            console.log(d)
                                            let html = '';
                                            for(let i=0; i<d.length; i++){
                                                html += '<option value="'+d[i]['id']+'">'+d[i]['name']+'</option>';
                                            }
                                            $('[name=subcategory]').html(html)
                                        }
                                    })
                                })
                            })
                        </script>
                    </select>
                </div>
            </div>
            <div class="form-group">
              <label class="control-label">Name</label>
              <input  name="name"  class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.name" required>
            </div>
            <div class="form-group">
                <label class="control-label">Address</label>
                <input  name="address"   class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.address" required>
              </div>
              <div class="form-group">
                <label class="control-label">Email</label>
                <input  name="email" type="email"  class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.email" required>
              </div>
              <div class="form-group">
                <label class="control-label">Phone</label>
                <input  name="name"  class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.name" required>
              </div>
              <div class="form-group">
                <label class="control-label">Website</label>
                <input  name="name"  class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.name" required>
              </div>
              <div class="form-group">
                <label class="control-label">Detail</label>
                <input  name="name"  class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" ng-model="model.name" required>
              </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="copy_layout" style="text-align: center">
      <p>Copyright © 2021 Modern. All Rights Reserved | Design by <a href="#" target="_blank">{{ env('APP_NAME') }}</a> </p>
    </div>

@endsection

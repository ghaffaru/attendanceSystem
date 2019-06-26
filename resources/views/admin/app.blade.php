<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

@include('admin.header')

      	  <div class="col-md-3 left_col">
    	   @include('admin.sidebarMenu')
    	  </div>
		    <!-- top navigation -->
	        <div class="top_nav">
	          <div class="nav_menu">
	                 @include('admin.topMenu')
	          </div>
	        </div>
	        <!-- /top navigation -->
	        <!-- page content -->
	        <div class="right_col" role="main">
	          
	          		 	@yield('content')
	        </div>
	        <!-- /page content -->
 @include('admin.footer')
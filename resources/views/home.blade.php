@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Selamat Datang, </h1>
       <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="row">
    
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">IP Address
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                  @if ($currentUserInfo)
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{ $currentUserInfo->ip }} </div>
                                </div>
                                <div class="col-auto">
                                  <i class="fa fa-address-card-o  fa-2x text-black-300" aria-hidden="true"></i>
                                </div>
                               @endif
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Location Now
                                </div>
                                 @if($currentUserInfo)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $currentUserInfo->countryName }}, {{ $currentUserInfo->regionName }}</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $currentUserInfo->cityName }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-map-marker  fa-2x text-black-300" aria-hidden="true"></i>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Content Row -->

    <div class="row">

       

       

       
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
    <div class="col-lg-6 mb-4">
            
        <table class=" table table-striped">
             <thead> 
               <tr>
                    <th> Username </th>
                    <th> Password </th>
                    <th> Status </th>
               </tr>
             </thead>
               <tbody>
                    @if ($currentUserInfo)
                    <tr>
                        <td> IP: {{ $currentUserInfo->ip }} </td>
                        <td> Name: {{ $currentUserInfo->countryName }}</td>                    
                            <td><a href="#" class=" btn btn-sm btn-success">Sedang Aktif</a></td>                  
                            <td><a href="#" class=" btn btn-sm btn-warning">Kadaluarsa</a></td>
                       @endif
                    </tr>                 
               </tbody>
         </table> 
        </div>


        <div class="container">
           <a href="http://123.net/" class="btn btn-sm bt-success">Login to The Hotspot</a>
    </div>

</div>
@endsection

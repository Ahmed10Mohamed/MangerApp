@extends('admin.layout.main')

@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__body">

        <hr>
        <div id="home_reports" >
            <div class="row">


                <div class="col-md-3">
                    <div class="report_box">
                        <p class="report_title">المستخدمين</p>
                        <p class="report_number">{{$users}}</p>
                        <i class="fas fa-users"></i>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="report_box">
                        <p class="report_title">المجموعات</p>
                        <p class="report_number">{{ $groups }}</p>
                        <i class="fas fa-layer-group"></i>

                    </div>
                </div>




                <div class="col-md-3">
                    <div class="report_box">
                        <p class="report_title"> التاسكات</p>
                        <p class="report_number">{{ $tasks }}</p>
                        <i class="fas fa-tasks"></i>
                    </div>
                </div>




            </div>
        </div>
        <hr>


            
    </div>
</div>
@endsection

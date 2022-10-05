@extends('admin.layout.main')

@section('content')
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!--begin::Portlet-->
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon"><i class="kt-font-brand fa fa-user"></i></span>
                    <h3 class="kt-portlet__head-title">تفاصيل التاسك</h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="my-3 text-center col-md-12">
                    <img src="{{ asset($task->image) }}" class="user-avatar" />
                </div>
            </div>
            <!--begin::Form-->
            <div class="kt-form kt-form--label-left" id="kt_form_1">
                <div class="kt-portlet__body">
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">الاسم بالكامل</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control m-input" value="{{optional($task->user_info)->full_name ?? 'غير معروف'}}" disabled />
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label">رقم التليفون</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control m-input" value="{{optional($task->user_info)->phone ?? 'غير معروف'}}" disabled />
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label"> المجموعة</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control m-input" value="{{optional($task->group_info)->name ?? 'غير معروف'}}" disabled />
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <label class="col-lg-2 col-form-label"> تفاصيل التاسك</label>
                        <div class="col-lg-10">
                            <textarea class="form-control m-input" id="" cols="30" rows="10" disabled>{{ $task->details }}</textarea>
                        </div>
                    </div>






                </div>
            </div>
            <!--end::Form-->





        </div>

    @endsection

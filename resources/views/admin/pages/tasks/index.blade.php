@extends('admin.layout.main')

@section('content')
<!--begin::Portlet-->
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">التاسكات</h3>
		</div>
	</div>
	<div class="kt-portlet__body">


		<!--begin::Section-->
		<div class="kt-section">
            {{--  start  --}}
            <hr />
            <form class="kt-form" method="get" action="#">
                <div class="from-group">
                    <div class="row">

                        <div class="col-md-4">
                            <label>المجموعات</label>
                                <select name="group" class="form-control" id="">
                                    <option value="0">اختار المجموعة </option>

                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}"@if(request()->group == $group->id) selected @endif> {{ $group->name }} </option>

                                    @endforeach
                                </select>
                        </div>
                        <div class="col-md-4">
                            <label>المستخدمين</label>
                                <select name="user" class="form-control" id="">
                                    <option value="0">اختار المستخدم </option>

                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"@if(request()->user == $user->id) selected @endif> {{ $user->full_name }} </option>

                                    @endforeach
                                </select>
                        </div>

                        <div class="col-md-1"><label><br /></label></div>
                        <div class="col-md-3">
                            <label><br /></label>
                            <button type="submit" class="btn btn-success btn-block">بحث</button>
                        </div>
                    </div>
                </div>
            </form>
            <hr />

            {{--  end  --}}

			<div class="kt-section__content">
				<div class="table-responsive">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
						<thead>
							<tr>
								<th>#</th>
								<th>اسم المستخدم</th>
                                <th>المجموعة</th>
                                <th> التاسك</th>
                                <th>تاريخ الاضافة</th>
                                <th> اكشن</th>

							</tr>
						</thead>
						<tbody>
							@foreach ($tasks as $task)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{optional($task->user_info)->full_name ?? 'غير معروف'}}</td>
                                    <td>{{optional($task->group_info)->name ?? 'غير معروف'}}</td>

                                    <td>{{$task->title}}</td>
                                    <td>{{date('d/m/Y', strtotime($task->created_at))}}</td>

									<td>

									<button class="btn btn-brand dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
									aria-haspopup="true" aria-expanded="true">الاعدادات</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"  href="{{url('admin/Task/'.$task->id)}}"><i class="fa fa-list"></i> التفاصيل</a>


                                        <a class="dropdown-item" data-toggle="modal" href="#myModal-{{ $task->id }}"><i class="fa fa-trash"></i> مسح</a>
                                    </div>
									<div class="modal fade" id="myModal-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
										<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">مسح التاسك</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											</button>
										</div>
										<div class="modal-body">
										<form role="form" action="{{ url('/admin/delete_task/'.$task->id) }}" class="" method="POST">
										<input name="_method" type="hidden" value="DELETE">
										{{ csrf_field() }}
										<p>هل انت متأكد ؟</p>
										<button type="submit" class="btn btn-danger" name='delete_modal'><i class="fa fa-trash" aria-hidden="true"></i> مسح</button>
										</form>
										</div>
										</div>
										</div>
									</div>
									</td>
								</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!--end::Section-->
	</div>

	<!--end::Form-->
</div>
<!--end::Portlet-->

@endsection

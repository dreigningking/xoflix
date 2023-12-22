@extends('layouts.app')
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        <div class="d-flex flex-column flex-xl-row">
            <!--begin::Sidebar-->
            <div class="d-none d-md-flex flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
                <!--begin::Card-->
                @include('layouts.menu.admin_desktop')
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-10">

                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header  p-5">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3 class="m-0 text-gray-800">PLANS</h3>
                            
                        </div>
                        <div><a href="{{route('admin.plans.create')}}" class="btn btn-primary">NEW PLAN</a></div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body py-4">

                        <!--begin::Table-->
                        <div id="" class="">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Title</th>
                                            <th class="min-w-125px">Price</th>
                                            <th class="min-w-125px">Status</th>
                                            <th class="min-w-125px">Subscriptions</th>
                                            <th class="text-end min-w-100px">Actions </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @forelse ($plans as $plan)
                                        <tr class="odd">

                                            <td class="">
                                                {{$plan->name}}
                                            </td>
                                            <td>
                                                {{$plan->price}}
                                            </td>
                                            <td>
                                                @if($plan->status) <button class="badge border-success badge-success">Active</button> @else <button class="badge border-secondary badge-secondary">Inactive</button> @endif
                                            </td>
                                            <td data-order="2023-08-25T12:49:21+01:00">
                                                {{$plan->subscriptions->where('end_at','>',now())->count()}}
                                            </td>


                                            <td class="text-end">
                                                <a href="{{route('admin.plans.edit',$plan)}}" class="btn btn-primary btn-sm" > Edit </a>
                                                <form action="{{route('admin.plans.delete')}}" method="post" class="d-inline" onclick="return confirm('Are you sure you want to delete Plan?')">@csrf
                                                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                                    <button type="submit" class="btn btn-danger btn-sm"> Delete </button>
                                                </form>

                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    No Plan
                                                </td>
                                            </tr>
                                        
                                        @endforelse
                                        
                                        

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout - Activity-->
    </div>
@endsection

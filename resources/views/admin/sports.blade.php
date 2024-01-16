@extends('layouts.app')
@push('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('main')
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Layout - Activity-->
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
                <!--begin::Timeline-->
                <div class="card">
                    
                        
                        <div class="card-body">
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab" role="tab" href="#categories">
                                        Categories
                                    </a>
                                </li>
                                <!--end::Nav item-->
                                            <!--begin::Nav item-->
                                
                                
                                <li class="nav-item mt-2">
                                    <a class="nav-link text-active-primary ms-0 me-10 py-5 " data-bs-toggle="tab" role="tab" href="#sports">
                                        Events                    
                                    </a>
                                </li>
                        
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="categories" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div class="card-title m-0">
                                                <h3 class="fw-bold m-0">Sports Categories</h3>
                                            </div>
                                        </div>
                                        <form class="form" action="{{route('admin.sports.categories')}}" method="POST" enctype="multipart/form-data">@csrf
                                            <div class="card-body py-0 px-9">    
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Name </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" value="" name="name" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="Enter Category name" >
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Category Image</label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="file" name="image" class="form-control form-control-lg  mb-3 mb-lg-0" required>
                                                        <div
                                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                        </div>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                
                                                <div class="d-flex justify-content-start py-6">
                                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                                    <button type="submit" class="btn btn-primary px-6" name="action" value="create">Save</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                        
                                        <!--begin::Card body-->
                                        <div class="card-body border-top px-9 mt-5 pb-4">
                                            <h2 class="mb-9 d-flex flex-column flex-md-row justify-content-between">
                                                <span>Categories</span>
                                               
                                            </h2>
                                            <div class="table-responsive">
                                                <table id="categoryTable" class="table table-row-dashed border-gray-300 align-middle gy-6">
                                                    <thead>
                                                        <th>#</th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Actions</th>
                                                    </thead>
                                                    <tbody class="fs-6 fw-semibold">
                                                        @forelse ($categories as $category)
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>
                                                                    <div class="symbol symbol-45px symbol-circle">
                                                                        <img alt="Pic" src="{{$category->avatar}}">  
                                                                    </div>
                                                                </td>
                                                                <td>{{$category->name}}</td>
                                                                <td>
                                                                    <span class="d-flex">
                                                                        <a href="#edit_category{{$category->id}}" data-bs-toggle="modal" class="btn btn-info btn-sm edit_category me-2">Edit</a> 
                                                                        @if($category->sports->isEmpty())
                                                                        <form action="{{route('admin.sports.categories')}}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">@csrf
                                                                            <input type="hidden" name="category_id" value="{{$category->id}}">
                                                                            <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm">
                                                                                Delete
                                                                            </button>
                                                                        </form>
                                                                        @endif
                                                                    </span>
                                                                    
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade custom-modal" id="edit_category{{$category->id}}">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Edit Category</h5>
                                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('admin.sports.categories')}}" method="post" enctype="multipart/form-data">@csrf
                                                                                <input type="hidden" name="category_id" value="{{$category->id}}">
                                                                                <div class="awards-info">
                                                                                    <div class="row form-row mb-3">
                                                                                        <div class="col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Category</label>
                                                                                                <input type="text" name="name" value="{{$category->name}}" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row form-row mb-3">
                                                                                        <div class="col-12">
                                                                                            <div class="form-group">
                                                                                                <label>Image</label>
                                                                                                <input type="file" name="image" class="form-control">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                    
                                                                                </div>
                                                                                
                                                                                <button type="submit" name="action" value="update" class="btn btn-info mt-4">
                                                                                    Update
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <tr><td colspan="4" class="text-center">No Category</td></tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                        </div>

                                    </div>
                                    
                                </div>
                                
                                <div class="tab-pane fade" id="sports" role="tabpanel">
                                    
                                        <div class="card">
                                            
                                            <div class="card-header border-0">
                                                <div class="card-title m-0">
                                                    <h3 class="fw-bold m-0">Add New Sport Event</h3>
                                                </div>
                                            </div>

                                            
                                            <form action="{{route('admin.sports.store')}}" method="post" enctype="multipart/form-data">@csrf
                                                <!--begin::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Player A</label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" required value="{{old('player_a')}}" name="player_a" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" >
                                                        @error('player_a')
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <!--begin::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Player A image</label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="file" required name="player_a_image" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" >
                                                            
                                                        @error('player_a_image')
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <!--begin::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Player B</label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text"  value="{{old('player_b')}}" name="player_b" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="" required>
                                                        @error('player_b')
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <!--begin::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Player B Image</label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="file" name="player_b_image" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                    placeholder="" required>
                                                        @error('player_b_image')
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                
                                                <!--end::Input group-->
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">League </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <input type="text" name="league" required class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" value="{{old('league')}}">
                                                        
                                                        @error('league')
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                
                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Select Category</label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <select name="category_id" id="category_id" class="form-control" data-control="select2" data-placeholder="Select Category" required>
                                                            <option value=""></option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                
                                                

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Channels </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <textarea name="channels" class="form-control form-control-lg  mb-3 mb-lg-0" data-kt-autosize="true" placeholder="" required></textarea>
                                                        @error('channels')
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>

                                                <div class="row mb-6">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-2 col-form-label required fw-semibold fs-6">Date/Time </label>
                                                    <!--end::Label-->
                
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                                        <div class="input-group" id="kt_td_picker_basic" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                                            <input id="kt_td_picker_basic_input" type="text" name="start_at" class="form-control" data-td-target="#kt_td_picker_basic" required/>
                                                            <span class="input-group-text" data-td-target="#kt_td_picker_basic" data-td-toggle="datetimepicker">
                                                                <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
                                                            </span>
                                                        </div>
                                                        @error('when')
                                                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <div class="d-flex justify-content-start py-6">
                                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                                    <button type="submit" class="btn btn-primary px-6" name="action" value="create">Save</button>
                                                </div>
                                            </form>

                                            <div class="card-body border-top px-0 mt-5 pb-4">
                                                <h2 class="mb-9 d-flex flex-column flex-md-row justify-content-between">
                                                    <span>Sport Events</span>
                                                    <div class="d-flex align-items-center position-relative my-1">
                                                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                            </svg>
                                                        </i>                
                                                        <input type="text" id="searchpanel" class="form-control form-control-solid w-250px ps-12" placeholder="Search">
                                                    </div>
                                                </h2>
                                                <div class="table-responsive">
                                                    <table id="panelTable" class="table table-row-dashed border-gray-300 align-middle gy-6">
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Category</th>
                                                            <th>Player A</th>
                                                            <th>Player B</th>
                                                            <th>League</th>
                                                            <th>DateTime</th>
                                                            <th>Actions</th>
                                                        </thead>
                                                        <tbody class="fs-6 fw-semibold">
                                                            @foreach ($sports as $sport)
                                                                <tr>
                                                                    <td>{{$loop->iteration}}</td>
                                                                    <td>{{$sport->category->name}}</td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="symbol symbol-45px symbol-circle">
                                                                                <img alt="Pic" src="{{$sport->first_avatar}}">
                                                                            </div>

                                                                            <div class="ms-5">
                                                                                <span class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$sport->player_a}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="symbol symbol-45px symbol-circle">
                                                                                <img alt="Pic" src="{{$sport->second_avatar}}">
                                                                            </div>

                                                                            <div class="ms-5">
                                                                                <span class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">{{$sport->player_b}}</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$sport->league}}</td>
                                                                    <td>{{$sport->start_at->format('d/m/Y h:i A')}}</td>
                                                                    <td>
                                                                        <span class="d-flex">
                                                                            <a href="#edit_sport{{$sport->id}}" data-bs-toggle="modal" class="btn btn-info btn-sm edit_category me-2">Edit</a> 
                                                                            <form action="{{route('admin.sports.delete')}}" method="post" onsubmit="return confirm('Are you sure you want to delete?')">@csrf
                                                                                <input type="hidden" name="sport_id" value="{{$sport->id}}">
                                                                                <button type="submit" name="action" value="delete" class="btn btn-danger btn-sm">
                                                                                    Delete
                                                                                </button>
                                                                            </form>
                                                                            
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <div class="modal fade custom-modal" id="edit_sport{{$sport->id}}">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Edit Sport</h5>
                                                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{route('admin.sports.update')}}" method="post" enctype="multipart/form-data">@csrf
                                                                                    <input type="hidden" name="sport_id" value="{{$sport->id}}">
                                                                                    <div class="row mb-6">
                                                                                        <!--begin::Label-->
                                                                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Player A</label>
                                                                                        <!--end::Label-->
                                                    
                                                                                        <!--begin::Col-->
                                                                                        <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                                                            <input type="text" value="{{$sport->player_a}}" name="player_a" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" required>
                                                                                            @error('player_a')
                                                                                            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                                                                {{$message}}
                                                                                            </div>
                                                                                            @enderror
                                                                                        </div>
                                                                                        <!--end::Col-->
                                                                                    </div>
                                    
                                                                                    <!--begin::Input group-->
                                                                                    <div class="row mb-6">
                                                                                        <!--begin::Label-->
                                                                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Player A image (optional)</label>
                                                                                        <!--end::Label-->
                                                    
                                                                                        <!--begin::Col-->
                                                                                        <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                                                            <input type="file" name="player_a_image" class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" >
                                                                                                
                                                                                            
                                                                                        </div>
                                                                                        <!--end::Col-->
                                                                                    </div>
                                    
                                                                                    <!--begin::Input group-->
                                                                                    <div class="row mb-6">
                                                                                        <!--begin::Label-->
                                                                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Player B</label>
                                                                                        <!--end::Label-->
                                                    
                                                                                        <!--begin::Col-->
                                                                                        <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                                                            <input type="text"  value="{{$sport->player_b}}" name="player_b" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                                                        placeholder="" required>
                                                                                            
                                                                                        </div>
                                                                                        <!--end::Col-->
                                                                                    </div>
                                    
                                                                                    <!--begin::Input group-->
                                                                                    <div class="row mb-6">
                                                                                        <!--begin::Label-->
                                                                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Player B Image (optional)</label>
                                                                                        <!--end::Label-->
                                                    
                                                                                        <!--begin::Col-->
                                                                                        <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                                                            <input type="file" name="player_b_image" class="form-control form-control-lg  mb-3 mb-lg-0"
                                                                                                        placeholder="" >
                                                                                            
                                                                                        </div>
                                                                                        <!--end::Col-->
                                                                                    </div>
                                                                                    
                                                                                    <!--end::Input group-->
                                                                                    <div class="row mb-6">
                                                                                        <!--begin::Label-->
                                                                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">League </label>
                                                                                        <!--end::Label-->
                                                    
                                                                                        <!--begin::Col-->
                                                                                        <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                                                            <input type="text" name="league" required class="form-control form-control-lg  mb-3 mb-lg-0" placeholder="" value="{{$sport->league}}">

                                                                                        </div>
                                                                                        <!--end::Col-->
                                                                                    </div>
                                                                                    
                                                                                    <div class="row mb-6">
                                                                                        <!--begin::Label-->
                                                                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Select Category</label>
                                                                                        <!--end::Label-->
                                                    
                                                                                        <!--begin::Col-->
                                                                                        <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                                                            <select name="category_id" id="cateory_id" required class="form-control form-control-solid" data-control="select2" data-placeholder="Select Category">
                                                                                                <option value=""></option>
                                                                                                @foreach ($categories as $category)
                                                                                                <option value="{{$category->id}}" @if($sport->category_id == $category->id) selected @endif>{{$category->name}} </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                            
                                                                                        </div>
                                                                                        <!--end::Col-->
                                                                                    </div>
                                                    
                                                                                    
                                                                                    <div class="row mb-6">
                                                                                        <!--begin::Label-->
                                                                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Channels </label>
                                                                                        <!--end::Label-->
                                                    
                                                                                        <!--begin::Col-->
                                                                                        <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                                                            <textarea name="channels" rows="4" class="form-control form-control-lg  mb-3 mb-lg-0" data-kt-autosize="true" placeholder="" required>{{implode(PHP_EOL,$sport->channels)}}</textarea>
                                                                                            
                                                                                        </div>
                                                                                        <!--end::Col-->
                                                                                    </div>
                                    
                                                                                    <div class="row mb-6">
                                                                                        <!--begin::Label-->
                                                                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Date/Time </label>
                                                                                        <!--end::Label-->
                                                    
                                                                                        <!--begin::Col-->
                                                                                        <div class="col-lg-9 fv-row fv-plugins-icon-container">
                                                                                            <div class="input-group" id="kt_td_picker_basic2" data-td-target-input="nearest" data-td-target-toggle="nearest">
                                                                                                <input id="kt_td_picker_basic2_input" type="text" name="start_at" value="{{$sport->start_at->format('m/d/Y h:i A')}}" class="form-control" data-td-target="#kt_td_picker_basic2" required/>
                                                                                                <span class="input-group-text" data-td-target="#kt_td_picker_basic2" data-td-toggle="datetimepicker">
                                                                                                    <i class="ki-duotone ki-calendar fs-2"><span class="path1"></span><span class="path2"></span></i>
                                                                                                </span>
                                                                                            </div>
                                                                                            
                                                                                        </div>
                                                                                        <!--end::Col-->
                                                                                    </div>
                                                                                    <div class="d-flex justify-content-start py-6">
                                                                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                                                                        <button type="submit" class="btn btn-primary px-6" name="action" value="create">Update</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--end::Table-->
                                            </div>

                                            
                                            
                                        </div>
                                    
                                </div>
                            </div>
                            
                                
                            
                        </div>
                        
                    
                </div>

                 
                

            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout - Activity-->
    </div>
@endsection
@section('modals')


@endsection
@push('scripts')
<script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script>
    new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic"), {
        //put your config here
    });
    new tempusDominus.TempusDominus(document.getElementById("kt_td_picker_basic2"), {
        //put your config here
    });
    
    var panelTable = $("#panelTable").DataTable({});
    $('#searchpanel').on('keyup',function(){
        panelTable.search($(this).val()).draw();
    });
    
</script>
@endpush

@extends('Backend_editor.Layout')
@section('title','Add blog')
@push('style')

@endpush
@section('content')
<div class="container-fluid mt--8">

<form action="{{ route('Bloges.store') }}" method="Post" enctype="multipart/form-data">

<div class="sticky-top bg-white border-bottom  px-4 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-xl font-bold text-gray-900">Add new blogs</h3>
                <div class="d-flex gap-3 align-items-center">
                    <a href="/Bloges" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                    <div class="position-relative">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </div>
            </div>

        </div><br>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="title"><strong>Title :</strong></label>
                                <input type="text" class="form-control" id="title" placeholder="Blog's Title (1st paragraph)" name="title"><br>
                                @error('title')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="subtitle"><strong>SubTitle:</strong></label>
                                <input type="text" class="form-control" id="subtitle" placeholder="Title of the 2end paragraph" name="subtitle"><br>
                                @error('subtitle')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="content"><strong>Content :</strong></label>
                                <textarea class="form-control" id="content" placeholder=" content of the blog belongs to the Title" name="content"></textarea><br>
                                @error('content')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="subcontent"><strong>SubContent :</strong></label>
                                <textarea class="form-control" id="subcontent" placeholder=" Content of the blog belongs to the SubTitle" name="subcontent"></textarea><br>
                                @error('subcontent')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label for="description"><strong>Description :</strong></label>
                                <textarea class="form-control" id="description" placeholder=" description of the blog" name="description"></textarea><br>
                                @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="form-row">
                            
                        </div>
                        <hr>
                        <div class="col-md-6">
                            <label for="tag"><strong>Tag :</strong></label>
                            <select class="form-control" id="tag_id" name="tag_id">
                                <option value="">Select Tag for blog</option>
                                    @foreach($tags as $tagId => $tagName)
                                        <option value="{{ $tagId }}">{{ $tagName }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <br/>
                        <div class="col-md-6">
                                <label for="img"><strong>Picture :</strong></label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                                    @error('img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br><br>
@endsection
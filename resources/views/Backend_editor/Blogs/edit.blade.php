@extends('Backend_editor.Layout')
@section('title','Edit blog')
@section('content')
<div class="container-fluid mt--8">

<form action="{{route('Bloges.update',$blog->id)}}" method="post" enctype="multipart/form-data">
<div class="sticky-top bg-white border-bottom  px-4 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="text-xl font-bold text-gray-900">Edit Blog</h3>
                <div class="d-flex gap-3 align-items-center">
                    <a href="/Bloges" class="nav-link btn btn-outline-secondary"><i class="fa-solid fa-angle-left"></i> Back</a>
                    <div class="position-relative">
                        <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                    </div>
                </div>
            </div>

        </div>
<br>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                        @csrf
                        @method('PUT')
                        <h3>Edit blog {{$blog->id}}</h3>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="title"><strong>Title :</strong></label>
                                <input type="text " value="{{$blog->title}}" class="form-control" id="title" placeholder="Blog's Title (1st paragraph)" name="title"><br>
                                @error('title')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="subtitle"><strong>Subtitle :</strong></label>
                                <input type="text " value="{{$blog->subtitle}}" class="form-control" id="subtitle" placeholder="Title of the 2end paragraph" name="subtitle"><br>
                                @error('subtitle')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="content"><strong>Content :</strong></label>
                                <textarea  class="form-control" id="content" placeholder="content" name="content">{{$blog->content}}</textarea><br>
                                @error('content')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="subcontent"><strong>SubContent :</strong></label>
                                <textarea  class="form-control" id="subcontent" placeholder="subcontent" name="subcontent">{{$blog->subcontent}}</textarea><br>
                                @error('subcontent')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="description"><strong>Description :</strong></label>
                                <textarea  class="form-control" id="description" placeholder="description" name="description">{{$blog->description}}</textarea><br>
                                @error('description')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="tag"><strong>Tag :</strong></label>
                                <select class="form-control" id="tag_id" name="tag_id">
                                    <option value="">Select Tag for blog</option>
                                        @foreach($tags as $tagId => $tagName)
                                            <option value="{{ $tagId }}">{{ $tagName }}</option>
                                        @endforeach
                                </select>
                            </div>
                           
                        </div>
                        <hr>
                            <div class="col-md-6">
                            <label for="img"><strong>Picture : </strong></label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="img" @error('img') is-invalid @enderror>
                            </div>
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
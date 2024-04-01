@extends('Backend_editor.Layout')
@section('title','Courses')
@section('button_add')
<a class="nav-link ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{route('Schools.create')}}">Add new</a>
@endsection
@section('search')
<a class="nav-link" data-widget="navbar-search" href="#" role="button">
    <i class="fas fa-search"></i>
</a>
<div class="navbar-search-block">
    <form class="form-inline" name="form1">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" onchange="fom1.submit()" placeholder="search" name="search1" id="search1" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="submit" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('content')

<br><br>

    <div class="container-fluid mt--8">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr style="background-color: #dedede;">
                                    <th>school logo</th>
                                    <th>school name</th>
                                    <th>type</th>
                                    <th>school city</th>
                                    <th>course </th>
                                    <th colspan="4"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                <tr>
                                @if(!empty($school->school_photo))
                                
                                <td><img src="{{ asset('storage/'. $school->school_photo)}}"  onerror="this.onerror=null;this.src='{{ $school->school_photo }}';" class="img-fluid"  alt="IMG" style="height: 50px;width:100px;"></td>

                                    @else
                                    <td><img src="{{ asset('build/assets/images/shop/school_thumb.png')}}" style="height:50px; width: auto;" class="img-fluid" alt=""></td>
                                    @endif
                                   
                                    <td>{{$school->school_name}}</td>
                                    <td>{{$school->type}}</td>
                                    <td>{{$school->school_city}}</td>
                                    <td>{{$school->id}}</td>
                                    <td>1</td>
                                    <td>
                                        <form id="delete-form-{{$school->id}}" action="{{route('Schools.destroy', $school->id)}}" method="POST">
                                            <a href="{{route('Schools.edit', $school->id)}}" class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-pen"></i> 
                                            </a>
                                            <a href="{{route('Schools.show', $school->id)}}" class="btn btn-info btn-sm">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick='confirmation(event,`{{ $school->id }}`)' data-toggle="modal">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>

            </div>

        </div>
    </div>
<br><br>

<center >{{ $schools->links() }}</center>

@endsection

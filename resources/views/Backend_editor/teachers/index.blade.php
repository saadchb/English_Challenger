@extends('Backend_editor.Layout')
@section('title','Teachers')
@section('button_add')
<a class="nav-link ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{route('Teachers.create')}}">Add new</a>
@endsection

@section('content')

<br><br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Teachers</h3>
        <div class="card-tools">
            <form class="form-inline" name="form1">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Search Mail" onchange="fom1.submit()" name="search1" id="search1" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                    <tr align="center">
                        <th>Teacher ID</th>
                        <th>Teacher</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teachers as $teacher)
                    <tr>
                        <td align="center"><a href="{{route('teacher.show',$teacher->id)}}">{{$teacher->id}}</a></td>
                        <td align="center"><a href="{{route('teacher.show',$teacher->id)}}">{{$teacher->first_name}} {{$teacher->last_name}}</a></td>
                        @if($teacher->isAdmin == 1)
                        <td align="center"><span class="badge badge-success">Admin</span></td>

                        @elseif($teacher->isAdmin == 0)
                        <td align="center"><span class="badge badge-warning">Pending</span></td>
                        <td align="center">
                            <div style="display: flex;align-items: center;">
                                <form action="{{ route('remove.teacher', $teacher->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="Submit" class="btn btn-danger  btn-sm ">
                                        <i class="fa-solid fa-user-slash mr-2"></i>Remove
                                    </button>
                                </form>

                                <form action="{{ route('update.teacher', $teacher->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="Submit" class="btn btn-success  btn-sm ml-4">
                                        <i class="fa-solid fa-user-check mr-2 "></i>Accept
                                    </button>
                                </form>
                            </div>
                        </td>
                        @elseif($teacher->isAdmin == 2)
                        <td align="center"><span class="badge badge-primary">teacher</span></td>
                        <td>
                            <form id="delete-form-{{$teacher->id}}" action="{{ route('refuse.teacher', $teacher->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="Submit" class="btn btn-danger  btn-sm">
                                    <i class="fa-solid fa-ban mr-2"></i>stop teacher
                                </button>
                            </form>
                        </td>
                        @elseif($teacher->isAdmin == -1)
                        <td align="center"><span class="badge badge-danger">teacher stoped</span></td>
                        <td>
                        <form action="{{ route('update.teacher', $teacher->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="Submit" class="btn bg-purple btn-sm">
                                    <i class="fa-solid fa-user-check mr-2"></i>make it admin
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer"><center >{{ $teachers->links() }}</center></div>

   
    <!-- /.card-footer -->
</div>


@endsection
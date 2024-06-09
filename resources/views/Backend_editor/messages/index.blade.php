@extends('Backend_editor.Layout')
@section('title', 'All Message')
@section('content')
<div class="container-fluid mt--8">
    <div class="row">
        <div class="col-md-12">
            <br><br>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Inbox</h3>
                    <div class="card-tools">
                        <form class="form-inline" name="form1">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail" type="search" onchange="fom1.submit()" name="search1" id="search1" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <!-- <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div> -->
                                </div>
                            </div>
                        </form>

                    </div>
                    @if(session('success'))
                    <br><br>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        {{session('success') }}
                    </div>
                    @endif
                    <div class="navbar-search-block">

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
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="mailbox-controls">




                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>read status</th>
                                <th>name</th>
                                <th>Message</th>
                                <th>action</th>
                                <th>teacher status</th>
                                <th>date</th>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    @if($message->read_at == null)
                                    <td class="mailbox-attachment"><i class="fas fa-eye-slash"></i></td>
                                    @else
                                    <td class="mailbox-attachment"><i class="fas fa-eye"></i></td>

                                    @endif
                                    <td class="mailbox-name"><a href="#">{{ $message->name }}</a></td>
                                    <td class="mailbox-subject"><a href="{{route('Messages.show',$message->id)}}" class="text-black"> -{{ implode(' ', array_slice(str_word_count($message->messages, 1), 0, 5)) }}...</a>
                                    </td>
                                    <td class="mailbox-attachment text-center">
                                        <form id="delete-form-{{$message->id}}" action="{{route('Messages.destroy',$message->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick='confirmation(event,`{{ $message->id }}`)' data-toggle="modal">
                                                <i class="fa fa-trash text-danger" style="font-size: 23px;"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @foreach ($teachers as $teacher)
                                    @if($teacher->email == $message->email)
                                    <form action="{{ route('update.teacher', $teacher->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        @if($teacher->isAdmin == 1)
                                        <td class="mailbox-attachment text-center">
                                             admin
                                        </td>
                                        @elseif( $teacher->isAdmin == 2)
                                        <td class="mailbox-attachment text-center">
                                            <i class="fa-solid fa-user-check text-success " style="font-size: 23px;"></i>
                                        </td>
                                        @elseif( $teacher->isAdmin == 0)

                                        <td class="mailbox-attachment text-center">
                                            <button type="Submit">
                                                <i class="fa-solid fa-hourglass-half mr-2" style="font-size: 23px;"></i>
                                            </button>
                                        </td>
                                        @endif
                                    </form>
                                    @else

                                    @endif
                                    @endforeach

                                    <td class="mailbox-date">{{ $message->created_at->diffForHumans() }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>

                </div>

                <div class="card-footer p-0">
                    <div class="mailbox-controls">


                        <div class="float-right">
                            {{ $messages->firstItem() }} - {{ $messages->lastItem() }} / {{ $messages->total() }}
                            <div class="btn-group">
                                @if ($messages->previousPageUrl())
                                <!-- Enable Previous button for previous page -->
                                <a href="{{ $messages->previousPageUrl() }}" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></a>
                                @else
                                <!-- Disable Previous button on first page -->
                                <button class="btn btn-default btn-sm" disabled><i class="fas fa-chevron-left"></i></button>
                                @endif

                                @if ($messages->nextPageUrl())
                                <!-- Enable Next button for next page -->
                                <a href="{{ $messages->nextPageUrl() }}" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></a>
                                @else
                                <!-- Disable Next button on last page -->
                                <button class="btn btn-default btn-sm" disabled><i class="fas fa-chevron-right"></i></button>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
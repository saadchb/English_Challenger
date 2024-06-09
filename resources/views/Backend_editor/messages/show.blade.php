@extends('Backend_editor.Layout')
@section('title', 'show message')
@section('content')
<!-- <div class="content-wrapper" style="min-height: 1301.73px;"> -->
<?php

use App\Models\Teacher;

$teachers = Teacher::all() ?>
@if(session('success'))
<br><br>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    Teacher validate successfully.
</div>
@endif
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Compose</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dachboard">Home</a></li>
                    <li class="breadcrumb-item active">Compose</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid mt--8">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Read Mail</h3>
                    <span class="mailbox-read-time float-right">{{$message->created_at->diffForHumans()}}</span>

                </div>

                <div class="card-body p-0">
                    <div class="mailbox-read-info pb-4  pt-3">
                        @if (empty($message->photo))
                        <img src="{{ asset('build/assets/images/clients/user.png') }}" alt="" style="height: 90px;width: 90px; border-radius: 17px;" class="mr-3 img-circle float-right ">
                        @else
                        <img alt="photo" src="{{ asset('storage/'. $message->photo) }}" style="height: 90px;width: 90px; border-radius: 17px;" class=" float-right ">
                        @endif
                        <h6>email: {{$message->email}}
                            <!-- <span class="mailbox-read-time >{{$message->created_at->diffForHumans()}}</span> -->
                        </h6>
                        <h6>PHONE: {{$message->phone}}
                            <!-- <span class="mailbox-read-time >{{$message->created_at->diffForHumans()}}</span> -->
                        </h6><br>
                    </div>


                    <div class="mailbox-read-message">
                        <p>Hello Mr.Arbi,</p>
                        <p>{{$message->messages}}</p>
                        <p>Thanks,<br>{{$message->name}}</p>
                    </div>

                </div>


                <div class="card-footer">

                    <div style="display: flex;">
                        <form id="delete-form-{{$message->id}}" action="{{route('Messages.destroy',$message->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick='confirmation(event,`{{ $message->id }}`)' data-toggle="modal" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                        </form>

                        <div class="float-right ml-auto">
                            @foreach ($teachers as $teacher)
                            @if($teacher->email == $message->email)
                            <form action="{{ route('update.teacher', $teacher->id) }}" class="flaot-left" method="POST">
                                @csrf
                                @method('PUT')
                                @if($teacher->isAdmin == 1 || $teacher->isAdmin == 2)
                                <td class="mailbox-attachment text-center">
                                    <!-- <i class="fa-solid fa-user-check text-success "style="font-size: 23px;"></i> -->
                                </td>
                                @else
                                <td class="mailbox-attachment text-center">
                                    <button type="Submit" class="btn btn-default">
                                        <i class="fa-solid fa-hourglass-half mr-2" style="font-size: 23px;"></i>Valider
                                    </button>
                                </td>
                                @endif
                            </form>
                            @endif
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

</div>
@endsection
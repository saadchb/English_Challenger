@extends('Backend_editor.Layout')
@section('title', 'Bloges')
@section('button_add')
<a class="nav-link ring-1 ring-black ring-opacity-5 bg-indigo-600 text-white text-sm px-4 py-2 flex items-center rounded-md font-semibold" href="{{ route('Bloges.create') }}">Add new</a>
@endsection
@section('search')
<a class="nav-link" data-widget="navbar-search" href="#" role="button">
    <i class="fas fa-search"></i>
</a>
<div class="navbar-search-block">
    <form class="form-inline" name="form1">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" onchange="form1.submit()" placeholder="search" name="search1" id="search1" aria-label="Search">
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
                                <th>Picture</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th colspan="4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td><img src="{{ asset('build/assets/images/blog/' . $blog->img) }}" alt="" style="height: 50px;width:100px;"></td>
                                <td>{{ $blog->title }}</td>
                                <td>
                                    @if ($blog->user_id)
                                    <?php $user = App\Models\User::find($blog->user_id); ?>
                                    @if ($user)
                                    {{ $user->name }}
                                    @else
                                    Anonymous
                                    @endif
                                    @endif
                                </td>
                                <td>
                                    <form id="delete-form-{{ $blog->id }}" action="{{ route('Bloges.destroy', $blog->id) }}" method="POST">
                                        <a href="{{ route('Bloges.edit', $blog->id) }}" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="{{ route('EnglishChallenger.blog_detail', ['id' => $blog->id]) }}" class="btn btn-info btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick='confirmation(event, `{{ $blog->id }}`)'>
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

<center style="margin-left: 48%;">{{ $blogs->links() }}</center>

@endsection

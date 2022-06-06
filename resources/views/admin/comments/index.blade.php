@extends('admin.layouts.layout')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home admin page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Comments list</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if(count($comments))
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-nowrap">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Comment</th>
                                <th>Owner</th>
                                <th>Post</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td>{{$comment->owner->name }}</td>
                                    <td>{{$comment->post->title}}</td>
                                    <td>{{$comment->created_at}}</td>
                                    <td>
                                        <a href="{{ route("comments.edit", ['comment'=>$comment->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{ route("posts.destroy", ['comment'=>$comment->id]) }}" method="post"
                                              class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm float-left mr-1"
                                                    onclick="return confirm('Confirm deletion')">
                                                <i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>No comments yet...</p>
                @endif
            </div>
            <div class="card-footer">
                {{ $comments->links() }}
            </div>
        </div>
    </section>
@endsection

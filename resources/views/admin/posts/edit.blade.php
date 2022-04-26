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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit the post</h3>
                        </div>


                        <form method="post" action="{{route('posts.update', ['post'=>$post->id]) }}" role="form"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control  @error('title') is-invalid @enderror"
                                           name="title" id="title"
                                           value="{{$post->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Preview text</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" rows="5"
                                              name="description"
                                              content="description">{{ $post->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" rows="7"
                                              name="content" id="content">{{ $post->content }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror"
                                            id="category_id" name="category_id">
                                        <option>Select category</option>
                                        @foreach($categories as $category_id => $category_title)
                                            <option value="{{$category_id}}"
                                                    @if( $category_id == $post->category_id) selected @endif>{{$category_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Choose tags</label>
                                    <select name="tags[]" id="tags" class="select2" multiple="multiple"
                                            data-placeholder="choose tags" style="width: 100%;">
                                        @foreach($tags as $tag_id => $tag_title)
                                            <option value="{{$tag_id}}"
                                                    @if(in_array($tag_id, $post->tags->pluck('id')->all())) selected @endif>{{$tag_title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="thumbnail" id="thumbnail"
                                                   class="custom-file-input">
                                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ $post->getImage() }}" alt="" class="img-thumbnail mt-2" width="200">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


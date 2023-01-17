@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="py-3 mt-3">Add a new project</h2>
        <div class="row">
            <div class="col-10">
                @include('partials.errors')
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">No Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>{{ $type->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-dark mt-3 " type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
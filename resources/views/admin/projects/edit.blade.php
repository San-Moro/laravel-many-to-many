@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="py-3 mt-3"> Project changes </h2>
        <div class="row">
            <div class="col-10">
                @include('partials.errors')
                
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{old('title', $project->title)}}">
                    </div>
        
                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <select name="type_id" id="type" class="form-select">
                            <option value="">No Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" @selected(old($project->type?->id) == $type->id)>{{ $type->title }}</option> 
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <h4>Technologies</h4>
                        @foreach ($technologies as $technology)
                            <div class="form-check">
                                <input type="checkbox" name="tags[]" id="technology-{{ $technology->id }}" class="form-check-input"
                                    value="{{ $technology->id }}" @checked($project->technologies->contains($technology))>
                                <label for="technology-{{ $technology->id }}" class="form-check-label">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{old('description', $project->description) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info mt-3">Save changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
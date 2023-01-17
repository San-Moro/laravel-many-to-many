@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="py-3">All Projects</h2>
        <div class="text-end mb-3">
            <a class="btn btn-outline-dark" href="{{route('admin.projects.create')}}">New Project</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                @if (session('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td colspan="2">{{ $project->created_at }}</td>
                                <td>
                                    @if ($project->image)
                                        <img class="w-50" src="{{ asset('storage/' . $project->image)}}" alt="">
                                    @else
                                        <p>No image</p>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-dark" href="{{ route('admin.projects.show', $project->slug) }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a class="btn btn-info" href="{{ route('admin.projects.edit', $project->slug) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#delete-project-{{$project->id}}">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="delete-project-{{$project->id}}" tabindex="-1" aria-labelledby="delete-label-{{$project->id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title fs-5" id="delete-label-{{$project->id}}">Sei sicuro di voler eliminare {{$project->title}}?</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>

                                                    <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-dark">
                                                            Conferma
                                                        </button>
                                                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
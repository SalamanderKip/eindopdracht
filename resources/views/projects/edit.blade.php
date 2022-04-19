<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project - Edit') }}
        </h2>
    </x-slot>
    <div>
        <p><a href="{{  route('projects.index') }}">Back</a></p>
    </div>
    @if ($errors->any())
    <div>
        <p>Errors:</p>
    </div>
    @foreach ($errors->all() as $error)
    <div>
        <p>{{ $error }}</p>
    </div>
    @endforeach
    @endif
    <form method="post" action="{{ route('projects.update', $project->id) }}" enctype='multipart/form-data'>
        @csrf
        @method('PUT')
        <label for="name">name</label>
        <input type="text" id="name" name="name" value="{{ $project->name }}"><br>
        <label for="description">description</label>
        <input type="text" id="description" name="description" value="{{ $project->description }}"><br>

        <img src="{{  asset('storage/images/'.$project->image) }}" style="width:50px; height:50px;">
        <label for="image">image</label>
        <input type="file" id="image" name="image"><br>

        <label for="category">link</label>
        <input type="text" id="link" name="link" value="{{ $project->link }}"><br>

        <label for="active">active</label>
        <input type="checkbox" id="active" name="active" {{$project->active===1?"checked":""}}><br>
        <button type="submit" class="btn btn-success">edit</button>
    </form>
</x-app-layout>
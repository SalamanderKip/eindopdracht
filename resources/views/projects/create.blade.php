<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project - Create') }}
        </h2>
    </x-slot>
    <div>
        <p><a href="{{ route('projects.index') }}">Back</a></p>
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
    <form method="post" action="{{ route('projects.store') }}" enctype='multipart/form-data'>
        @csrf
        <label for="name">name</label>
        <input type="text" id="name" name="name"><br>
        <label for="description">description</label>
        <input type="text" id="description" name="description"><br>

        <label for="image">image</label>
        <input type="file" id="image" name="image"><br>

        <label for="category">link</label>
        <input type="text" id="link" name="link"><br>
        <br>
        <label for="active">active</label>
        <input type="checkbox" id="active" name="active"><br>
        <button type="submit" class="btn btn-success">create</button>
    </form>
</x-app-layout>
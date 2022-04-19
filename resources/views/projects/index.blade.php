<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div>
        <p><a href="{{ route('projects.create') }}"> Create New Project</a></p>
    </div>

    @if ($message = Session::get('success'))
    <div>
        <p>{{ $message }}</p>
    </div>
    @endif

    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Link</th>
            <th>Image</th>
            <th>Active</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ \Str::limit($value->description, 100) }}</td>
            <td>              
            {{ $value->link }}
            </td>
            <td><img src="{{  asset('storage/images/'.$value->image) }}" style="width:50px; height:50px;"></td>
            <td><input disabled type="checkbox" id="active" name="active" {{$value->active===1?"checked":""}}></td>
            <td>
                <form action="{{ route('projects.destroy',$value->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('projects.show',$value->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('projects.edit',$value->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
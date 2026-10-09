
<x-app-layout>
    @can('dashboard')
    @can('banner-create')
<a href="{{ route('banners.create') }}">
    <button>Add Banner</button>
</a>
@endcan

<br><br>
<style>
    button {
        padding: 6px 12px;
        border: 1px solid #333;
        border-radius: 4px;
        background: #f3f3f3;
        cursor: pointer;
    }

    button:hover {
        background: #ddd;
    }
</style>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Order</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    @foreach($banners as $banner)

    <tr>

        <td>{{ $banner->id }}</td>

        <td>
            <img src="{{ asset('storage/' . $banner->image) }}"
                 width="100">
        </td>

        <td>{{ $banner->title }}</td>

        <td>{{ $banner->description }}</td>

        <td>{{ $banner->order }}</td>

        <td>
            @if($banner->status)
                Active
            @else
                Inactive
            @endif
        </td>
@can('banner-edit')
        <td>
            <a href="{{ route('banners.edit', $banner->id) }}">
    <button>Edit</button>
</a>
@endcan
@can('banner-delete')
           <form method="POST" action="{{ route('banners.delete', $banner->id) }}">
    @csrf
    @method('DELETE')

    <button type="submit">Delete</button>
</form>
        </td>
@endcan
    </tr>

    @endforeach

</table>
@endcan
</x-app-layout>
<x-app-layout>
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
    <h1>Edit Banner</h1>

    <form method="POST"
          action="{{ route('banners.update', $banner->id) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label>Title</label>
        <input type="text" name="title" value="{{ $banner->title }}">

        <br><br>

        <label>Description</label>
        <textarea name="description">{{ $banner->description }}</textarea>

        <br><br>

        <label>Image</label>
        <input type="file" name="image">

        <br><br>

        <label>Order</label>
        <input type="number" name="order" value="{{ $banner->order }}">

        <br><br>

        <label>Status</label>
        <select name="status">
            <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0" {{ $banner->status == 0 ? 'selected' : '' }}>
                Inactive
            </option>
        </select>

        <br><br>

        <button type="submit">Update Banner</button>

    </form>

</x-app-layout>
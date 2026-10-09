<x-app-layout>

    <style>
    button {
        padding: 6px 12px;
        border: 1px solid #333;
        border-radius: 4px;
        background:beige
    }
    </style>

    <form method="POST" action="{{ route('banners.store') }}" enctype="multipart/form-data">

        @csrf

        <label>Title</label>
        <input type="text" name="title">

        <br><br>

        <label>Description</label>
        <textarea name="description"></textarea>

        <br><br>

        <label>Image</label>
        <input type="file" name="image">

        <br><br>

        <label>Order</label>
        <input type="number" name="order">

        <br><br>

        <label>Status</label>
        <select name="status">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>

        <br><br>

        <button type="submit">Save Banner</button>

    </form>

</x-app-layout>
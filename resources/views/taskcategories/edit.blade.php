@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Kategori Tugas</h1>
    <form method="POST" action="{{ route('task-categories.update', $taskCategory) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ $taskCategory->name }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{ $taskCategory->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

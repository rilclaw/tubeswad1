@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jadwal</h2>

    <form action="{{ route('schedule.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="course_name" class="form-label">Nama Mata Kuliah / Aktivitas</label>
            <input type="text" class="form-control" name="course_name" required>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label">Hari</label>
            <select name="day" class="form-select" required>
                <option value="">-- Pilih Hari --</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Jam Mulai</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Jam Selesai</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Jadwal</button>
    </form>
</div>
@endsection

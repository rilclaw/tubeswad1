@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('content')
    <h2 class="mb-4">➕ Tambah Jadwal Baru</h2>

    <form method="POST" action="{{ route('schedules.store') }}">
        @csrf

        <div class="mb-3">
            <label for="course_name" class="form-label">Nama Aktivitas</label>
            <input type="text" name="course_name" id="course_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="day" class="form-label">Hari</label>
            <select name="day" id="day" class="form-select" required>
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
            <input type="time" name="start_time" id="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_time" class="form-label">Jam Selesai</label>
            <input type="time" name="end_time" id="end_time" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('schedules.index') }}" class="btn btn-secondary">← Kembali</a>
            <button type="submit" class="btn btn-success">💾 Simpan</button>
        </div>
    </form>
@endsection

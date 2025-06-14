<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Tasks</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f9f9f9;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #006699;
            color: white;
        }

        a.button {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a.button:hover {
            background-color: #1e7e34;
        }

        .actions a {
            margin-right: 10px;
        }

        .actions form {
            display: inline;
        }

        .delete-btn {
            background: none;
            border: none;
            color: red;
            cursor: pointer;
        }

        .delete-btn:hover {
            text-decoration: underline;
        }

        .status-completed {
            color: green;
            font-weight: bold;
        }

        .status-pending {
            color: orange;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Daftar Tasks</h1>

    <a href="{{ route('tasks.create') }}" class="button">+ Tambah Task Baru</a>
    <a href="{{ route('dashboard') }}" class="button" style="background-color: #006699;">← Kembali ke Dashboard</a>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    @if($tasks->isEmpty())
        <p>Belum ada task yang ditambahkan.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jatuh Tempo</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ ucfirst($task->category) }}</td>
                        <td>{{ $task->description ?? '-' }}</td>
                        <td>
                            {{ $task->due_date 
                                ? \Carbon\Carbon::parse($task->due_date)->translatedFormat('d F Y') 
                                : '-' }}
                        </td>
                        <td>
                            <span class="{{ $task->status === 'completed' ? 'status-completed' : 'status-pending' }}">
                                {{ ucfirst($task->status) }}
                            </span>
                        </td>
                        <td class="actions">
                            <a href="{{ route('tasks.show', $task->id) }}">Lihat</a>
                            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus task ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>

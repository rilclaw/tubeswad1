<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard - SmartReminder</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", sans-serif;
      background: linear-gradient(135deg, #f6f9fc 0%, #dbeeff 100%);
      min-height: 100vh;
    }

    .sidebar {
      width: 250px;
      height: 100vh;
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(10px);
      padding: 30px 20px;
      box-shadow: 10px 0 30px rgba(0, 0, 0, 0.05);
      position: fixed;
      border-right: 1px solid rgba(0, 0, 0, 0.05);
    }

    .sidebar h3 {
      margin-bottom: 25px;
      color: #006699;
      font-weight: bold;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar ul li {
      margin: 15px 0;
    }

    .sidebar ul li a {
      text-decoration: none;
      color: #004466;
      font-weight: 600;
      padding: 10px 15px;
      display: block;
      border-radius: 8px;
      transition: background 0.3s ease;
    }

    .sidebar ul li a:hover {
      background-color: #e0f3ff;
    }

    .main-content {
      margin-left: 250px;
      padding: 30px 40px;
    }

    header {
      background-color: #006699;
      color: white;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 10px;
    }

    .logout-form button {
      background: none;
      border: none;
      color: white;
      font-weight: bold;
      cursor: pointer;
      font-size: 14px;
    }

    .card, .calendar-card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
      padding: 20px;
      margin-top: 20px;
    }

    .stat-card {
      background: linear-gradient(145deg, #e6f0fa, #ffffff);
      border-radius: 12px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: bold;
      color: #006699;
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .task-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #f9fbfd;
      border-left: 5px solid #006699;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .task-item.completed {
      border-left-color: #28a745;
      background: #e6f9ec;
    }

    .detail-btn {
      background-color: #006699;
      color: white;
      padding: 6px 12px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
    }

    .create-btn {
      background-color: #28a745;
      color: white;
      padding: 8px 16px;
      border-radius: 8px;
      font-weight: bold;
    }

    .fc-event.booking-event {
      background-color: #d4edda !important;
      color: #155724 !important;
      border: 1px solid #c3e6cb !important;
    }

    .fc-event.no-booking {
      background-color: #f8d7da !important;
      color: #721c24 !important;
      border: 1px solid #f5c6cb !important;
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <h3>📋 Menu Utama</h3>
    <ul>
      <li><a href="{{ route('tasks.index') }}">🗂 Daftar Pengingat</a></li>
      <li><a href="{{ route('daily-notes.index') }}">📝 Catatan Harian</a></li>
      <li><a href="{{ route('account.settings') }}">⚙️ Pengaturan Akun</a></li>
    </ul>
  </div>

  <div class="main-content">
    <header>
      <h1>📌 SmartReminder</h1>
      <form method="POST" action="{{ route('logout') }}" class="logout-form">
        @csrf
        <button type="submit">🔓 Logout</button>
      </form>
    </header>

    <div class="card">
      <h2>Selamat datang, {{ Auth::user()->name }}!</h2>
      <p>Di sini kamu dapat melihat jadwal, pengingat, catatan harian, dan informasi penting lainnya.</p>
    </div>

    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-number">{{ $taskCount ?? 0 }}</div>
        <div class="stat-label">Total Pengingat</div>
      </div>
    </div>

    <div class="card">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">📋 Daftar Pengingat</h4>
        <a href="{{ route('tasks.create') }}" class="create-btn">+ Tambah Jadwal</a>
      </div>

      @if(!empty($recentTasks) && count($recentTasks) > 0)
        @foreach($recentTasks as $task)
          <div class="task-item {{ $task->status === 'completed' ? 'completed' : '' }}">
            <div>
              <strong>{{ $task->title }}</strong><br>
              <small>
                📂 {{ ucfirst($task->category) }} •
                @if($task->due_date)
                  📅 {{ \Carbon\Carbon::parse($task->due_date)->translatedFormat('d F Y') }}
                @else
                  📅 Tidak ada tanggal
                @endif
                •
                @if($task->status === 'completed')
                  <span style="color: green;">✔️ Selesai</span>
                @else
                  <span style="color: orange;">⏳ Belum Selesai</span>
                @endif
              </small>
            </div>
            <a href="{{ route('tasks.show', $task->id) }}" class="detail-btn">🔍 Detail</a>
          </div>
        @endforeach
      @else
        <p class="text-muted">Belum ada pengingat yang tersedia.</p>
      @endif
    </div>

    <div class="calendar-card">
      <h2 class="mb-3">📆 Kalender</h2>
      <div id="calendar"></div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var calendarEl = document.getElementById("calendar");
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        height: 500,
        headerToolbar: {
          left: "prev,next today",
          center: "title",
          right: "dayGridMonth,dayGridWeek",
        },
        events: "{{ route('calendar.events') }}",
      });
      calendar.render();
    });
  </script>
</body>
</html>

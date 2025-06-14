<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    public function run(): void
{
    $user = User::where('email', 'test@example.com')->first();

    if (!$user) {
        return;
    }

    for ($i = 0; $i < 5; $i++) {
        $start = now()->addDays(rand(0, 14))->setTime(rand(8, 15), 0);
        $end = (clone $start)->addHours(2);

        \App\Models\Schedule::create([
            'user_id' => $user->id,
            'title' => 'Kegiatan ' . Str::random(5),
            'start_time' => $start,
            'end_time' => $end,
            'day' => $start->translatedFormat('l'),
        ]);
    }
}

}

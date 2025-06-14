<?php

namespace App\Policies;

use App\Models\DailyNote;
use App\Models\User;

class DailyNotePolicy
{
    /**
     * User boleh melihat semua catatannya sendiri
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * User hanya boleh melihat catatan miliknya
     */
    public function view(User $user, DailyNote $dailyNote): bool
    {
        return $user->id === $dailyNote->user_id;
    }

    /**
     * Semua user boleh membuat catatan
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Hanya pemilik catatan yang boleh mengedit
     */
    public function update(User $user, DailyNote $dailyNote): bool
    {
        return $user->id === $dailyNote->user_id;
    }

    /**
     * Hanya pemilik catatan yang boleh menghapus
     */
    public function delete(User $user, DailyNote $dailyNote): bool
    {
        return $user->id === $dailyNote->user_id;
    }

    /**
     * (Optional) Restore dan forceDelete tidak diaktifkan
     */
    public function restore(User $user, DailyNote $dailyNote): bool
    {
        return false;
    }

    public function forceDelete(User $user, DailyNote $dailyNote): bool
    {
        return false;
    }
}

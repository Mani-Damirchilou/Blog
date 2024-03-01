<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        if ($user->isDirty('profile_path') && $user->getOriginal('profile_path') !== 'public/profiles/default.png')
        {
            Storage::delete($user->getOriginal('profile_path'));
        }
        if ($user->isDirty(['name','email','is_banned']))
        {
            $user->notify(new UserNotification('حساب کاربری شما ویرایش شد !','info'));
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        if ($user->profile_path !== 'public/profiles/default.png')
        Storage::delete($user->profile_path);
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}

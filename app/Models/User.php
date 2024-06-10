<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Jobs\QueuedPasswordResetJob;
use App\Jobs\QueuedVerifyEmailJob;
use App\Models\Concerns\Billing\HasCreditCards;
use App\Models\Concerns\Billing\HasPaidSubscriptions;
use Flixtechs\Subby\Traits\HasSubscriptions;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use NagSamayam\Promocodes\Traits\AppliesPromocode;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Onboard\Concerns\GetsOnboarded;
use Spatie\Onboard\Concerns\Onboardable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, Onboardable
{
    use AppliesPromocode;
    use CausesActivity, GetsOnboarded, HasFactory, HasPermissions, HasRoles, HasSubscriptions, LogsActivity, Notifiable;
    use HasCreditCards, HasPaidSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the businesses for the user.
     */
    public function businesses(): HasMany
    {
        return $this->hasMany(Business::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function business(): Attribute
    {
        return Attribute::make(get: fn() => $this->businesses()->where('current', true)->first());
    }

    public function sendEmailVerificationNotification()
    {
        // dispactches the job to the queue passing it this User object
        QueuedVerifyEmailJob::dispatch($this);
    }

    public function sendPasswordResetNotification($token)
    {
        // dispactches the job to the queue passing it this User object
        QueuedPasswordResetJob::dispatch($this, $token);
    }

    /**
     * Get the early access record associated with the user.
     */
    public function earlyAccess(): HasOne
    {
        return $this->hasOne(EarlyAccess::class);
    }

    /**
     * Get the log options for the model.
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'email']);
    }
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Role constants
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_PUBLISHER = 'publisher';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'funds'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'funds' => 'float',
    ];

    // Role checking methods
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(self::ROLE_ADMIN);
    }

    public function isPublisher(): bool
    {
        return $this->hasRole(self::ROLE_PUBLISHER);
    }

    public function isUser(): bool
    {
        return $this->hasRole(self::ROLE_USER);
    }

    // Get all available roles
    public static function getRoles(): array
    {
        return [
            self::ROLE_USER => 'User',
            self::ROLE_ADMIN => 'Administrator',
            self::ROLE_PUBLISHER => 'Publisher'
        ];
    }

    // Subscriptions
    public function subscriptions()
    {
        return $this->belongsToMany(Publisher::class, 'subscriptions')
            ->withPivot('subscription_code')
            ->withTimestamps();
    }

    public function canDownloadBook(Book $book): bool
    {
        return $this->subscriptions()
            ->where('publisher_id', $book->publisher_id)
            ->exists();
    }

    // Profile methods
    public function updateProfile(array $data): bool
    {
        return $this->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }

    // Funds management
    public function addFunds(float $amount): bool
    {
        return $this->increment('funds', $amount);
    }

    public function deductFunds(float $amount): bool
    {
        if ($this->funds >= $amount) {
            return $this->decrement('funds', $amount);
        }
        return false;
    }
}

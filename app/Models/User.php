<?php
/*
**	AJ Javadi
**	Created	11/22/2024
**	/Users/aj/Herd/b00k/app/Models/User.php
*/

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * User Model
 *
 * This class represents the User entity in the application.
 * It extends Laravel's Authenticatable class for built-in authentication features.
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Define role constants for user types in the system
     */
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_PUBLISHER = 'publisher';

    /**
     * The attributes that are mass assignable.
     * These fields can be filled using User::create() or mass assignment
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'funds',
        'profile_picture'
    ];

    // Accessor for profile picture
    public function getProfilePictureUrlAttribute()
    {
        if ($this->profile_picture) {
            return asset('storage' . $this->profile_picture);
        }
        return asset('images/default-profile.jpg');
    }

    /**
     * The attributes that should be hidden for serialization.
     * These fields will be excluded when the model is converted to JSON/array
     *
     * @var array<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to specific types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'funds' => 'float',
    ];

    /**
     * Check if the user has a specific role
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Check if the user is an administrator
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(self::ROLE_ADMIN);
    }

    /**
     * Check if the user is a publisher
     *
     * @return bool
     */
    public function isPublisher(): bool
    {
        return $this->hasRole(self::ROLE_PUBLISHER);
    }

    /**
     * Check if the user is a regular user
     *
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->hasRole(self::ROLE_USER);
    }

    /**
     * Get all available user roles with their display names
     *
     * @return array<string, string>
     */
    public static function getRoles(): array
    {
        return [
            self::ROLE_USER => 'User',
            self::ROLE_ADMIN => 'Administrator',
            self::ROLE_PUBLISHER => 'Publisher'
        ];
    }

    /**
     * Define the relationship between users and their subscriptions to publishers
     * Many-to-Many relationship through the subscriptions table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriptions()
    {
        return $this->belongsToMany(Publisher::class, 'subscriptions')
            ->withPivot('subscription_code')
            ->withTimestamps();
    }

    /**
     * Check if the user can download a specific book
     * Verifies if the user has an active subscription to the book's publisher
     *
     * @param Book $book
     * @return bool
     */
    public function canDownloadBook(Book $book): bool
    {
        return $this->subscriptions()
            ->where('publisher_id', $book->publisher_id)
            ->exists();
    }

    /**
     * Update user profile information
     *
     * @param array $data
     * @return bool
     */
    public function updateProfile(array $data): bool
    {
        return $this->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }

    /**
     * Add funds to user's account
     *
     * @param float $amount
     * @return bool
     */
    public function addFunds(float $amount): bool
    {
        return $this->increment('funds', $amount);
    }

    /**
     * Deduct funds from user's account if sufficient balance exists
     *
     * @param float $amount
     * @return bool
     */
    public function deductFunds(float $amount): bool
    {
        if ($this->funds >= $amount) {
            return $this->decrement('funds', $amount);
        }
        return false;
    }
}

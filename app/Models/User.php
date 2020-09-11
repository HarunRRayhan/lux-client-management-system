<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property string|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $full_name
 * @property-read bool $is_super_admin
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission( $permissions )
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role( $roles, $guard = null )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'full_name',
    ];

    /**
     * Full Name Attribute.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getIsSuperAdminAttribute(): bool
    {
        return (bool) $this->roles->where( 'super_admin', true )->count();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode( $this->full_name ) . '&color=FFFFFF&background=6875F5';
    }
}

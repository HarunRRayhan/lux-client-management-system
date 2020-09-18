<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * App\Models\Company
 *
 * @property-read \App\Models\Address|null $address
 * @method static \Illuminate\Database\Eloquent\Builder|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Company query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $website
 * @property string|null $phone
 * @property string|null $mobile
 * @property string|null $vat_number
 * @property string|null $terms
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereMobile( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereName( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|Company wherePhone( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereTerms( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUpdatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereVatNumber( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereWebsite( $value )
 * @property int|null $user_id
 * @property-read \App\Models\User|null $owner
 * @method static \Illuminate\Database\Eloquent\Builder|Company whereUserId($value)
 */
class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function address(): MorphOne
    {
        return $this->morphOne( Address::class, 'addressable' );
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo( User::class, 'user_id' );
    }
}

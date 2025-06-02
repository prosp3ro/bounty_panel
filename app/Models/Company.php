<?php

namespace App\Models;

use App\CompanyPlanEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property string $uuid
 * @property string $slug
 * @property string $company_name
 * @property string|null $logo_path
 * @property string|null $website_url
 * @property string|null $contact_url
 * @property string|null $business_email
 * @property string|null $country
 * @property string|null $address
 * @property string|null $phone_number
 * @property string|null $about
 * @property int $auto_join_enabled
 * @property string $plan
 * @property string|null $billing_customer_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereAutoJoinEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereBillingCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereBusinessEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereContactUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereLogoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company wherePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Company whereWebsiteUrl($value)
 * @mixin \Eloquent
 */
class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = "companies";

    protected $fillable = [
        "slug",
        "company_name",
        "logo_path",
        "website_url",
        "contact_url",
        "business_email",
        "country",
        "address",
        "phone_number",
        "about",
        "auto_join_enabled",
        "plan"
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            "plan" => CompanyPlanEnum::class
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(related: User::class, table: "company_user");
    }
}

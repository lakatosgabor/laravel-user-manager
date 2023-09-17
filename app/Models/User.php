<?php

namespace App\Models {
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Notifications\Notifiable;
    use Spatie\Permission\Traits\HasRoles;
    use Laravel\Sanctum\HasApiTokens;

    /**
     * @method static create(array $data)
     * @method update(array $data)
     */
    class User extends Authenticatable
    {
        use HasApiTokens;
        use HasFactory;
        use Notifiable;
        use SoftDeletes;
        use HasRoles;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',
            'username',
            'image',
            'email',
            'uuid',
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
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }
}

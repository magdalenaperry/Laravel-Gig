<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // necessary property needed to add to a model listing

    // ADD THIS: 
    // Model::unguard() to providers/AppServiceProvider boot function and the protected fillable not needed

    // needed to mass add to database
    // protected $fillable = [
    //     'title', 'companyName', 'location', 'website', 'description', 'tags', 'email'
    // ];

    public function scopeFilter($query, array $filters)
    {
        // dd($filters['tag']);
        // if filters tag is NOT false,
        if ($filters['tag'] ?? false) {
            // 'tags' column in the database
            // % before or after the tags
            // . concatenate
            // searches the request tag in the column

            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            // 'tags' column in the database
            // % before or after the tags
            // . concatenate
            // searches the request tag in the column

            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('location', 'like', '%' . request('search') . '%')
                ->orWhere(
                    'companyName',
                    'like',
                    '%' . request('search') . '%'
                );
        }
    }
}

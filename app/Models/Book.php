<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;
    
    protected $fillable = [
        'judul','penulis','penerbit','tahunTerbit',
        'slug','cover'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Categories::class, 'books_relasi' , 'book_id' , 'category_id');
    }
}

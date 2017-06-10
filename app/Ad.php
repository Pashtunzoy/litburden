<?php

namespace App;

use App\User;
use App\Category;
use Carbon\Carbon;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model {

    use Searchable;

    protected $fillable = ['user_id', 'title', 'location', 'category_name', 'image-url', 'want', 'give', 'body'];

    public function user() {
      return $this->belongsTo(User::class);
    }

    public function category() {
      return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }
}

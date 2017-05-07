<?php

namespace App;

use App\User;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = ['user_id', 'title', 'location', 'image-url', 'want', 'give', 'body'];
    
    public function user() {
      return $this->belongsTo(User::class);
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

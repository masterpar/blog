<?php

namespace App;

use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $dates = ['publicado_en'];

	public function getRouteKeyName()
	{
		return 'url';
	}

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function photos()
	{
		return $this->hasMany(Photo::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	public function scopePublicado($query)
	{
			$query->WhereNotNull('publicado_en')
				  ->where('publicado_en', '<=' , Carbon::now() )
				  ->latest('publicado_en');
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class News extends Model
{
    
    protected $fillable = ['user_id', 'title', 'slug','content'];
    
    public function setTitleAttribute($value) {
       $this->attributes['title'] = $value;
       $this->attributes['slug'] = str_slug($value);
   }
    /**
     * Связываем таблицу News c таблицей Users(у одного пользователя много новостей)
     * @return type Model user
     */
    public function users() {
        return $this->belongsTo(User::class);
    }
    /**
     * удаляем опасный код.
     * 
     */
    public function setContentAttribute($value){
        $this->attributes['content'] = clean($value);
    }
    /**
     * преобразуем markdown в html
     * 
     */
    public function getMarkdownContentAttribute() {
        return (new Parsedown)->text($this->attributes['content']);
    }
}
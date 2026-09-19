<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AboutPage;
class AboutMission extends Model
{
    public function forPage(){
        return $this->belongsTo(AboutPage::class);
    }
}

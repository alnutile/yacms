<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Tags\Tag as SpatieTags;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Tag extends SpatieTags
{


}

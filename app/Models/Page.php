<?php

namespace App\Models;

use App\Events\PageUpdatedEvent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $title
 * @property string $slug
 * @property bool $published
 * @property array $blocks
 * @property Carbon $deleted_at
 * @property User $author
 * @property int $author_id
 * @property int $id
 */
class Page extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $dispatchesEvents = [
        'updated' => PageUpdatedEvent::class,
    ];

    protected $casts = [
        'blocks' => 'array',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

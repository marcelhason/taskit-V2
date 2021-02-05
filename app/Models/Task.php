<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use \DateTimeInterface;

class Task extends Model implements HasMedia
{
    use HasAdvancedFilter, SoftDeletes, Tenantable, InteractsWithMedia, HasFactory;

    public $table = 'tasks';

    protected $appends = [
        'priloha',
    ];

    protected $casts = [
        'invoice' => 'boolean',
        'paid'    => 'boolean',
    ];

    protected $dates = [
        'start_date',
        'deadtime',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'name',
        'client.company_name',
        'porject_type.name',
        'start_date',
        'deadtime',
        'price',
        'costs',
        'status.name',
        'assingned.name',
    ];

    protected $orderable = [
        'name',
        'client.company_name',
        'porject_type.name',
        'start_date',
        'deadtime',
        'price',
        'costs',
        'status.name',
        'invoice',
        'paid',
    ];

    protected $fillable = [
        'name',
        'client_id',
        'porject_type_id',
        'start_date',
        'deadtime',
        'price',
        'costs',
        'status_id',
        'invoice',
        'paid',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'owner_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function porjectType()
    {
        return $this->belongsTo(ProjectType::class);
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDeadtimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDeadtimeAttribute($value)
    {
        $this->attributes['deadtime'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function assingned()
    {
        return $this->belongsToMany(User::class);
    }

    public function getPrilohaAttribute()
    {
        return $this->getMedia('task_priloha')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}

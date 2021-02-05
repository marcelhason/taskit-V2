<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Client extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'company_name',
        'email',
        'phone',
        'kontaktna_osoba',
        'osoba_phone',
        'ico',
    ];

    protected $filterable = [
        'id',
        'company_name',
        'email',
        'phone',
        'kontaktna_osoba',
        'osoba_phone',
        'ico',
    ];

    protected $fillable = [
        'company_name',
        'email',
        'phone',
        'adresa_ulica',
        'adresa_cislo',
        'adresa_mesto',
        'adresa_psc',
        'kontaktna_osoba',
        'osoba_phone',
        'poznamka',
        'ico',
        'ic_dph',
        'dic',
        'banka',
        'ucet',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as ContractsAuth;

class Author extends Model implements ContractsAuth
{
    use HasFactory, HasApiTokens, Authenticatable;
}

<?php

namespace App\Modules\Storage;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use Auditable;

}

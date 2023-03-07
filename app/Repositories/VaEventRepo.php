<?php

namespace App\Repositories;

use App\Events\AdmDetailOrder;
use App\Events\UpdateOrderAdmin;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use App\Repositories\VaEventInterface;
use Carbon\Carbon;

class VaEventRepo implements VaEventInterface
{
    public function admin_update_order($id)
    {
        broadcast(new UpdateOrderAdmin())->toOthers();
        broadcast(new AdmDetailOrder($id))->toOthers();
        return;
    }
}

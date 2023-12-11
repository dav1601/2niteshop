<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VnpOrdered extends Model
{
    use HasFactory;
    protected $table = 'vnpay_ordered';
    protected $fillable = [
        "vnp_TmnCode",
        "vnp_TxnRef",
        "vnp_BankCode",
        "vnp_BankTranNo",
        "vnp_CardType",
        "vnp_SecureHash",
        "vnp_OrderInfo",
        "vnp_Amount",
        "vnp_PayDate",
        "vnp_TransactionNo",
        "vnp_ResponseCode",
        "vnp_TransactionStatus"
    ];
}

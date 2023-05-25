<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Mail\OrderMail;
use App\Jobs\SendOrderMail;
use Illuminate\Support\Facades\Mail;
use App\Repositories\MailOrderInterface;

class OrderMailer implements MailOrderInterface
{
    public function send_mail_order($ordered)
    {
        if (!$ordered) {
            return false;
        }
        $type = (int) $ordered->status;
        $subject = "";
        $text = "";
        switch ($type) {
            case 1:
                $subject = "Thông tin đơn hàng quý khách đã đặt thành công từ 2NITE SHOP GAME";
                $text = "2NITE SHOP sẽ gửi cho quý khách 1 email khi đơn hàng được vận chuyển";
                break;
            case 2:
                $text = "Cửa hàng sẽ gửi cho quý khách 1 email khi đơn hàng đƯợc giao thành công";
                $subject = "Đơn hàng của quý khách đã được vận chuyển đi";
                break;
            case 3:
                $text .= '<p style="text-align: left; font-weight:400;"><span style="color: rgb(102, 99, 99); font-size: 12pt;">2NITE rất vui mừng th&ocirc;ng b&aacute;o rằng đơn h&agrave;ng của bạn đ&atilde; được giao th&agrave;nh c&ocirc;ng .</span></p>
                <p style="text-align: left; font-weight:400;"><span style="color: rgb(102, 99, 99); font-size: 12pt;">2NITE xin cảm ơn qu&yacute; kh&aacute;ch đ&atilde; tin tưởng v&agrave; ủng hộ dịch vụ của 2NITE.</span></p>
                <p style="text-align: left; font-weight:400;"><span style="color: rgb(102, 99, 99); font-size: 12pt;">Tr&acirc;n trọng,</span></p>
                <p style="text-align: left; font-weight:400;"><span style="color: rgb(102, 99, 99); font-size: 12pt;">2NITE SHOP.</span></p>';
                $subject = "Đơn hàng của quý khách đã được giao thành công 🤗";
                break;
            case 4:
                $text .= '<p style="text-align: left; font-weight:400;"><span style="font-size: 12pt; color: rgb(102, 99, 99);">Ch&uacute;ng t&ocirc;i rất tiếc phải th&ocirc;ng b&aacute;o rằng đơn h&agrave;ng của bạn tại 2NITE đ&atilde; bị huỷ bỏ. Ch&uacute;ng t&ocirc;i xin lỗi v&igrave; sự bất tiện n&agrave;y v&agrave; mong rằng bạn sẽ tiếp tục quan t&acirc;m đến c&aacute;c sản phẩm của ch&uacute;ng t&ocirc;i trong tương lai.</span></p>
                <p style="text-align: left; font-weight:400;"><span style="font-size: 12pt; color: rgb(102, 99, 99);">Ch&uacute;ng t&ocirc;i xin lỗi một lần nữa v&agrave; mong được phục vụ bạn trong tương lai.</span></p>
                <p style="text-align: left; font-weight:400;"><span style="font-size: 12pt; color: rgb(102, 99, 99);">Tr&acirc;n trọng,&nbsp;</span></p>
                <p style="text-align: left; font-weight:400;"><span style="font-size: 12pt; color: rgb(102, 99, 99);">2NITE SHOP</span></p>';
                $subject = "Thông báo huỷ bỏ đơn hàng từ cửa hàng 2NITE SHOP";
                break;
            default:
                # code...
                break;
        }
        $options = [
            "text" => $text
        ];
        try {
            $sendMail = new SendOrderMail($subject, $ordered, $options);
            dispatch($sendMail);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    public function send_code($to, $subject, $template, $data)
    {
        Mail::to($to)->send(new OrderMail($subject, $template, $data));
    }
}

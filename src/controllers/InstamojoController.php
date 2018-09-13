<?php

namespace IlyasKazi\Instamojo\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use IlyasKazi\Instamojo\Models\InstamojoPayment;

class InstamojoController extends Controller
{
    public function index()
    {
        echo "InstaMojo Installed!!!";
        exit;
    }

    public function handleWebhook()
    {
        $data = $_POST;
        $mac_provided = $data['mac'];
        unset($data['mac']);
        $ver = explode('.', phpversion());
        $major = (int) $ver[0];
        $minor = (int) $ver[1];
        if ($major >= 5 && $minor >= 4) {
            ksort($data, SORT_STRING | SORT_FLAG_CASE);
        } else {
            uksort($data, 'strcasecmp');
        }

        $mac_calculated = hash_hmac("sha1", implode("|", $data), config('laravelmojo.salt'));
        if ($mac_provided == $mac_calculated) {
            if ($data['status'] == "Credit") {
                $this->updateInstamojoPayment($data);
            } else {
                $this->updateInstamojoPayment($data);
            }
        } else {
            echo "MAC mismatch";
        }
    }

    public function updateInstamojoPayment($data)
    {
        $user = User::where('email', $data['buyer'])->first();

        InstamojoPayment::create(['user_id' => $user->id,
            'buyer_email' => $data['buyer'],
            'buyer_name' => $data['buyer_name'],
            'buyer_phone' => $data['buyer_phone'],
            'currency' => $data['currency'],
            'amount' => $data['amount'],
            'fees' => $data['fees'],
            'longurl' => $data['longurl'],
            'payment_id' => $data['payment_id'],
            'payment_request_id' => $data['payment_request_id'],
            'purpose' => $data['purpose'],
            'shorturl' => $data['shorturl'],
            'request_status' => 'completed',
            'payment_status' => $data['status'],
        ]);
    }
}

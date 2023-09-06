<?php
namespace App\Http\Traits;
use App\Models\Withdrawal;
use App\Models\Payment;
use Ixudra\Curl\Facades\Curl;


trait FlutterwaveTrait
{
    
    protected function initiateFlutterWave(Payment $payment){
        $response = Curl::to('https://api.flutterwave.com/v3/payments')
        ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
        ->withData( array('customer' => ['email'=> $payment->user->email,'phonenumber'=> $payment->user->phone,'name'=> $payment->user->name],
                        'tx_ref'=> $payment->reference,"currency" => 'NGN',"payment_options"=>"card,account,ussd",
                        "redirect_url"=> route('payment.callback'),'amount'=> $payment->amount,
                        "customizations"=> [
                            "title" => "XOFLIX",
                            "description" => "Payment",
                            "logo" => asset('media/logos/logo.png')
                        ]) )
        ->asJson()
        ->post();
        if($response && $response->status == 'success')
            return $response->data->link;
        else return false;
    }
    
    protected function verifyFlutterWavePayment($value){
        $paymentDetails = Curl::to('https://api.flutterwave.com/v3/transactions/verify_by_reference?tx_ref='.$value)
         ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
         ->asJson()
         ->get();
        return $paymentDetails;
    }

    
    
    protected function resolveBankAccountByFlutter($bank_code,$account_number){
        $response = Curl::to('https://api.flutterwave.com/v3/accounts/resolve')
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            // ->withHeader('Content-Type: application/json')
            ->withData( json_encode(array("account_number" => $account_number,"account_bank" => $bank_code)) )
            ->asJson()
            ->post();
        if(!$response ||  !isset($response->status) || $response->status == "error"){
            return false;
        }
        return $response->data->account_name;
        
    }

    protected function getBanksByFlutterWave(){
        $response = Curl::to('https://api.flutterwave.com/v3/banks/NG')
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            ->asJson()
            ->get();
        return $response;
    }

    protected function withdrawalFlutterWave(Withdrawal $withdrawal){
        
        $response = Curl::to('https://api.flutterwave.com/v3/transfers')
        ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
        // ->withData( array('account_number'=> $withdrawal->user->bankaccount->account_number,'account_bank'=> $withdrawal->user->bankaccount->bank->code,'reference'=> $withdrawal->reference
        ->withData( array('account_number'=> '0690000032','account_bank'=> '044','amount'=> $withdrawal->amount,
                        'narration'=> "Vendor withdrawal with reference $withdrawal->reference",'reference'=> $withdrawal->reference.'_PMCK',
                        "currency"=> $withdrawal->currency->iso,'destination_branch_code'=> $withdrawal->user->bankaccount->branch ? $withdrawal->user->bankaccount->branch->code :0,
                        "customizations"=> [
                            "title"=>"Expiring Soon",
                            "description"=>"Payment",
                            "logo" => asset('media/logos/logo.png')
                        ]) )
        ->asJson()
        ->post();
        if(!$response || $response->status == 'error' || $response->data->status == 'FAILED'){
            $withdrawal->transfer_id = $response->data->id ?? '';
            $withdrawal->status = 'failed';
            $withdrawal->save();
        }
        if($response && $response->status == 'success' && in_array($response->data->status,['PENDING','NEW'])){
            $withdrawal->transfer_id = $response->data->id ?? '';
            $withdrawal->status = 'processing';
            $withdrawal->save();
        }
        
    }

    protected function verifyWithdrawalFlutterwave(Withdrawal $withdrawal){
        $response = Curl::to("https://api.flutterwave.com/v3/transfers/$withdrawal->transfer_id")
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            ->asJson()
            ->get(); 
            
            if(!$response || $response->status == 'error' || $response->data->status == 'FAILED'){
                $withdrawal->status = 'failed';
                $withdrawal->save();
            }
            if($response && isset($response->status) && $response->status == 'success' && $response->data->status == 'SUCCESSFUL'){
                $withdrawal->status = 'paid'; 
                $withdrawal->paid_at = now(); 
                $withdrawal->save();
            }
    }
    

    protected function retryWithdrawalFlutterWave(Withdrawal $withdrawal){
        $response = Curl::to("https://api.flutterwave.com/v3/transfers/$withdrawal->transfer_id/retries")
            ->withHeader('Authorization: Bearer '.config('services.flutter.secret'))
            ->asJson()
            ->get();
            if(!$response || $response->status == 'error' || !isset($response->data->status) || $response->data->status == 'FAILED'){
                $withdrawal->status = 'failed';
                $withdrawal->save();
            }
            if($response && isset($response->status) && $response->status == 'success' && $response->data->status == 'SUCCESSFUL'){
                $withdrawal->status = 'paid'; 
                $withdrawal->paid_at = now(); 
                $withdrawal->save();
            }
    }


}
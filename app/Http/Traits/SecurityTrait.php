<?php
namespace App\Http\Traits;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\OneTimePassword;
use Illuminate\Support\Facades\Hash;
use App\Notifications\OTPNotification;
use Illuminate\Support\Facades\RateLimiter;

trait SecurityTrait
{
    protected function checkPin(Request $request){
        $access = false;
        $executed = RateLimiter::attempt(
            'access-pin:'.auth()->user()->id,
            $perMinute = cache('settings')['throttle_security_attempt'],
            function() {
                if(!auth()->user()->pin){
                    return ['result'=> 0,'message'=> 'Pin is not set. Set pin at profile'];
                }
                $access = Hash::check(request()->pin, auth()->user()->pin->body);
                if(!$access){
                    return ['result'=> 0,'message'=> 'Wrong Pin'];
                }
                return  ['result'=> 1];
            },$decaySeconds = cache('settings')['throttle_security_time']*60
        );
        if(!$executed) {
            $seconds = RateLimiter::availableIn('access-pin:'.auth()->id());
            return ['result'=> 0,'message'=> 'Too many tries. Try again in about '.ceil($seconds/60).' minutes.'];
        }else{
            return $executed;
        }
        
        
    }

    protected function pinRecentlyChanged(){
        $user = auth()->user();
        return $user->pin && $user->pin->last_updated_at->diffInHours(now()) > 24;
    }

    public function generateOTP(User $user){
        $otp = OneTimePassword::where('user_id',$user->id)->whereBetween('created_at',[now()->subMinutes(10),now()])->latest()->first();
        if(!$otp){
            $otp = OneTimePassword::create(['user_id'=> $user->id,'code'=> strtoupper(substr(uniqid(),4,6))]);
        }
        return $otp;
    }

    protected function checkOTP(User $user,$code){
        $otp = OneTimePassword::where('user_id',$user->id)->where('code',$code)->whereBetween('created_at',[now()->subMinutes(10),now()])->latest()->first();
        if(!$otp){
            return false;
        }
        return true;
    }

    public function sendOTP(User $user,$code){
        $executed = RateLimiter::attempt(
            $code.$user->id,
            $perMinute = 10,
            function() use($user,$code){
                $user->notify(new OTPNotification($code));
            },$decaySeconds = 600
        );
        if(!$executed) {
            $seconds = RateLimiter::availableIn($code.$user->id);
            return ['result'=> false,'message'=> 'Too many tries. Try again in about '.ceil($seconds/60).' minutes.'];
        }
        return ['result'=> true,'message'=> 'OTP has been sent to your email'];
    }
}
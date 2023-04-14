<?php

namespace App\Http\Controllers;
use App\Helpers\ActivityLoggerHelper;
use App\Implementation\UserImplementation;
use App\Interface\UserInterface;
use App\Mail\TestEmail;
use App\Models\Account;
use App\Service\SendNotificationService;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\User;
Use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laravel\Passport\Passport;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Middleware\BasicAuth;
class UserController extends Controller
{

    //
    private $userInterface;
    public function __construct(UserInterface $userInterface)
    {
      $this->userInterface = $userInterface;
    }
    public function registration(RegisterRequest $request){
        return $this->userInterface->registration($request->all());
    }

    public function login(Request $request){
        $credentials = $request->all();
        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        Log::channel('daily_login_logs')->info("User Logged In", (array)$credentials);
        $data = Account::where('email_id', $request->email )->first();
        $res=0;
        if($data!=null){
            $res=1;
        }

        return $this->respondWithToken($token,$res);

    }
    protected function respondWithToken($token,$res)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'res' => $res
        ]);
    }
}

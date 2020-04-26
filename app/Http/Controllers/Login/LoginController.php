<?php


namespace App\Http\Controllers\Login;


use App\Http\Controllers\Controller;
use Digitec\Service\Login\LoginInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class LoginController
 * @package App\Http\Controllers\Login
 */
class LoginController extends Controller
{
    /**
     * @var LoginInterface
     */
    protected LoginInterface $loginService;

    /**
     * LoginController constructor.
     * @param LoginInterface $loginService
     */
    public function __construct(LoginInterface $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        if ($request->has(['key', 'password']) && $request->filled(['key', 'password'])) {
            $key = $request->input('key');
            $password = $request->input('password');
            return response()->json(['status' => $this->loginService->login($key, $password)]);
        }

        return response()->json([
            'error' => 'invalid parameters provided'
        ], 400);
    }

}

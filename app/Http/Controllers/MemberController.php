<?php

namespace App\Http\Controllers;

use App\Models\MemberBinds;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use Tymon\JWTAuth\Facades\JWTAuth;


/*
 * 用户控制器
 * */
class MemberController extends Controller
{
    //注册用户
    public function register(Request $request)
    {
        //验证数据
        try {
            Validator::make($request->all(), [
                'username' => 'required|unique:members',
                'password' => 'required|min:6',
                'phone_number' => 'required|unique:members',
            ], [
                'username.required' => '用户名不能为空',
                'username.unique' => '用户名已存在',
                'password.required' => '密码不能为空',
                'password.min' => '密码长度不能小于6位',
                'phone_number.required' => '手机号不能为空',
                'phone_number.unique' => '手机号已存在',
            ])->validated();

            // 创建用户
            Members::create([
                'username' => $request->input('username'),
                'avatar_url' => $request->input('avatar_url', ''), // 默认为空
                'phone_number' => $request->input('phone_number'),
                'locked' => 0, // 默认未锁定
                'password' => Hash::make($request->input('password')), // 哈希密码
            ]);
        } catch (ValidationException $e) {
            Log::debug("errors:", [$e->errors()]);
            return response()->json(["status" => "error", "errors" => $e->errors()]);
        }

        return response()->json(["status" => "success", "message" => "注册成功"],200);
    }


    //删除用户
    public function destroy($id)
    {   //查找数据库中有没有该用户
        $member = Members::find($id);

        //如果用户不存在，就返回错误信息
        if (!$member){
            return response()->json([
                'status' => 'error',
                'message' => '用户不存在'
            ],500);
        }
        //删除用户
        $member->delete();
        //返回删除成功的信息
        return response()->json([
            'status' => true,
            'message' => '用户删除成功'
        ]);
    }

    //手机号登陆
    public function phoneLogin(Request $request)
    {
        //暂时写死的验证码
        $captcha = 'abc';

        //验证手机号
        try {
            Validator::make($request->all(), [
                'phone_number' => 'required|exists:members',
            ], [
                'phone_number.required' => '手机号不能为空',
                'phone_number.exists' => '手机号不存在',
            ])->validated();

        }catch (ValidationException $e){
            Log::debug("errors:", [$e->errors()]);
            return response()->json(["status" => "error", "errors" => $e->errors()]);
        }
        if ($captcha != $request->input('captcha')){
            return response()->json([
                'status' => 'error',
                'message' => '验证码错误'
            ],500);
        }
        return response()->json([
            'status' => 'success',
            'message' => '登陆成功'
        ],200);
    }
    // 获取所有用户信息
    public function getUserInfo()
    {
        $user = Members::find();
        return response()->json([
            'status' => 'success',
            'data' => $user
        ],200);
    }

    //用户的微信的登录
    public function wechatLogin(Request $request)
    {
        $code = $request->input("code");
        Log::debug("123123123213213", [$code]);

        //生成open_id
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wxcc01f485388c335b&secret=bd964ec44910eaa93a0b55cff78468a0&js_code={$code}&grant_type=authorization_code";
        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            $data = $response->json();
            $openId = $data['openid'];
            Log::debug("res:", [$openId]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => '微信登录失败'
            ],500);
        }
        // 判断数据库里面是不是有这个openId
        $exists = MemberBinds::where('open_id', $openId)->exists();
        if (!$exists) {
            //创建新用户
            $newUser = Members::create([
                'username' => "新用户",
                'password' => '123456',//默认密码
                "locked" => "0",
            ]);
            $newUserId =$newUser->id;//取出新用户的id
            //向member——binds插入新添加的用户
            MemberBinds::create([
                'open_id' => $openId,
                'user_id' => $newUserId,
                'session_key' => $data['session_key'],
            ]);

            //生成token
            $token = JWTAuth::fromUser($newUser);

            //返回token（携带用户信息，openid）
            return response()->json([
                'status' => 'success',
                'message' => '微信登录成功',
                'token' => $token,
            ],200);
        }else{
            //拿出用户的
            $UserId = MemberBinds::where('open_id', $openId)->value('user_id');
            $User = Members::find($UserId);
            Log::debug("User:", [$User]);
            //生成token
            $token = JWTAuth::fromUser($User);//这个JWTAuth::attempt要的是数组
            Log::debug("token:", [$token]);
            //返回token（携带用户信息）
            return response()->json([
                'status' => 'success',
                'message' => '微信登录成功',
                'token' => $token,
            ],200);
        }

    }
}

<?php
/**
 * Created by PhpStorm.
 * User: mylitboy
 * Date: 2017-10-30
 * Time: 11:26
 */

namespace App\Http\Controllers;


use App\Log;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/**
 * 测试模块及日志记录控制台
 * Class TestLogController
 * @package App\Http\Controllers
 */
class TestLogController extends Controller
{
    /**
     * 获取Test列表
     * @param Request $request
     * @return array
     */
    public function getTest(Request $request)
    {
        //返回列表
        $testList = Test::orderBy('created_at', 'desc')->get();
        return $testList->toArray();
    }

    /**
     * 获取Test详情Log列表
     * @param Request $request
     * @return array
     */
    public function getTestDetail($id)
    {
        $pageSize = Input::get("pageSize");
        if ($pageSize == null) {
            // 默认分页数量
            $pageSize = 100;
        }
        //返回列表，根据时间排序
        $logList = Log::where(['test_id' => $id])->orderBy('created_at', 'desc')->paginate($pageSize);
        return $logList->toArray();
    }
    /**
     * 获取Test详情统计信息
     * @param Request $request
     * @return array
     */
    public function getTestStatistics($id)
    {
        //返回列表，根据时间排序
        $logList = Log::where(['test_id' => $id])->orderBy('created_at', 'desc');
        return $logList->toArray();
    }

    /**
     * 新增测试模块
     *
     * 参数如下：
     * 手机编号    phoneNo    String    是    10
     * 手机品牌    phoneBrand    String    是    20
     * 手机型号    phoneModel    String        20
     * 操作系统    osType    Int
     * 操作系统版本    osVer    String        20
     * ROM系统    romSystem    String        20
     * ROM版本    romVer    String    是    20
     * 路由器品牌    routerBrand    String    是    20
     * 路由器型号    routerModel    String        20
     * Wi-Fi SSID    wifiSSID    String        100
     * Wi-Fi密码    wifiPwd    String        100
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postTest(Request $request)
    {
        // todo 校验参数格式。
        // 调用新增接口。
        $test = Test::create([
            'phone_no' => $request->phoneNo,
            'phone_brand' => $request->phoneBrand,
            'phone_model' => $request->phoneModel,
            'os_type' => $request->osType,
            'os_ver' => $request->osVer,
            'rom_system' => $request->romSystem,
            'rom_ver' => $request->romVer,
            'router_brand' => $request->routerBrand,
            'router_model' => $request->routerModel,
            'wifi_ssid' => $request->wifiSSID,
            'wifi_pwd' => $request->wifiPwd,
        ]);

        if ($test != null) {// 如果添加成功，则返回测试模块ID。
            return response()->json(['testId' => $test->id, 'success' => true]);
        }
        //否则返回失败
        return response()->json(['success' => false]);
    }

    /**
     * 新增日志详情记录。
     *
     * 参数如下：
     * 测试模块ID    testId    Int    是
     * 成功状态    state    Int    是
     * 错误码    errCode    Int
     * 失败原因    errMsg    String        100
     * 测试周期    testTime    Int    是
     * 配网成功编号    successNo    Int
     * 设备mac    devMac    String        100
     * 设备IP    devIp    String        100
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postLog(Request $request)
    {
        // todo 校验参数格式。
        // 调用新增接口。
        $log = Log::create([
            'test_id' => $request->testId,
            'state' => $request->state,
            'err_code' => $request->errCode,
            'err_msg' => $request->errMsg,
            'test_time' => $request->testTime,
            'success_no' => $request->successNo,
            'dev_mac' => $request->devMac,
            'dev_ip' => $request->devIp,
        ]);

        if ($log != null) {// 如果添加成功。
            return response()->json(['success' => true]);
        }
        //否则返回失败
        return response()->json(['success' => false]);
    }
}
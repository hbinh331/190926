<?php
namespace OPNsense\HelloWorld\Api;

use \OPNsense\Base\ApiMutableServiceControllerBase;
use \OPNsense\Core\Backend;
class ServiceController extends ApiMutableServiceControllerBase{
    protected static $internalServiceClass = '\OPNsense\HelloWorld\HelloWorld';
    protected static $internalServiceTemplate = 'OPNsense/HelloWorld';
    protected static $internalServiceEnabled = 'general.enabled';
    protected static $internalServiceName = 'helloworld';
    protected function reconfigureForceRestart()
    {
        return 0;
    }
    public function reloadAction()
    {
        $status = "failed";
        if ($this->request->isPost()) {
            $status = strtolower(trim((new Backend())->configdRun('template reload OPNsense/HelloWorld')));
        }
        return ["status" => $status];
    }

    public function testAction()
    {
        if ($this->request->isPost()) {
            $bckresult = json_decode(trim((new Backend())->configdRun("helloworld test")), true);
            if ($bckresult !== null) {
                // only return valid json type responses
                return $bckresult;
            }
        }
        return ["message" => "unable to run config action"];
    }
}

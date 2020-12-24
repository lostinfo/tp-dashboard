<?php
declare (strict_types=1);

namespace app\command;

use app\Model\Admin;
use think\console\Command;
use think\console\Input;
use think\console\input\Argument;
use think\console\input\Option;
use think\console\Output;
use think\helper\Str;

class AdminEdit extends Command
{
    protected function configure()
    {
        // 指令配置
        $this->setName('admin:edit')
            ->addArgument('username')
            ->addArgument('password')
            ->setDescription('create or update admin account');
    }

    protected function execute(Input $input, Output $output)
    {
        $username = trim((string)$input->getArgument('username'));
        $password = trim((string)$input->getArgument('password'));

        if (empty($username)) {
            $output->error('the argument username is required!');
            return false;
        }

        $password = $password ?: Str::random(10);

        if (empty($admin = Admin::where(['username' => $username])->find())) {
            $admin           = new Admin();
            $admin->username = $username;
        }
        $admin->password = password_hash($password, PASSWORD_BCRYPT);
        $admin->save();

        $output->info('success.');
        $output->info("username: {$username}, password: {$password}");
    }
}

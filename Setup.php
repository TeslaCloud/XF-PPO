<?php
/**
 * License key: %LICENSEKEY%
 * Product: %PRODUCT% -- %VERSION%
 * Downloaded at: %TIME%
 */

namespace TC\PPO;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;
use XF\Db\Schema\Alter;

class Setup extends AbstractSetup
{
    use StepRunnerInstallTrait;
    use StepRunnerUpgradeTrait;
    use StepRunnerUninstallTrait;

    public function installStep1()
    {
        $this->schemaManager()->alterTable('xf_payment_profile', function (Alter $table)
        {
            $table->addColumn('display_order', 'int')->setDefault(0);
        });
    }

    public function uninstallStep1()
    {
        $this->schemaManager()->alterTable('xf_payment_profile', function (Alter $table)
        {
            $table->dropColumns('display_order');
        });
    }
}
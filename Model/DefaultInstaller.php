<?php

namespace IntegrationHelper\BaseInstaller\Model;

use Magento\Framework\Exception\LocalizedException;

class DefaultInstaller implements InstallerInterface
{
    /**
     * @var array
     */
    protected $installerProcesses = [];

    /**
     * @param array $installerProcesses
     * @throws LocalizedException
     */
    public function __construct(array $installerProcesses = [])
    {
        foreach ($installerProcesses as $installerProcess) {
            if(!$installerProcess instanceof InstallerProcessInterface) {
                throw new LocalizedException(__('Installer Process must be implement interface %s', InstallerProcessInterface::class));
            }
            $this->installerProcesses = $installerProcesses;
        }
    }

    /**
     * @param string $groupCode
     * @param string $installerCode
     * @return void
     */
    public function execute(string $groupCode, string $installerCode = '')
    {
        /**
         * @var $installerProcess InstallerProcessInterface
         */
        foreach ($this->installerProcesses as $installerProcess) {
            if($installerProcess->getGroupCode() === $groupCode) {
                if($installerCode) {
                    if($installerProcess->getInstallerCode() === $installerCode) {
                        $installerProcess->execute();
                    }
                    continue;
                }
                $installerProcess->execute();
            }
        }
    }
}

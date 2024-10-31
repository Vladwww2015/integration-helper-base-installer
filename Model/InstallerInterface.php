<?php

namespace IntegrationHelper\BaseInstaller\Model;

interface InstallerInterface
{
    public function execute(string $groupCode, string $installerCode = '');
}

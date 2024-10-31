<?php

namespace IntegrationHelper\BaseImage\Model;

interface InstallerInterface
{
    public function execute(string $groupCode, string $installerCode = '');
}

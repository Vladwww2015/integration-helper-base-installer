<?php

namespace IntegrationHelper\BaseInstaller\Model;

interface InstallerProcessInterface
{
    public function getGroupCode(): string;

    public function getInstallerCode(): string;

    public function execute(): void;
}

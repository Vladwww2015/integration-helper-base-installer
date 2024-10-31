<?php

namespace IntegrationHelper\BaseImage\Model;

interface InstallerProcessInterface
{
    public function getGroupCode(): string;

    public function getInstallerCode(): string;

    public function execute(): void;
}

<?php
namespace IntegrationHelper\BaseInstaller\Console\Command;

use IntegrationHelper\BaseInstaller\Model\InstallerInterface;
use IntegrationHelper\BaseLogger\Logger\Logger;
use Magento\Framework\Console\Cli;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Installer extends Command
{
    public const COMMAND = 'integration-helper:installer:run';

    public const GROUP = 'group';

    public const INSTALLER_TYPE = 'installer_type';

    /**
     * @param InstallerInterface $installer
     * @param string|null $name
     */
    public function __construct(
        protected InstallerInterface $installer,
        string $name = null
    ) {
        parent::__construct($name);
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName(self::COMMAND)
            ->setDescription('Run Install Seed Data And Integration')
            ->addOption(
                self::GROUP,
                'g',
                InputOption::VALUE_OPTIONAL,
                'Group'
            )->addOption(
                self::INSTALLER_TYPE,
                'it',
                InputOption::VALUE_OPTIONAL,
                'Installer Type'
            );

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $group = $input->getOption(self::GROUP) ?: 'default';
            $installerType = $input->getOption(self::INSTALLER_TYPE) ?: '';

            $this->installer->execute($group, $installerType);
            $result = Cli::RETURN_SUCCESS;
        } catch (\Exception $e) {
            Logger::log($e->getMessage(), 'base_installer_critical');
            $result = Cli::RETURN_FAILURE;
        }

        return $result;
    }
}

## This extension add base installer data to magento. It can be integration data, get data from api, it can be prepare tables data, or seed datas

### Add to yours di.xml
```xml
 <type name="IntegrationHelper\BaseInstaller\Model\DefaultInstaller">
    <arguments>
        <argument name="installerProcesses" xsi:type="array">
            <item name="make-seed-data-customers" xsi:type="object">Vendor\Customer\Installer\InstallCustomerDataProcess</item>
        </argument>
    </arguments>
</type>
```
### Vendor\Customer\Installer\InstallCustomerDataProcess must to implement \IntegrationHelper\BaseInstaller\Model\InstallerProcessInterface::class

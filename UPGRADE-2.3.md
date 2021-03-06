UPGRADE FROM 2.2 to 2.3
========================

Table of Contents
-----------------

- [CampaignBundle](#campaignbundle)
- [MarketingListBundle](#marketinglistbundle)
- [TrackingBundle](#trackingbundle)

CampaignBundle
--------------
* The `TransportSettingsEmailTemplateListener::__construct(RegistryInterface $registry, SecurityContextInterface $securityContext)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/CampaignBundle/Form/EventListener/TransportSettingsEmailTemplateListener.php#L33 "Oro\Bundle\CampaignBundle\Form\EventListener\TransportSettingsEmailTemplateListener")</sup> method was changed to `TransportSettingsEmailTemplateListener::__construct(RegistryInterface $registry, TokenAccessorInterface $tokenAccessor)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.3.0/src/Oro/Bundle/CampaignBundle/Form/EventListener/TransportSettingsEmailTemplateListener.php#L32 "Oro\Bundle\CampaignBundle\Form\EventListener\TransportSettingsEmailTemplateListener")</sup>
* The `TransportSettingsEmailTemplateListener::$securityContext`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/CampaignBundle/Form/EventListener/TransportSettingsEmailTemplateListener.php#L27 "Oro\Bundle\CampaignBundle\Form\EventListener\TransportSettingsEmailTemplateListener::$securityContext")</sup> property was removed.

MarketingListBundle
-------------------
* The `ContactInformationExclusionProvider::__construct(ConfigProvider $entityConfigProvider, ManagerRegistry $managerRegistry)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/MarketingListBundle/Provider/ContactInformationExclusionProvider.php#L30 "Oro\Bundle\MarketingListBundle\Provider\ContactInformationExclusionProvider")</sup> method was changed to `ContactInformationExclusionProvider::__construct(VirtualFieldProviderInterface $virtualFieldProvider)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.3.0/src/Oro/Bundle/MarketingListBundle/Provider/ContactInformationExclusionProvider.php#L21 "Oro\Bundle\MarketingListBundle\Provider\ContactInformationExclusionProvider")</sup>
* The `MarketingList::setSegment($segment)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/MarketingListBundle/Entity/MarketingList.php#L291 "Oro\Bundle\MarketingListBundle\Entity\MarketingList")</sup> method was changed to `MarketingList::setSegment(Segment $segment = null)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.3.0/src/Oro/Bundle/MarketingListBundle/Entity/MarketingList.php#L291 "Oro\Bundle\MarketingListBundle\Entity\MarketingList")</sup>
* The `MarketingListItem::setCreatedAt(Datetime $createdAt)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/MarketingListBundle/Entity/MarketingListItem.php#L115 "Oro\Bundle\MarketingListBundle\Entity\MarketingListItem")</sup> method was changed to `MarketingListItem::setCreatedAt(DateTime $createdAt)`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.3.0/src/Oro/Bundle/MarketingListBundle/Entity/MarketingListItem.php#L115 "Oro\Bundle\MarketingListBundle\Entity\MarketingListItem")</sup>
* The following properties in class `ContactInformationExclusionProvider`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/MarketingListBundle/Provider/ContactInformationExclusionProvider.php#L19 "Oro\Bundle\MarketingListBundle\Provider\ContactInformationExclusionProvider")</sup> were removed:
   - `$entityConfigProvider::$entityConfigProvider`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/MarketingListBundle/Provider/ContactInformationExclusionProvider.php#L19 "Oro\Bundle\MarketingListBundle\Provider\ContactInformationExclusionProvider::$entityConfigProvider")</sup>
   - `$managerRegistry::$managerRegistry`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/MarketingListBundle/Provider/ContactInformationExclusionProvider.php#L24 "Oro\Bundle\MarketingListBundle\Provider\ContactInformationExclusionProvider::$managerRegistry")</sup>

TrackingBundle
--------------
* The `TrackingScriptInstaller`<sup>[[?]](https://github.com/oroinc/OroCRMMarketingBundle/tree/2.2.0/src/Oro/Bundle/TrackingBundle/Migration/TrackingScriptInstaller.php#L8 "Oro\Bundle\TrackingBundle\Migration\TrackingScriptInstaller")</sup> class was removed.


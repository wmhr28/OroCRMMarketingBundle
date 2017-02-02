<?php

namespace Oro\Bundle\MarketingActivityBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class MarketingActivityRepository
 * @package Oro\Bundle\MarketingActivityBundle\Entity\Repository
 */
class MarketingActivityRepository extends EntityRepository
{
    /**
     * @param $campaignId
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getMarketingActivitySummaryQueryBuilder($campaignId, $entityClass, $entityId)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $queryBuilder->select('count(ma.id) as value, type.id as typeId')
            ->from('OroMarketingActivityBundle:MarketingActivity', 'ma')
            ->join('ma.type', 'type')
            ->where('ma.campaign = :campaignId')
            ->groupBy('type.id')
            ->setParameter(':campaignId', $campaignId);

        if (!empty($entityClass) && !empty($entityId)) {
            $queryBuilder->andWhere('ma.entityClass = :entityClass')
                ->andWhere('ma.entityId = :entityId')
                ->setParameter(':entityClass', $entityClass)
                ->setParameter(':entityId', $entityId);

        }

        return $queryBuilder;
    }

    /**
     * @param $campaignId
     *
     * @return array
     */
    public function getMarketingActivitySummaryByCampaign($campaignId, $entityClass, $entityId)
    {
        $summary = $this->getMarketingActivitySummaryQueryBuilder($campaignId, $entityClass, $entityId)
            ->getQuery()
            ->getResult();

        $result = [];

        foreach ($summary as $item) {
            $result[$item['typeId']] = $item['value'];
        }

        return $result;
    }

    /**
     * @param string $entityClass
     * @param int    $entityId
     * @param array  $pageFilter
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getMarketingActivitySectionItemsQueryBuilder($entityClass, $entityId, $pageFilter = null)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $queryBuilder->select('campaign.id as id, campaign.name as campaignName, type.name as eventType')
            ->addSelect('MAX(ma.actionDate) as eventDate, campaign.updatedAt, campaign.createdAt')
            ->from('OroMarketingActivityBundle:MarketingActivity', 'ma')
            ->join('ma.type', 'type')
            ->join('ma.campaign', 'campaign')
            ->where('ma.entityClass = :entityClass')
            ->andWhere('ma.entityId = :entityId')
            ->groupBy('ma.campaign')
            ->orderBy('eventDate', 'DESC')
            ->setParameter(':entityClass', $entityClass)
            ->setParameter(':entityId', $entityId);

        if (!empty($pageFilter['date']) && !empty($pageFilter['ids'])) {
            $this->applyPageFilter($queryBuilder, $pageFilter);
        }

        return $queryBuilder;
    }

    /**
     * @param $queryBuilder
     * @param $pageFilter
     *
     * @return MarketingActivityRepository
     */
    protected function applyPageFilter($queryBuilder, $pageFilter)
    {
        $dateFilter = new \DateTime($pageFilter['date'], new \DateTimeZone('UTC'));
        $whereComparison = $pageFilter['action'] === 'prev' ? 'gte' : 'lte';
        $orderDirection = $pageFilter['action'] === 'prev' ? 'ASC' : 'DESC';

        $queryBuilder->andWhere($queryBuilder->expr()->notIn('campaign.id', implode(',', $pageFilter['ids'])));
        $queryBuilder->having($queryBuilder->expr()->{$whereComparison}('eventDate', ':dateFilter'));
        $queryBuilder->setParameter(':dateFilter', $dateFilter->format('Y-m-d H:i:s'));
        $queryBuilder->orderBy('eventDate', $orderDirection);

        return $this;
    }
}

<?php

namespace Lle\EasyAdminPlusBundle\Filter\FilterType;

use Symfony\Component\HttpFoundation\Request;

/**
 * EnumerationFilterType
 */
class NumberRangeFilterType extends AbstractFilterType
{

    public function apply($queryBuilder)
    {
      if (isset($this->data['value'][0]) or isset($this->data['value'][1])) {
        if($this->data['value'][0]){
          $queryBuilder->andWhere($this->alias . $this->columnName .' >= :min_'.$this->uniqueId);
          $queryBuilder->setParameter('min_'.$this->uniqueId, $this->data['value'][0]);
        }
        if($this->data['value'][1]) {
          $queryBuilder->andWhere($this->alias . $this->columnName .' <= :max_'.$this->uniqueId);
          $queryBuilder->setParameter('max_'.$this->uniqueId, $this->data['value'][1]);
        }
      }
      
    }

    public function getStateTemplate(){
        return '@LleEasyAdminPlus/filter/state/number_range_filter.html.twig';
    }

    public function getTemplate(){
        return '@LleEasyAdminPlus/filter/type/number_range_filter.html.twig';
    }

}

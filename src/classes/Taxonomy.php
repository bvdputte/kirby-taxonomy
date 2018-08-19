<?php

namespace bvdputte\kirbyTaxonomy;
use Kirby\Toolkit\Collection;
//use Kirby\Cms\Pages;

class Taxonomy {
    public static function getTerms(String $termsRaw) {
        $termsArr = explode(", ", $termsRaw);
        $termsColl = new Collection();
        foreach( $termsArr as $t ) {
            $term = new Term($t);
            $termsColl->set($term->name(), $term);
        }
        
        return $termsColl;
    }

    public static function find(Vocabulary $voc, String $id, \Kirby\Cms\Pages $context = null) {
        $context = $context ?? site()->index();
        return $context->filterBy(
            kirby()->option("bvdputte.kirbytaxonomy.fieldprefix") . $voc->name(),
            "*=",
            $id
        );
    }
}
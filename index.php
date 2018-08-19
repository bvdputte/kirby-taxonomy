<?php

require __DIR__ . DS . "src" . DS . "classes" . DS . "Vocabulary.php";
require __DIR__ . DS . "src" . DS . "classes" . DS . "Term.php";
require __DIR__ . DS . "src" . DS . "classes" . DS . "Taxonomy.php";

Kirby::plugin('bvdputte/kirbytaxonomy', [
    'options' => [
        'root' => 'taxonomies',
        'fieldprefix' =>"taxonomy"
    ],
    'blueprints' => [
        'fields/termid' => __DIR__ . '/blueprints/fields/termid.yml',
        'sections/vocabularies' => __DIR__ . '/blueprints/sections/vocabularies.yml',
        'sections/terms' => __DIR__ . '/blueprints/sections/terms.yml',
        'pages/taxonomies' => __DIR__ . '/blueprints/pages/taxonomies.yml',
        'pages/taxvoc' => __DIR__ . '/blueprints/pages/taxvoc.yml',
        'pages/taxterm' => __DIR__ . '/blueprints/pages/taxterm.yml',
    ],
    'pagesMethods' => [
        'filterByTaxonomy' => function(bvdputte\kirbyTaxonomy\Vocabulary $voc, String $id) {
            return bvdputte\kirbyTaxonomy\Taxonomy::find($voc, $id, $this);
        }
    ],
    'fieldMethods' => [
        'taxonomyTerms' => function($field) {
            return $terms = bvdputte\kirbyTaxonomy\Taxonomy::getTerms($field->value());
        }
    ]
]);
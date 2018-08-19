<?php

namespace bvdputte\kirbyTaxonomy;

class Vocabulary {
    public $name;
    public $terms;

    function __construct(String $name) {
        $taxonomies = pages(kirby()->option("bvdputte.kirbytaxonomy.root"))->drafts();
        $voc = $taxonomies->find($name);

        if (!$voc) throw new \Error("No taxonomy " . $name . " found.");

        $this->name = $name;
        $this->terms = $voc->children();
    }

    public function name() {
        return $this->name;
    }

    public function terms() {
        $terms = [];
        foreach( $this->terms as $term) {
            $terms[$term->termid()->value()] = $term->title()->value();
        }

        return $terms;
    }

    public function getTermFromId($id) {
        $term = $this->terms->findby("termid", $id);
        if ($term) {
            return $term->uid();
            //return new Term($this, $term->uid());
        } else {
            return false;
        }
    }
}
<?php

namespace bvdputte\kirbyTaxonomy;

class Term {
    public $page;

    function __construct(String $vocTid) {
        $taxonomies = page(kirby()->option("bvdputte.kirbytaxonomy.root"))->drafts();
        $vocTid = explode("|", $vocTid);

        $voc = new Vocabulary($vocTid[0]);
        $termId = $vocTid[1];
        
        if ($page = $taxonomies->find($voc->name() . "/" . $voc->getTermFromId($termId))) {
            $this->page = $page;
        } else {
            throw new \Error("Page " . $page . " not found.");
        }
    }

    public function name() {
        return $this->page->title();
    }

    public function toPage() {
        return $this->page;
    }
}
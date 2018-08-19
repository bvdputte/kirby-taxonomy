# Kirby taxonomy

Roughly based on this: https://www.notion.so/Kirby-taxonomy-c3565ecb974f438e8a39096652582841

## Goals & implementation ideas

- Use pages for vocabularies/terms management -> easy to make em multilingual + they follow Kirby idioms
- Custom fields for a term are possible by extending the page blueprint
- Each term "page" needs a `termid` field with a unique identifier
- Terms are saved in a comma-separated list in the textfile. Each term is stored as `{vocabularyname|term id}`.

- all vocabularies are _drafts_ for performance reasons (they are excluded in the index)
- all terms are _listed_, so we can use the sorting for them

- Field name convention: each field in a page's template should be named {taxonomy}{vocabularyname}. e.g. fo the `colors` vocabulary this becomes `taxonomycolors`.

## To do

- create field which makes it straightforward to find / select terms in the page administration in the panel
- Ameliorate the authoring experience of the vocabularies/terms (especially the "add term")
- Hide the `termid` field and autogenerate an ID. Maybe the [autoid](https://github.com/bnomei/kirby3-autoid) can come in handy for this?

## To investigate

- improve the installing and setting up of the plugin
- Hierarchical taxonomies ("tree view" ? UI ?)
- "Closed taxonomy" (all terms managed in "taxonomies") vs "Tags taxonomy" (possibility to add new term from the selector-widget)
- multiple input fields for taxonomy (checkboxes / tags / autocomplete)
- find better way to "extend" the terms with fields without having to extend all the blueprints
- performance
  - cache them as a predefined collection?
  - cache them as yaml?
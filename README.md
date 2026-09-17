# Bright Cloud Studio's Contao Content Element - Hero Text

Adds a **Hero Text** content element to Contao. It behaves like the core *Text*
element — rich text plus an optional image — with one extra field, **Button
Link**, which renders a play button underneath the text.

> **Client-specific.** The button markup is hardcoded to a Fresco lightbox
> trigger with a Font Awesome play icon (`.play_button > a.fresco`), built for
> one particular client's site. It is probably not much help to the average
> Contao user.

## Requirements

| | |
|---|---|
| Contao | 5.7 |
| PHP | 8.3+ |

PHP 8.3 is the floor because `contao/core-bundle` 5.7 requires it, not because
of anything in this package.

## Installation

```
composer require bright-cloud-studio/contao-ce-hero-text
```

Then run the database update so the `buttonLink` column is added to
`tl_content`:

```
vendor/bin/contao-console contao:migrate
```

## Usage

Add a content element and pick **Hero Text** from the *Text* group. Fill in the
text as usual, then use **Button Link** to choose the page the play button
should link to. Leave it empty and no button is rendered.

The element outputs:

```html
<div class="content-hero-text">
    <div class="text rte">…rich text…</div>
    <div class="play_button">
        <a href="…" class="fresco">
            <i class="fa-solid fa-circle-play"></i><span class="invisible">Play Video</span>
        </a>
    </div>
</div>
```

The template is `contao/templates/content_element/hero_text.html.twig`. It
extends `@Contao/content_element/text.html.twig`, so the image, floating and
lightbox behaviour all come straight from core. Per-record overrides are
available through the usual **Custom template** field.

## Upgrading from the Contao 4 version

The element type (`hero_text`) and the `buttonLink` column are unchanged, so
**existing content elements keep working and no data migration is needed.** Two
things do change:

1. **The wrapper class is now `content-hero-text`, not `ce_hero_text`.** That is
   Contao 5's own naming for Twig content elements. Any CSS targeting
   `.ce_hero_text` needs updating. The inner `.text` and `.play_button` hooks
   are unchanged.
2. **Button Link is now a page picker** instead of a free-text field. It stores
   the same page ID, so existing values carry over untouched — editors just no
   longer have to type IDs by hand.

## License

MIT — see [LICENSE](LICENSE).

# YACms

So this will attempt to be a CMS that has 100% of it's docs in
https://filamentphp.com/ and https://laravel.com (oh and JetStream) plus an libraries it uses.


![](https://previews.dropbox.com/p/thumb/ACEyNT9TBMKVsYmwwtf5ajgMrerIPViFcEXTNeJ-slnc0XZddsh98VZf91kFpq6fWtoPn26dJZUxpG-e8Ic2SmoR7RRDvUJpNnsft1hFkEUHElnUI73MhQEDIgUh-Dn2Zq0fNjeHOhi_JqD_U_dX9rfAXdkoUnkLCWyx4uXOe5v8TGcl5Yo9pQfRD2DrqOnfSHw5h4CztINjDj2bUUIwkIAvGzZ_QeTGxw1uU8hTJzWutr9wZ79_VIo8mf9L9x0W3Oh4ZLHf_v5kvu73JGsdYQIxAnezeW_ZJZGmMmk6ap3zViIPteebQNAMdwYTIcPZziAALUdshih3ksyhLUa5HgaWF3p928sHGngGBPjpmzLStjXLl_dQq2OBbd6Z4GofOSrSU8ngV_-d2nN0GWx5b7InqpZC43G4H56mOCYxTsCoIQO5PWgBCDCQrDayaLkfK4JfI6WSyCI_7nezhpWRmkvC_w6_yhfKs28jzYf94IwHyTYw3uLitWS1U6poz_ZR1a4UIUrKTOydjVFDZVfJ4je7/p.gif)

The goal will to not be like TwillCMS or Statamic CMS and have docs that seem to have some 'gray' areas
or do things differently than Laravel and then not really explain how to do it. (looking at your TwillCMS).

So ideally you can build pages, show them in the UI and just use normal Laravel/Filament.

All CMSs have tons of details since that is what makes anything so niche and good at what it does. And I said 100000x I would not do this 
but then I came across https://filamentphp.com/docs/3.x/forms/fields/builder and thought hmm if this can work then maybe I can make this 
work without a crazy amount of custom work on my end (maybe none)

Good luck!


## Libraries

  * Laravel
  * Filament
  * Flowbite (frontend helper)
  * Spatie Tags
  * Scout
  * Inertia/Vue if you want for front end else use what you want 
  * JetStream


## Builder and Pages

This is the inspiration for this 


## Sources of "truth"

### Composer.json
Check it out to see other libraries installed and then what you can do with it

### PHPUnit Tests
Check them out for a sense of how things work


### Tailwind config?

Might be some things here since Flowbite sets up items for the theme etc


### Seeding

```bash 
php artisan db:seed --class=PageSeeder
```

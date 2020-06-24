# Blade Style Sass

A sass compiler engine for [x-style](https://github.com/cbl/blade-style) Blade
components using [scssphp](https://github.com/scssphp/scssphp).

```php
<button class="btn">My Button</button>

<x-style lang="scss">
    $color: purple;

    .btn{
        background: $color;
    }
</x-style>
```

The packet can be easily installed via composer.

```shell
composer require cbl/blade-style-sass
```

And that's it! The compiler engine is automatically registered and you are good
to go.

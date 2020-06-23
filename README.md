# Blade Style Sass

A sass compiler for [x-style](https://github.com/cbl/blade-style) Blade
components.

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

And that's it, the compiler engine is automatically registered.

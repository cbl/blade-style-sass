<?php

namespace BladeStyle\Sass;

use ScssPhp\ScssPhp\Compiler;
use BladeStyle\Compiler\CssCompiler;
use Illuminate\Filesystem\Filesystem;

class SassCompiler extends CssCompiler
{
    /**
     * Sass compiler.
     *
     * @var \ScssPhp\ScssPhp\Compiler
     */
    protected $sass;

    /**
     * Create a new compiler instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  string  $cachePath
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(Filesystem $files, $cachePath)
    {
        parent::__construct($files, $cachePath);

        $this->sass = new Compiler();
    }

    /**
     * Compile style string.
     *
     * @param string $style
     * @return void
     */
    public function compileString($style)
    {
        return $this->sass->compile($style);
    }
}

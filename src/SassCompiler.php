<?php

namespace BladeStyle\Sass;

use BladeStyle\Compiler\Compiler;
use Illuminate\Filesystem\Filesystem;
use BladeStyle\Engines\MinifierEngine;
use ScssPhp\ScssPhp\Compiler as ScssPhp;

class SassCompiler extends Compiler
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
     * @param  \BladeStyle\Engines\MinifierEngine $engine
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  string  $cachePath
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(MinifierEngine $engine, Filesystem $files, $cachePath)
    {
        parent::__construct($engine, $files, $cachePath);

        $this->sass = new ScssPhp();
    }

    /**
     * Compile style string.
     * 
     * @see https://github.com/scssphp/scssphp
     *
     * @param string $style
     * @return void
     */
    public function compileString($style)
    {
        return $this->sass->compile($style);
    }
}

<?php

namespace Motionlab\Sauce;

class ThemeColours
{

    protected $assocColourClasses;

    public function __construct()
    {
        // set some default colours
        $this->assocColourClasses = [
            'bg-white' => 'White',
            'bg-smoke' => 'Smoke',
            'bg-light-grey' => 'Light Grey',
            'bg-light-blue' => 'Light Blue',
            'bg-light-purple' => 'Purple',
        ];
    }

    public function setAssocColourClasses(array $colours)
    {
        $this->assocColourClasses = $colours;
    }

    public function getAssocColourClasses() : array
    {
        return $this->assocColourClasses;
    }

}
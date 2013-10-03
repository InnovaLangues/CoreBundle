<?php

namespace Claroline\CoreBundle\Library\Installation\Settings;

class SettingCategory
{
    private $name;
    private $settings = array();
    private $hasFailedRequirement = false;
    private $hasIncorrectSetting = false;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addRequirement($description, array $descriptionParameters, $isCorrect)
    {
        $this->doAddSetting($description, $descriptionParameters, $isCorrect, true);
    }

    public function addRecommendation($description, array $descriptionParameters, $isCorrect)
    {
        $this->doAddSetting($description, $descriptionParameters, $isCorrect, false);
    }

    public function getSettings()
    {
        return $this->settings;
    }

    public function hasIncorrectSetting()
    {
        return $this->hasIncorrectSetting;
    }

    public function hasFailedRequirement()
    {
        return $this->hasFailedRequirement;
    }

    public function getIncorrectSettings()
    {
        $settings = array();

        foreach ($this->settings as $setting) {
            if (!$setting->isCorrect()) {
                $settings[] = $setting;
            }
        }

        return $settings;
    }

    private function doAddSetting($description, array $descriptionParameters, $isCorrect, $isRequired)
    {
        if (!$isCorrect) {
            $this->hasIncorrectSetting = true;

            if ($isRequired) {
                $this->hasFailedRequirement = true;
            }
        }

        $this->settings[] = new Setting($description, $descriptionParameters, $isCorrect, $isRequired);
    }
}
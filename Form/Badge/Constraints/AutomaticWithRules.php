<?php

/*
 * This file is part of the Claroline Connect package.
 *
 * (c) Claroline Consortium <consortium@claroline.net>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Claroline\CoreBundle\Form\Badge\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class AutomaticWithRules extends Constraint
{
    public $message = "badge_automatic_awarding_need_rules";

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}

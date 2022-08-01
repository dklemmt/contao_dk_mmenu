<?php

declare(strict_types=1);

use Contao\EasyCodingStandard\Fixer\TypeHintOrderFixer;
use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Option;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([__DIR__.'/../vendor/contao/easy-coding-standard/config/contao.php']);

    $ecsConfig->skip([
        TypeHintOrderFixer::class,
    ]);

    $ecsConfig->ruleWithConfiguration(HeaderCommentFixer::class, [
        'header' => "This file is part of the ContaoMmenuBundle.\n\n(c) Dirk Klemmt\n(c) inspiredminds\n\n@license MIT",
    ]);

    $ecsConfig->parallel();
    $ecsConfig->lineEnding("\n");

    $parameters = $ecsConfig->parameters();
    $parameters->set(Option::CACHE_DIRECTORY, sys_get_temp_dir().'/ecs_default_cache');
};

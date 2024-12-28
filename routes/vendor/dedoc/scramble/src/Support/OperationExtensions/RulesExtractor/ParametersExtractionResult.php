<?php

namespace Dedoc\Scramble\Support\OperationExtensions\RulesExtractor;

/**
 * @internal
 */
class ParametersExtractionResult
{
    public function __construct(
        public array $parameters,
        public ?string $schemaName = null,
        public ?string $description = null,
    ) {}
}

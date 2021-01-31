<?php

namespace Selective\Transformer\Filter;

use Selective\Transformer\ArrayTransformer;

/**
 * Filter.
 */
final class TransformFilter
{
    /**
     * Invoke.
     *
     * @param array<mixed> $value The values
     * @param callable $callback The callback
     *
     * @return array<mixed>|null The value
     */
    public function __invoke(array $value, callable $callback)
    {
        if (!$value) {
            // The item will be skipped if "required" is not set
            return null;
        }

        $transformer = new ArrayTransformer();
        $callback($transformer);

        return $transformer->toArray($value);
    }
}

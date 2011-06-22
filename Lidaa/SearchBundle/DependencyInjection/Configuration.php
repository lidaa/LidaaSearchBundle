<?php

namespace Lidaa\SearchBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * configuration structure.
 */
class Configuration
{
    public function getConfigTree()
    {
        $tree = new TreeBuilder();

        $tree->root('lidaa_search')
            ->children()
                ->scalarNode('analyzer')->end()
                ->scalarNode('path')->end()
                ->scalarNode('doc_type')->end()
            ->end()
        ;

        return $tree->buildTree();
    }
}

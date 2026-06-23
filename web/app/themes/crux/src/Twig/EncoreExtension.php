<?php

namespace Crux\Twig;

use Traversable;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class EncoreExtension extends AbstractExtension
{
    private const string ENTRYPOINTS_FILE = 'entrypoints.json';

    private array $entrypoints;

    private array $renderedAssets = [];

    public function __construct(string $outputPath)
    {
        $this->entrypoints = $this->loadEntryPoints(
            get_template_directory() . rtrim($outputPath, '/') . '/' . self::ENTRYPOINTS_FILE
        );
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('encore_entry_link_tags', $this->entryLinkTags(...), ['is_safe' => ['html']]),
            new TwigFunction('encore_entry_script_tags', $this->entryScriptTags(...), ['is_safe' => ['html']]),
        ];
    }

    public function entryLinkTags(string $entryName): string
    {
        $tags = [];

        foreach ($this->entrypointAssets($entryName, 'css') as $asset) {
            $tags[] = sprintf('<link rel="stylesheet" href="%s">', esc_url($asset));
        }

        return implode('', $tags);
    }

    public function entryScriptTags(string $entryName): string
    {
        $tags = [];

        foreach ($this->entrypointAssets($entryName, 'js') as $asset) {
            $tags[] = sprintf('<script src="%s" defer></script>', esc_url($asset));
        }

        return implode('', $tags);
    }

    private function loadEntryPoints(string $entrypointsPath): array
    {
        if (!file_exists($entrypointsPath)) {
            return [];
        }

        $entrypoints = json_decode((string) file_get_contents($entrypointsPath), true);

        if (!is_array($entrypoints) || !is_array($entrypoints['entrypoints'] ?? null)) {
            return [];
        }

        return $entrypoints['entrypoints'];
    }

    private function entrypointAssets(string $name, string $type): array
    {
        $assets = $this->entrypoints[$name][$type] ?? null;

        if (!is_array($assets)) {
            return [];
        }

        $files = array_values(array_diff($assets, $this->renderedAssets));
        array_push($this->renderedAssets, ...$files);

        return $files;
    }
}

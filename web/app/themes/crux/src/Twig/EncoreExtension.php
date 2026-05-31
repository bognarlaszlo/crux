<?php

namespace Crux\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class EncoreExtension extends AbstractExtension
{
    private const string ENTRYPOINTS_FILE = 'entrypoints.json';

    private string $entrypointsPath;
    private array $entrypoints;

    public function __construct(string $outputPath)
    {
        $this->entrypointsPath = get_template_directory() . rtrim($outputPath, '/') . '/' . self::ENTRYPOINTS_FILE;
        $this->entrypoints = $this->loadEntryPoints();
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

    private function loadEntryPoints(): array
    {
        if (! file_exists($this->entrypointsPath)) {
            return [];
        }

        $entrypoints = json_decode((string) file_get_contents($this->entrypointsPath), true);

        if (! is_array($entrypoints) || ! is_array($entrypoints['entrypoints'] ?? null)) {
            return [];
        }

        return $entrypoints['entrypoints'];
    }

    private function entrypointAssets(string $entryName, string $entryType): array
    {
        $assets = $this->entrypoints[$entryName] ?? null;

        if (! is_array($assets) || ! is_array($assets[$entryType] ?? null)) {
            return [];
        }

        return $assets[$entryType];
    }
}

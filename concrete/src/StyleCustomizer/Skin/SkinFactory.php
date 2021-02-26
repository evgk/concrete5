<?php

namespace Concrete\Core\StyleCustomizer\Skin;

use Concrete\Core\Utility\Service\Text;
use Illuminate\Filesystem\Filesystem;

class SkinFactory
{

    /**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @var Text
     */
    protected $textService;

    public function __construct(Filesystem $filesystem, Text $textService)
    {
        $this->filesystem = $filesystem;
        $this->textService = $textService;
    }

    public function createFromDirectory(string $path): ?SkinInterface
    {
        $directoryName = basename($path);
        $skin = new PresetSkin($path, $directoryName, $this->textService->unhandle($directoryName));
        return $skin;
    }

    /**
     * Returns an array of SkinInterface objects found in the path.
     *
     * @param string $path
     */
    public function createMultipleFromDirectory(string $path): array
    {
        $skins = [];
        foreach($this->filesystem->directories($path) as $skin) {
            $skin = $this->createFromDirectory($skin);
            if ($skin) {
                $skins[] = $skin;
            }
        }
        return $skins;
    }

}

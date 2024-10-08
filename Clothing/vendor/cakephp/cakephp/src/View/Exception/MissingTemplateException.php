<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @since         3.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Cake\home\Exception;

use Cake\Core\Exception\CakeException;
use Throwable;

/**
 * Used when a template file cannot be found.
 */
class MissingTemplateException extends CakeException
{
    /**
     * @var string|null
     */
    protected $templateName;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var string[]
     */
    protected $paths;

    /**
     * @var string
     */
    protected $type = 'Template';

    /**
     * Constructor
     *
     * @param string|array $file Either the file name as a string, or in an array for backwards compatibility.
     * @param string[] $paths The path list that template could not be found in.
     * @param int|null $code The code of the error.
     * @param \Throwable|null $previous the previous exception.
     */
    public function __construct($file, array $paths = [], ?int $code = null, ?Throwable $previous = null)
    {
        if (is_array($file)) {
            $this->file = array_pop($file);
            $this->templateName = array_pop($file);
        } else {
            $this->file = $file;
            $this->templateName = null;
        }
        $this->paths = $paths;

        parent::__construct($this->formatMessage(), $code, $previous);
    }

    /**
     * Get the formatted exception message.
     *
     * @return string
     */
    public function formatMessage(): string
    {
        $name = $this->templateName ?? $this->file;
        $message = "{$this->type} file `{$name}` could not be found.";
        if ($this->paths) {
            $message .= "\n\nThe following paths were searched:\n\n";
            foreach ($this->paths as $path) {
                $message .= "- `{$path}{$this->file}`\n";
            }
        }

        return $message;
    }

    /**
     * Get the passed in attributes
     *
     * @return array
     * @psalm-return array{file: string, paths: array}
     */
    public function getAttributes(): array
    {
        return [
            'file' => $this->file,
            'paths' => $this->paths,
        ];
    }
}

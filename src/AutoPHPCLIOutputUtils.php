<?php

namespace AutoPHP;

use LLPhant\Render\CLIOutputUtils;

class AutoPHPCLIOutputUtils extends CLIOutputUtils
{
    /**
     * @param  Task[]  $tasks
     */
    public function printTasks(bool $verbose, array $tasks, ?Task $currentTask = null): void
    {
        $separator = '------------------'.PHP_EOL;
        $liItems = $separator.'Tasks'.PHP_EOL;
        foreach ($tasks as $task) {
            if ($currentTask === $task) {
                $liItems .= "\t⚙️ - {$task->name} ({$task->description})".PHP_EOL;

                continue;
            }

            if (is_null($task->result)) {
                $liItems .= "\t⚪️ - {$task->name} ({$task->description})".PHP_EOL;

                continue;
            }

            $result = self::truncateString($verbose, $task->result, $task->name);

            if ($task->wasSuccessful) {
                $liItems .= "\t🟢 - {$task->name} ({$task->description}) - {$result}".PHP_EOL;
            } else {
                $liItems .= "\t🔴 - {$task->name} ({$task->description})".PHP_EOL;
            }
        }
        $liItems .= $separator;

        $this->render($liItems, $verbose);
    }

    private static function truncateString(bool $verbose, string $message, ?string $title = null): string
    {
        $maxSize = 250;
        if ($title) {
            $maxSize -= strlen($title);
        }

        if (! $verbose) {
            $message = str_replace('\n', '', $message);
            $message = str_replace('\r', '', $message);
            if (strlen($message) > $maxSize) {
                $message = substr($message, 0, $maxSize).'...';
            }
        }

        return $message;
    }
}

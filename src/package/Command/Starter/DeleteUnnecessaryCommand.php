<?php

namespace YukataRm\Laravel\Package\Command\Starter;

use YukataRm\Laravel\Command\BaseCommand;

/**
 * Delete Unnecessary Command
 *
 * @package YukataRm\Laravel\Package\Command\Starter
 */
class DeleteUnnecessaryCommand extends BaseCommand
{
    /**
     * command signature
     *
     * @var string
     */
    protected $signature = "starter:detele";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Delete unnecessary files";

    /*----------------------------------------*
     * Parameter
     *----------------------------------------*/

    /**
     * set parameter
     *
     * @return void
     */
    protected function setParameter(): void {}

    /*----------------------------------------*
     * Process
     *----------------------------------------*/

    /**
     * run command process
     *
     * @return array<mixed>
     */
    protected function process(): array
    {
        $this->outputInfo("Deleting unnecessary files.");

        $this->deleteController();
        $this->deleteConfigs();
        $this->deleteWelcomeBlade();
        $this->deleteCssDirectory();
        $this->deleteJsDirectory();
        $this->deletePostCssConfig();
        $this->deleteWebpackMix();
        $this->deleteTailwindConfig();

        return [true, []];
    }

    /**
     * get delete message
     *
     * @param string $type
     * @param string $path
     * @return string
     */
    protected function getDeleteMessage(string $type, string $path): string
    {
        return sprintf(
            "Delete %s [%s]",
            $type,
            str_replace(base_path() . "/", "", $path)
        );
    }

    /**
     * delete controller
     *
     * @return void
     */
    protected function deleteController(): void
    {
        $controller = app_path("Http/Controllers/Controller.php");

        if (!file_exists($controller)) return;

        $this->task($this->getDeleteMessage("file", $controller), function () use ($controller) {
            return unlink($controller);
        });
    }

    /**
     * delete configs
     *
     * @return void
     */
    protected function deleteConfigs(): void
    {
        $configs = [
            "app.php",
            "auth.php",
            "broadcasting.php",
            "cache.php",
            "concurency.php",
            "cors.php",
            "database.php",
            "filesystems.php",
            "hashing.php",
            "mail.php",
            "queue.php",
            "services.php",
            "session.php",
            "view.php"
        ];

        foreach ($configs as $config) {
            $path = config_path($config);

            if (!file_exists($path)) continue;

            $this->task($this->getDeleteMessage("file", $path), function () use ($path) {
                return unlink($path);
            });
        }
    }

    /**
     * delete welcome.blade.php
     *
     * @return void
     */
    protected function deleteWelcomeBlade(): void
    {
        $welcome = resource_path("views/welcome.blade.php");

        if (!file_exists($welcome)) return;

        $this->task($this->getDeleteMessage("file", $welcome), function () use ($welcome) {
            return unlink($welcome);
        });
    }

    /**
     * delete css directory
     *
     * @return void
     */
    protected function deleteCssDirectory(): void
    {
        $css = resource_path("css");

        if (!file_exists($css)) return;

        $this->task($this->getDeleteMessage("directory", $css), function () use ($css) {
            if (file_exists("{$css}/app.css")) unlink("{$css}/app.css");

            return rmdir($css);
        });
    }

    /**
     * delete js directory
     *
     * @return void
     */
    protected function deleteJsDirectory(): void
    {
        $js = resource_path("js");

        if (!file_exists($js)) return;

        $this->task($this->getDeleteMessage("directory", $js), function () use ($js) {
            if (file_exists("{$js}/app.js")) unlink("{$js}/app.js");
            if (file_exists("{$js}/bootstrap.js")) unlink("{$js}/bootstrap.js");

            return rmdir($js);
        });
    }

    /**
     * delete postcss.config.js
     *
     * @return void
     */
    protected function deletePostCssConfig(): void
    {
        $postcss = base_path("postcss.config.js");

        if (!file_exists($postcss)) return;

        $this->task($this->getDeleteMessage("file", $postcss), function () use ($postcss) {
            return unlink($postcss);
        });
    }

    /**
     * delete webpack.mix.js
     *
     * @return void
     */
    protected function deleteWebpackMix(): void
    {
        $mix = base_path("webpack.mix.js");

        if (!file_exists($mix)) return;

        $this->task($this->getDeleteMessage("file", $mix), function () use ($mix) {
            return unlink($mix);
        });
    }

    /**
     * delete tailwind.config.js
     *
     * @return void
     */
    protected function deleteTailwindConfig(): void
    {
        $tailwind = base_path("tailwind.config.js");

        if (!file_exists($tailwind)) return;

        $this->task($this->getDeleteMessage("file", $tailwind), function () use ($tailwind) {
            return unlink($tailwind);
        });
    }
}

<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Domain\Task\TaskRepositoryInterface;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetInteractor;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetInteractorInterface;
use Packages\Domain\TaskColumn\TaskColumnRepositoryInterface;
use Packages\Infrastructure\DB\RDS\Repository\Task\TaskRepository;
use Packages\Infrastructure\DB\RDS\Repository\TaskColumn\TaskColumnRepository;
use Packages\Interfaces\Presenters\API\TaskColumn\TaskColumnGetPresenter;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetPresenterInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskColumnGetInteractorInterface::class, TaskColumnGetInteractor::class);
        $this->app->bind(TaskColumnRepositoryInterface::class, TaskColumnRepository::class);
        $this->app->bind(TaskColumnGetPresenterInterface::class, TaskColumnGetPresenter::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}


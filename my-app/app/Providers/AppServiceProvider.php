<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Domain\Task\TaskRepositoryInterface;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetInteractor;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetInteractorInterface;
use Packages\Domain\TaskColumn\TaskColumnRepositoryInterface;
use Packages\Domain\TransactionInterface;
use Packages\Infrastructure\DB\RDS\Repository\Task\TaskRepository;
use Packages\Infrastructure\DB\RDS\Repository\TaskColumn\TaskColumnRepository;
use Packages\Infrastructure\DB\Transaction;
use Packages\Interfaces\Presenters\API\TaskColumn\TaskColumnGetPresenter;
use Packages\Interfaces\Presenters\API\TaskColumn\TaskColumnUpdatePresenter;
use Packages\UseCase\API\TaskColumn\Get\TaskColumnGetPresenterInterface;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdateInteractorInterface;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdateInteractor;
use Packages\UseCase\API\TaskColumn\Update\TaskColumnUpdatePresenterInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TransactionInterface::class, Transaction::class);

        $this->app->bind(TaskColumnGetInteractorInterface::class, TaskColumnGetInteractor::class);
        $this->app->bind(TaskColumnRepositoryInterface::class, TaskColumnRepository::class);
        $this->app->bind(TaskColumnGetPresenterInterface::class, TaskColumnGetPresenter::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);

        $this->app->bind(TaskColumnUpdateInteractorInterface::class, TaskColumnUpdateInteractor::class);
        $this->app->bind(TaskColumnUpdatePresenterInterface::class, TaskColumnUpdatePresenter::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}


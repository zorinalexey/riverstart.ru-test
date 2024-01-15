<?php

namespace App\Jobs\Cache;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

final class ModelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $key;
    public Model $model;
    public array $config;

    /**
     * Create a new job instance.
     */
    public function __construct(string $key, Model $model)
    {
        $this->key = $key;
        $this->model = $model;
        $this->config = config('crud-service');
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Cache::put($this->model->getTable().':id'. $this->model->id, $this->model, $this->config['cache_timeout']);
    }
}

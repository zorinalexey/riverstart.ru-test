<?php

namespace App\Jobs\Cache;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

final class CollectionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $key;
    public LengthAwarePaginator|Collection $collection;
    private array $config;

    public function __construct(string $key, Collection|LengthAwarePaginator $collection)
    {
        $this->key = $key;
        $this->collection = $collection;
        $this->config = config('crud-service');
    }

    public function handle(): void
    {
        Cache::put($this->key, $this->collection, $this->config['cache_timeout'] );

        $this->collection->each(function(Model $model){
            Cache::put($model->getTable().':id'. $model->id, $model, $this->config['cache_timeout']);
        });
    }
}

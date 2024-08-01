<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Task;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteTaskMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteTask',
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $task = Task::findOrFail($args['id']);
        return $task->delete();
    }
}

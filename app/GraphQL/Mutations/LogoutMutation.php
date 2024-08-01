<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class LogoutMutation extends Mutation
{
    protected $attributes = [
        'name' => 'logout',
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function resolve($root, $args)
    {
        $user = Auth::user();
        if (!$user) {
            // Return false or an error message if the user is not authenticated
            return false;
        }

        // Revoke all tokens for the authenticated user
        $user->tokens()->delete();

        return true;
    }
}
